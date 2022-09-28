<?php 
	$current = file_get_contents('temp.json');
	$array = json_decode($current);
	$i = 0;
	$notemp = $_GET['notemp'];

	foreach($array as $order){

		if($order->noorder == $_GET['order']){
			$x = 0;
			$codes = array();
			$collection = array();
			$delete = 0;
			$data = json_decode($current);

			foreach($array[$i]->produk as $produk){
				if($produk->kodebarang == $_GET['kodebarang']){
					if($_GET['jlh'] >= 1){
						$data[$i]->produk[$x]->jlh = $_GET['jlh'];
						$data[$i]->produk[$x]->total = $_GET['total'];
					}else{
						$file = file_get_contents('temp.json');
						$json = json_decode($file);
						$delete = $x;
					}			
				}
				array_push($collection, $data[$i]->produk[$x]);
				array_push($codes, $produk->kodebarang);
				$x++;
			}
				
			if($_GET['jlh'] < 1){
				array_splice($collection, $delete, 1);
			}

			$data[$i]->produk = $collection;
			$final_data = json_encode($data, JSON_PRETTY_PRINT);
			file_put_contents('temp.json', $final_data);

			if(!in_array($_GET['kodebarang'], $codes)){
				$item = array(
					"nomor" => $_GET['notemp'],
					"kodebarang" => $_GET['kodebarang'],
					"namaproduk" => $_GET['nama'],
					"jlh" => $_GET['jlh'],
					"harga" => $_GET['harga'],
					"total" => $_GET['total'],
					"Merek" => $_GET['merek'],
					"cashback" => $_GET['cashback']
				);

				array_push($array[$i]->produk, $item);
				$final = json_encode($array, JSON_PRETTY_PRINT);
				file_put_contents('temp.json', $final);
			}

			$subtotal = 0;
			$total_item = 0;
			$latest = file_get_contents('temp.json');
			$data2 = json_decode($latest);

			if(count($data2[$i]->produk) < 1){
				$data2[$i]->subtotal = $subtotal;
				$data2[$i]->jumlahitem = $total_item;
				$final_data = json_encode($data2,JSON_PRETTY_PRINT);
				file_put_contents('temp.json', $final_data);
			}

			for($a = 0; $a < count($data2[$i]->produk); $a++){
				$subtotal += $data2[$i]->produk[$a]->total;
				$total_item += $data2[$i]->produk[$a]->jlh;
				$data2[$i]->subtotal = $subtotal;
				$data2[$i]->jumlahitem = $total_item;
				$final_data = json_encode($data2,JSON_PRETTY_PRINT);
				file_put_contents('temp.json', $final_data);
			}

		}else{

			$item = array(
				"nomor" => $_GET['notemp'],
				"kodebarang" => $_GET['kodebarang'],
				"namaproduk" => $_GET['nama'],
				"jlh" => $_GET['jlh'],
				"harga" => $_GET['harga'],
				"total" => $_GET['total'],
				"Merek" => $_GET['merek'],
				"cashback" => $_GET['cashback']
			);

			$produk = array();
			array_push($produk, $item);

			$data = array(
				"noorder" => $_GET['order'],
				"date" => $_GET['date'],
				"pelanggan" => $_GET['pelanggan'],
				"user" => $_GET['user'],
				"produk" => $produk,
				"subtotal" => $_GET['total'],
				"jumlahitem" => $_GET['jlh']
			);

			array_push($array,$data);
			$final = json_encode($array, JSON_PRETTY_PRINT);
			file_put_contents('temp.json', $final);

		}

		$i++;
	}
	
 ?>

<table border="1" cellpadding="10px" class="table">
	<thead>
 		<tr>
	 		<th scope="col">No</th>
	 		<th scope="col">Nama</th>
	 		<th scope="col">Merek</th>
	 		<th scope="col">Jumlah</th>
	 		<th scope="col">Harga</th>
	 		<th scope="col">Total</th>
	 		<th scope="col">Cashback</th>
	 		<th scope="col">Action</th>
 		</tr>
 	<?php 
 		$call = file_get_contents('temp.json');
 		$data = json_decode($call);
 		$subtotal = 0;
 		$totalitem = 0;
 		$totalcashback = 0;
 		$grand_total = 0;
 		$x = 1;
 		foreach($data as $info){
 			$order = $info->noorder;
 			foreach($info->produk as $item){
 				$code = $item->kodebarang;
 				$namaproduk = $item->namaproduk;
 				$jlh = $item->jlh;
 				$hrg = $item->harga;
 				$totalharga = $item->total;
 				$merek = $item->Merek;
 				$cashback = $item->cashback;

 		?>
 	</thead>
 	<tbody>
 		<tr>
 			<td><?= $x; ?></td>
 			<td><?= $namaproduk; ?></td>
 			<td><?= $jlh; ?></td>
 			<td><?= $hrg; ?></td>
 			<td><?= $totalharga; ?></td>
 			<td><?= $merek; ?></td>
 			<td><?= $cashback; ?></td>
 			<td><button class="btn btn-danger" type="submit" id="del" class="del" value="del" onclick="del(<?= "'$code','$order'"; ?>)"><img src="trash.png" style="width: 20px;"></button></td>
 		</tr>
 		<?php
 				$x++;
 				 $totalcashback += $cashback * 100 * $jlh;
 				
 			}
 			$subtotal += $info->subtotal;
 			$totalitem += $info->jumlahitem;
 			$grand_total += $subtotal * $totalitem;
 		}
 	 ?>
 	</tbody>
</table>
<h5 style="float: right; margin-right: 10px;">Subtotal : <input type="disabled" disabled="disabled" value="<?= $subtotal; ?>"></h5>
<h5 style="float: right; margin-right: 10px;">Total Item : <input type="disabled" disabled="disabled" value="<?= $totalitem; ?>"></h5>
<h5 style="float: right; margin-right: 10px;">Total Cashback : <input type="disabled" disabled="disabled" value="<?= $totalcashback; ?>"></h5>
<h5 style="float: right; margin-right: 10px;">Grandtotal : <input type="disabled" disabled="disabled" value="<?= $grand_total; ?>"></h5>
<?php
echo "~$totalcashback";
 	echo "~$subtotal";
 	echo "~$totalitem";
 	echo "~$notemp";
?>