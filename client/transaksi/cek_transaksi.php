<?php
require_once("../auth/auth.php"); 
require_once("../../config/database.php"); 

// tangkap id_pendaftaran
$id = $_GET['id'];

// Query dibawah untuk menentukan jumlah pendaftaran
// Jika lebih dari satu maka akan dilihkan ke halaman kolektif / korporat
$query_history = "SELECT count(ID_PENDAFTARAN) as 'jumlah' 
                FROM histori where ID_PENDAFTARAN = '$id'";
$tabel_history   = mysqli_query($mysqli, $query_history);
$jumlah       = $tabel_history->fetch_assoc();
$jumlah_pendaftar  = $jumlah['jumlah'];

if($jumlah_pendaftar == 1){
    echo "<script> 
    document.location.href = 'bayar.php?id=$id';
    </script>";
}else if($jumlah_pendaftar > 1){
    echo "<script> 
    document.location.href = 'bayar_multiple.php?id=$id';
    </script>";
}

?>