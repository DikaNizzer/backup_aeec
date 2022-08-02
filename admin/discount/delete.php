<?php
//Cek session
require_once("../auth/auth.php"); 
include_once('../../config/database.php');
if(isset($_GET['id'])){
    $cek    = mysqli_query($mysqli, "SELECT ID_DISKON from diskon WHERE ID_DISKON = '".$_GET['id']."'");
    $id     = $cek->fetch_assoc();
    $diskon = $id['ID_DISKON'];
    $hapus  = mysqli_query($mysqli, "DELETE FROM diskon WHERE ID_DISKON = '".$_GET['id']."'");
}

echo " <script>alert('Data berhasil dihapus!');</script>";
echo " <script>location='discount.php';</script>";

 

?>