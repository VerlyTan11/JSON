<?php 
	date_default_timezone_set("Asia/Bangkok");

	$date = date('Y-m-d');
  $ord = "ORD-001";
  $notemp = 1;
 ?>
<?php 
	$file = file_get_contents('temp.json');
	$json = json_decode($file);
	$notemp = 1;

	$a = 0;
	foreach($json as $data){
		if($data->noorder == $_GET['order']){
			$i = 0;
			$delete = 0;
			$collection = array();
			$bag = array();
			$data2 = json_decode($file);

			foreach($data->produk as $produk){
				if($produk->kodebarang == $_GET['kode']){
					$delete = $i;
				}
				array_push($collection, $produk);
				$i++;
			}

			array_splice($collection, $delete, 1);
			$data2[$a]->produk = $collection;
			$final = json_encode($data2, JSON_PRETTY_PRINT);
			file_put_contents('temp.json', $final);

			$subtotal = 0;
			$total_item = 0;
			$totalcashback = 0;
			$latest = file_get_contents('temp.json');
			$data3 = json_decode($latest);

			if(count($data3[$a]->produk) < 1){
				$data3[$a]->subtotal = $subtotal;
				$data3[$a]->jumlahitem = $total_item;
				$data3[$a]->totalcashback = $totalcashback;
				$final_data = json_encode($data3,JSON_PRETTY_PRINT);
				file_put_contents('temp.json', $final_data);
			}

			for($b = 0; $b < count($data3[$a]->produk); $b++){
				$subtotal += $data3[$a]->produk[$b]->total;
				$total_item += $data3[$a]->produk[$b]->jlh;
				$data3[$a]->subtotal = $subtotal;
				$data3[$a]->jumlahitem = $total_item;
				$data3[$a]->totalcashback = $totalcashback;
				$final_data = json_encode($data3,JSON_PRETTY_PRINT);
				file_put_contents('temp.json', $final_data);
			}
		}
		$a++;
	}

?>

<table border="1" cellpadding="10px">
 	<tr>
 		<td>No</td>
 		<td>Nama</td>
 		<td>Merek</td>
 		<td>Jumlah</td>
 		<td>Harga</td>
 		<td>Total</td>
 		<td>Cashback</td>
 		<td>Action</td>
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
 </table>
<h5 style="float: right; margin-right: 10px;">Subtotal : <input type="disabled" disabled="disabled" value="<?= $subtotal; ?>"></h5>
<h5 style="float: right; margin-right: 10px;">Total Item : <input type="disabled" disabled="disabled" value="<?= $totalitem; ?>"></h5>
<h5 style="float: right; margin-right: 10px;">Grandtotal : <input type="disabled" disabled="disabled" value="<?= $grand_total; ?>"></h5>
<?php
	echo "~$totalcashback";
 	echo "~$subtotal";
 	echo "~$totalitem";
 	echo "~$notemp";
?>