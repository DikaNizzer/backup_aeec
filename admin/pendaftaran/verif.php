<?php
//Cek session
require_once("../auth/auth.php"); 
include_once('../../config/database.php');

$id     = $_GET['id'];
$status = $_GET['status'];

if ($status=='1'){
    $update = mysqli_query($mysqli, "UPDATE pendaftaran 
        set STATUS=0
        WHERE ID_PENDAFTARAN='$id'");
} else {
    $update = mysqli_query($mysqli, "UPDATE pendaftaran 
        set STATUS=1
        WHERE ID_PENDAFTARAN='$id'");
}

echo " <script>location='pendaftaran.php';</script>";

?>