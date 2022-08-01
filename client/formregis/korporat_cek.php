<?php 
require_once("../auth/auth.php"); 
require '../method.php';


$id = $_GET['idprog'];
$idbatch = $_GET['idbatch'];
$iduser = $_SESSION["user"]["ID_USER"];
// Cek apakah dia sudah mendaftar program ini
$select_histori = mysqli_query($koneksi,"SELECT h.* 
                                        FROM histori h, client c, pendaftaran p
                                        WHERE h.ID_CLIENT = c.ID_CLIENT
                                        AND c.ID_USER = '$iduser'
                                        AND h.ID_PENDAFTARAN = p.ID_PENDAFTARAN
                                        AND p.ID_BATCH = '$idbatch'");
if(mysqli_num_rows($select_histori) > 0){
    echo "<script>alert('Anda sudah terdaftar di program ini!');</script>";
    echo "<script>location='jenisdaftar.php?idprog=$id&idbatch=$idbatch';</script>";
}else{
    // Cek apakah dia udah punya data client belum
    $client = mysqli_query($koneksi,"SELECT * FROM client where ID_USER = '$iduser'");

    if(mysqli_num_rows($client) > 0){  
        echo "<script> 
        document.location.href = 'korporat_upload_excel.php?idprog=$id&idbatch=$idbatch';
        </script>";
        
    }else{
        echo "<script> 
        document.location.href = 'korporat_form.php?idprog=$id&idbatch=$idbatch';
        </script>";
    }
}





?>