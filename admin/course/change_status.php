<?php
//Cek session
require_once("../auth/auth.php"); 
include_once('../../config/database.php');

        $cek = mysqli_query($mysqli, "SELECT ID_PROGRAM from batch_program WHERE ID_BATCH = '".$_GET['id']."'");
        $id  = $cek->fetch_assoc();
        $id_program = $id['ID_PROGRAM'];

        $kat      = mysqli_query($mysqli, "SELECT ID_KATEGORI from program WHERE ID_PROGRAM = '$id_program'");
        $id_kat   = $kat->fetch_assoc();
        $kategori = $id_kat['ID_KATEGORI'];
            

        $program = mysqli_query($mysqli, "SELECT STATUS from batch_program WHERE ID_BATCH = '".$_GET['id']."'");
        $data    = mysqli_fetch_assoc($program);
        $status  = $data['STATUS'];

        if($status == 0){
            $update = mysqli_query($mysqli,"UPDATE batch_program SET STATUS='1' WHERE ID_BATCH = '".$_GET['id']."'");
        }else{
            $update = mysqli_query($mysqli,"UPDATE batch_program SET STATUS='0' WHERE ID_BATCH = '".$_GET['id']."'");
        }

        echo "<script> alert('status berhasil diganti!'); </script>";


        if($kategori == 'RC'){
            echo " <script>location='detail_regular.php?id=$id_program';</script>";
        } else if($kategori == 'NRC'){
            echo " <script>location='detail_non-reg.php?id=$id_program';</script>";
        } else{
            echo " <script>location='in-house.php';</script>";
        }

?>

