<?php
//Cek session
require_once("../auth/auth.php"); 
include_once('../../config/database.php');
if(isset($_GET['id'])){
    $delete = mysqli_query($mysqli, "DELETE FROM client WHERE ID_CLIENT = '".$_GET['id']."'");
}

echo " <script>alert('Data berhasil dihapus!');</script>";
echo " <script>location='peserta.php';</script>";
?>