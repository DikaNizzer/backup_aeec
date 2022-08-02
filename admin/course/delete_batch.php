<?php
//Cek session
require_once("../auth/auth.php"); 
include_once('../../config/database.php');
if(isset($_GET['id'])){
    $cek = mysqli_query($mysqli, "SELECT ID_PROGRAM from batch_program WHERE ID_BATCH = '".$_GET['id']."'");
    $id  = $cek->fetch_assoc();
    $id_program = $id['ID_PROGRAM'];


    $kat      = mysqli_query($mysqli, "SELECT ID_KATEGORI from program WHERE ID_PROGRAM = '$id_program'");
    $id_kat   = $kat->fetch_assoc();
    $kategori = $id_kat['ID_KATEGORI'];


    $hapus = mysqli_query($mysqli, "DELETE FROM batch_program WHERE ID_BATCH = '".$_GET['id']."'");
}


echo " <script>alert('Data berhasil dihapus!');</script>";
if($kategori == 'RC'){
    echo " <script>location='detail_regular.php?id=$id_program';</script>";
} else if($kategori == 'NRC'){
    echo " <script>location='detail_non-reg.php?id=$id_program';</script>";
} else{
    echo " <script>location='in-house.php';</script>";
}

 

?>