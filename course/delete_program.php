<?php
//Cek session
require_once("../auth/auth.php"); 
include_once('../../config/database.php');
if(isset($_GET['id'])){
    $cek = mysqli_query($mysqli, "SELECT ID_KATEGORI from program WHERE ID_PROGRAM = '".$_GET['id']."'");
    $id  = $cek->fetch_assoc();
    $kategori = $id['ID_KATEGORI'];
    $hapus = mysqli_query($mysqli, "DELETE FROM program WHERE ID_PROGRAM = '".$_GET['id']."'");
}


echo " <script>alert('Data berhasil dihapus!');</script>";


if($kategori == 'RC'){
    echo " <script>location='reguler.php';</script>";
} else if($kategori == 'NRC'){
    echo " <script>location='non-reg.php';</script>";
} else{
    echo " <script>location='in-house.php';</script>";
}


?>