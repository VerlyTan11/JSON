<?php
session_start();
include 'koneksi.php';

$kodeuser = $_SESSION['kodeuser'];
$kodebarang = $_GET['kodebarang'];
$jlh = $_GET['jlh'];
$hargajual = $_GET['hargajual'];
$total = $_GET['total'];

$sqljual = "select * from tbjual";
$queryjual = mysqli_query($conn,$sqljual);
$numjual = mysqli_num_rows($queryjual)+1;
$noorder =  sprintf("%04s", $numjual);

$sql = "SELECT * FROM tempjualdetil where kodebarang='$kodebarang' and kodeuser='$kodeuser'";
$query = mysqli_query($conn,$sql)or die($sql);
$num = mysqli_num_rows($query);

 if($num == 0){
    $sql2 = "INSERT into tempjualdetil(no, kodeuser, kodebarang, jlh, hargajual, total) values('$noorder','$kodeuser', '$kodebarang', '$jlh', '$hargajual', '$total')";
    $query2 = mysqli_query($conn,$sql2) or die($sql2);
  }else{
    $sql3 = "UPDATE tempjualdetil set jlh='$jlh', hargajual='$hargajual', total='$total' where kodebarang='$kodebarang' and kodeuser='$kodeuser'";
    $query3 = mysqli_query($conn,$sql3) or die($sql3);
  }if($jlh <= 0){
  	$sql4 = "DELETE from tempjualdetil where kodebarang='$kodebarang' and $kodeuser='$kodeuser'";
  	$query4 = mysqli_query($conn,$sql4) or die($sql4);
  }

?>
<div class="tambah" style="z-index: 900;"> 
    <img src="minus.png" style="" onclick="min(<?= $kodebarang; ?>">
    <h3><input type="disabled" disabled="disabled" class="form-control" name="jumlah" style="background-color: white; border: none;" value="<?= $jlh; ?>"></h3>
    <img src="add.png" style="" onclick="plus(<?= $kodebarang; ?>">
</div>