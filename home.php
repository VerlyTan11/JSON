<?php 

	date_default_timezone_set("Asia/Bangkok");

	$date = date('Y-m-d');
  	$ord = "ORD-0001";
  	$notemp = 1;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">

</head>
<style>
	body {
		background-color: #eee;
		overflow-x: hidden;
	}

	.kontainer {
		background-color: white;
		width: 700px;
		height: 600px;
		float: right;
		margin-right: 10px;
		border: 1px solid grey;
		margin-top: 10px;
		font-family: 'Big Shoulders Display', cursive;
	}

	.kontainer2 {
		background-color: white;
		border: 1px solid grey;
		height: 200px;
		width: 630px;
		margin-top: 10px;
		position: absolute;
		margin-left: 15px;
		z-index: -1;
		font-family: 'Raleway', sans-serif;
	}

	.kontainer3 {
		background-color: white;
		border: 1px solid grey;
		height: 390px;
		width: 630px;
		margin-top: 220px;
		position: absolute;
		margin-left: 15px;
		z-index: -1;
		font-family: 'Raleway', sans-serif;
	}
</style>

<body>
<div class="kontainer">
<nav class="navbar navbar-light">
	<div class="container-fluid">
		<form class="d-flex" style="width: 750px;">
			
			<input class="form-control me-2" type="search" id="search" placeholder="Search" aria-label="Search" style="height: 35px; font-size: 18px; margin-top: 7px; width: 80%; margin-left: 10px; position: absolute; z-index: 1000;" onkeyup="view()">
			<button class="btn btn-outline-success" type="button" style="margin-left: 585px; border-radius: 5px; width: 38px; height: 35px; margin-top: 7px; font-size: 15px; z-index: 1000;" onclick="view()" id="cmd" name="cmd" value="Search"><i class="fa fa-search"></i></button>

		</form>
	</div>
</nav>

<div id="div_data">
<div class="row">
  <?php
    $file = file_get_contents("barang.json");
    $items = json_decode($file);
    $i = 0;
    foreach($items as $item){
      $kodebarang = $item->kodebarang;
      $nama = $item->nama;
      $harga = $item->harga;
      $jumlah_stok = $item->jumlah_stok;
      $img = $item->gambar;
      $merek = $item->Merek;
      $cashback = $item->cashback;
      $num = number_format($harga, 0, '', '.');

  ?>
  <div class="kotak" style="position: relative; width: 20%; height: 20%; margin-left: 25px; margin-top: 5px; border: 1px solid black; cursor: pointer;">
    <div class="thumbnail">
      <img src="image/<?= $img; ?>" style="width: 100%; padding-bottom: 10px; padding-top: 10px;" alt="<?= $nama; ?>">
      <div class="caption">
        <center>
          <h2 style="color: #03AC0E; font-size: 30px; font-weight: bold;"><?= $nama;?></h2>
          <h4 style="color: #000000; font-size: 25px; font-weight: bold;"><?= $merek;?></h4>
          <h6 style="color: black; margin-top: -3px; font-weight: bolder; margin-bottom: 60px;">Rp
          <input type="text" name="hargajual" style="text-align: center; background-color: white; border: none; font-size: 20px;" value="<?= $num; ?>" style="border: hidden; background-color: white; color: black;" disabled="disabled"></h6>
          <div class="tambah" style="margin-left: -30px; margin-top: -45px; position: absolute;"> 
          <img src="minus.png" style="width: 25px; height: 25px; margin-right: 20px;" value="-" onclick="minus(<?= "'$i', '$harga', '$kodebarang', '$notemp', '$nama', '$date', '$ord', '$merek', '$cashback'"; ?>)">

          <h3><input type="disabled" disabled="disabled" class="form-control" name="nilai" style="width: 50px; text-align: center; font-size: 17px; margin-left: 67px; margin-top: -35px; background-color: white; border: none;" value="0"></h3>
          
          <img src="add.png" style="margin-left: 65px; width: 25px; height: 25px; position: absolute; margin-top: -40px;" value="+" onclick="plus(<?= "'$i', '$harga', '$kodebarang', '$notemp', '$nama', '$date', '$ord','$merek', '$cashback'"; ?>)">
        </center>
      </div>
    </div>
  </div>
<?php $i += 1;  }  ?>
</div>
</div>
</div>

<div class="kontainer2">
	<h5 style="z-index: 900; color: black; padding: 10px;"><?php echo date('Y M d - h.ia');?></h5>
	<h5 style="float: right; padding-right: 15px; margin-top: -40px;">
		Welcome Beverly Vladislav Tan
	</h5>

	<h5 style="margin-left: 10px; padding-top: 10px;">No Order :<input type="disabled" disabled="disabled" name="noorder" style="margin-left: 10px; width: 30%; border: none; background-color: white;" value="<?= $ord; ?>" ></h5>

	<h5 style="margin-left: 10px; padding-top: 10px;">User :
		<select class="form-control" id="user" name="user" style=" width: 40%; margin-top: -30px; margin-left: 120px; border: 1px solid grey;">
      		<option selected="hidden">Pilih User</option>
      <option value="Beverly Vladislav Tan">Beverly Vladislav Tan</option>
    	</select>
	</h5>

	<h5 style="margin-left: 10px; padding-top: 10px;">Pelanggan :
		<select class="form-control" id="pelanggan" name="pelanggan" style=" width: 18%; margin-top: -30px; margin-left: 120px; border: 1px solid grey;">
      		<option value="Juju">Juju</option>
      		<option value="Kelly">Kelly</option>
    	</select>
	</h5>

	<div id="divkotak"></div>
</div>

<div class="kontainer3">
	<div class="barang" id="barang"></div>
</div>
<input type="hidden" id="kodeuser" name="kodeuser" value="<?= $kodeuser; ?>">
<input type="hidden" name="notemp" id="notemp" value="<?= $notemp; ?>">
<input type="hidden" name="grand_total" id="grand_total" value="<?= $grand_total; ?>">

<script>
    
  function view(){
  var xhr;

  var search = document.getElementById('search').value;
  var url = "search.php?nama="+search;

  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      document.getElementById('div_data').innerHTML = this.responseText;
    }
  }

  xhr.open('GET', url, true);
  xhr.send();
}

function minus(i, harga, kodebarang, notemp, nama, date, order,merek, cashback){
  var nilai = document.getElementsByName('nilai')[i];
  var user = document.getElementById('user').value;
  var pelanggan = document.getElementById('pelanggan').value;

  nilai.value --;
  if(nilai.value < 1){
    nilai.value = 0;
  }
  var total = nilai.value * harga;

  var jlh = nilai.value;

  var xhr;

  var url = 'act.php?jlh='+jlh+'&notemp='+notemp+'&total='+total+'&kodebarang='+kodebarang+'&harga='+harga+"&nama="+nama+"&user="+user+"&pelanggan="+pelanggan+"&date="+date+"&order="+order+"&merek="+merek+"&cashback="+cashback;

  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      var data = this.responseText;
      data = data.split('~');
      document.getElementById('barang').innerHTML = data[0];
    }
  }

  xhr.open('GET', url, true);
  xhr.send();
}

function plus(i, harga, kodebarang, notemp, nama, date, order, merek, cashback){
  var nilai = document.getElementsByName('nilai')[i];
  var user = document.getElementById('user').value;
  var pelanggan = document.getElementById('pelanggan').value;

  nilai.value ++;
  var total = nilai.value * harga;

  var jlh = nilai.value;

  var xhr;

  var url = 'act.php?jlh='+jlh+'&notemp='+notemp+'&total='+total+'&kodebarang='+kodebarang+'&harga='+harga+"&nama="+nama+"&user="+user+"&pelanggan="+pelanggan+"&date="+date+"&order="+order+"&merek="+merek+"&cashback="+cashback;

  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      var data = this.responseText;
      data = data.split('~');
      document.getElementById('barang').innerHTML = data[0];
    }
  }

  xhr.open('GET', url, true);
  xhr.send();
}


function del(kode, order){
  var url = "del.php?kode="+kode+"&order="+order;

  var xhr;

  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      var data = this.responseText;
      data = data.split('~');
      document.getElementById('barang').innerHTML = data[0];
    }
  }

  xhr.open('GET', url, true);
  xhr.send();
}

 </script>
</body> 
</html>