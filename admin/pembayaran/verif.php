<?php
//Cek session
require_once("../auth/auth.php"); 
include_once('../../config/database.php');

$id     = $_GET['id'];
$status = $_GET['status'];

if ($status=='1'){
    $update = mysqli_query($mysqli, "UPDATE pembayaran 
                                    set STATUS = '0'
                                    WHERE ID_PEMBAYARAN='$id'");
} else {
    $update = mysqli_query($mysqli, "UPDATE pembayaran 
                                    set STATUS = '1'
                                    WHERE ID_PEMBAYARAN='$id'");
}

$select_histori = mysqli_query($mysqli, "SELECT h.*
                                         FROM histori h JOIN pendaftaran p
                                         ON h.ID_PENDAFTARAN = p.ID_PENDAFTARAN
                                         JOIN pembayaran pay
                                         ON p.ID_PENDAFTARAN = pay.ID_PENDAFTARAN
                                         AND pay.ID_PEMBAYARAN = '$id'");

foreach ($select_histori as $data){
    if ($data['STATUS']=='1'){
        $update_histori = mysqli_query($mysqli, "UPDATE histori 
                                                 SET STATUS = '0'
                                                 WHERE ID_HISTORI='".$data['ID_HISTORI']."'");
    } else {
        $update_histori = mysqli_query($mysqli,  "UPDATE histori 
                                                  SET STATUS = '1'
                                                  WHERE ID_HISTORI='".$data['ID_HISTORI']."'");
    }
}




echo " <script>location='pembayaran.php';</script>";

?>