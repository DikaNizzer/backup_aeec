<?php

//var untuk nyambung ke db
$koneksi = mysqli_connect("localhost", "root", "", "aeec_pendaftaran");


//Function untuk kuery db dan mengembalikan hasilnya berupa array
function query($query){
    global $koneksi;

    $hasil = mysqli_query($koneksi, $query); //membuat query mysql
    $data = [];

    while($sql = mysqli_fetch_assoc($hasil) ) { //mengambil data di mysql
        $data[] = $sql;
    }

    return  $data;
}




?>