<?php 
  date_default_timezone_set("Asia/Bangkok");

  $date = date('Y-m-d');
  $ord = "ORD-0001";
  $notemp = 1;
 ?>
<?php 
		$namab = $_GET['nama'];
    if($namab != ''){
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
        if(preg_match("/\b$namab\b/i", $nama)){
          $num = number_format($harga, 0, '', '.');
        ?>
  <div class="row">
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
          <img src="minus.png" style="width: 25px; height: 25px; margin-right: 20px;" value="-" onclick="minus(<?= "'$i', '$harga', '$kodebarang', '$notemp', '$nama', '$date', '$ord'"; ?>)">

          <h3><input type="disabled" disabled="disabled" class="form-control" name="nilai" style="width: 50px; text-align: center; font-size: 17px; margin-left: 67px; margin-top: -35px; background-color: white; border: none;" value="0"></h3>
          
          <img src="add.png" style="margin-left: 65px; width: 25px; height: 25px; position: absolute; margin-top: -38px;" value="+" onclick="plus(<?= "'$i', '$harga', '$kodebarang', '$notemp', '$nama', '$date', '$ord'"; ?>)">
        </center>
      </div>
    </div>
  </div>
      <?php 
          $i++;
        }
      }

    }else{
      ?>
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
         <img src="minus.png" style="width: 25px; height: 25px; margin-right: 20px;" value="-" onclick="minus(<?= "'$i', '$harga', '$kodebarang', '$notemp', '$nama', '$date', '$ord'"; ?>)">

          <h3><input type="disabled" disabled="disabled" class="form-control" name="nilai" style="width: 50px; text-align: center; font-size: 17px; margin-left: 67px; margin-top: -35px; background-color: white; border: none;" value="0"></h3>
          
          <img src="add.png" style="margin-left: 65px; width: 25px; height: 25px; position: absolute; margin-top: -38px;" value="+" onclick="plus(<?= "'$i', '$harga', '$kodebarang', '$notemp', '$nama', '$date', '$ord'"; ?>)">
        </center>
      </div>
    </div>
  </div>
<?php $i += 1;  } } ?>
</div>
</div>
</div>