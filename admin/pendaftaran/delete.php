<?php
//Cek session
require_once("../auth/auth.php"); 
include_once('../../config/database.php');

$id     = $_GET['id'];
    $delete = mysqli_query($mysqli, "DELETE FROM `pendaftaran` WHERE (`ID_PENDAFTARAN` = $id)");
echo " <script>location='pendaftaran.php';</script>";

?>