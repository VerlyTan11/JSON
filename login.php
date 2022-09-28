<?php
session_start();
    $nama = $_GET['nama'];
    $pass = $_GET['pass'];
    $buka = fopen('login.json','r');
    $baca = fread($buka, filesize('login.json'));
    $conv = json_decode($baca);
    $data  = $conv[0];

    for($a = 0; $a < count($conv); $a++){
        if($nama == $conv[$a] -> nama){
            if($pass == $conv[$a] -> password){
                $_SESSION['nama'] = $nama;
                echo "<script>alert('Login Sukses! Welcome $nama'); window.location = 
                'home.php'</script>"; 

            }
        }
        else{
            echo "<script>alert('Maaf Anda Tidak Memiliki Akses Login');
            location.href = 'index.php';
            </script>";
        }
    }
?>