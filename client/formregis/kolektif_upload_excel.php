<?php 
require_once("../auth/auth.php"); 
require '../method.php';

$idprog    = $_GET['idprog'];
$idbatch   = $_GET['idbatch'];
$iduser = $_SESSION["user"]["ID_USER"];

$program = query("SELECT * FROM program where ID_PROGRAM = '$idprog'");
foreach($program as $hasil){
}

// AMBIL NPWP
$cek = mysqli_query($koneksi, "SELECT BERKAS_NPWP FROM client where ID_USER='$iduser'");
$berkas_npwp  = $cek->fetch_assoc();
$path_npwp = $berkas_npwp['BERKAS_NPWP'];


// Untuk Ganti NPWP
if (isset($_POST["ganti"])) {
    unlink('../../assets/NPWP/'.$path_npwp);

    // UNTUK BUKTI NPWP
    $npwp           = $_FILES['update']['name'];
    $lokasi         = $_FILES['update']['tmp_name'];

    //hanya boleh up Exce;
    $ekstensiupload = explode('.', $npwp);
    $ekstensiupload = strtolower (end($ekstensiupload));

    //upload
    //Ganti Nama
    $namafotobaru= uniqid();
    $namafotobaru.= ".";
    $namafotobaru.=$ekstensiupload;


    move_uploaded_file($lokasi, '../../assets/NPWP/'.$namafotobaru);

    $update_npwp         = mysqli_query($koneksi, "UPDATE `client` SET `BERKAS_NPWP` = '$namafotobaru' 
                        WHERE (`ID_USER` = '$iduser')");

    if (mysqli_affected_rows($koneksi) > 0){
        echo "<script> 
                alert('NPWP berhasil diperbarui');
                document.location.href = 'kolektif_upload_excel.php?idprog=$idprog&idbatch=$idbatch';
            </script>";
    }else{
        echo "<script> 
        alert('NPWP gagal diperbarui');
        document.location.href = 'kolektif_upload_excel.php?idprog=$idprog&idbatch=$idbatch';
        </script>";
    }
}

// untuk EXCEL
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();
require_once ('../../vendor/autoload.php');

if (isset($_POST["import"])) {

    // var_dump($_POST["import"]);
    // exit;
    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $namafile= $_FILES['file']['name'];
        $tempat = $_FILES['file']['tmp_name'];
        //hanya boleh up Exce;
        $ekstensiboleh = ['xls', 'xlsx'];
        $ekstensiupload = explode('.', $namafile);
        $ekstensiupload = strtolower (end($ekstensiupload));

         //upload
        //Ganti Nama
        $namafotobaru= uniqid();
        $namafotobaru.= ".";
        $namafotobaru.=$ekstensiupload;

        $targetPath = '../../assets/excel/' . $namafotobaru;
        move_uploaded_file($tempat, $targetPath);

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);

        if($sheetCount < 5){
            echo "<script> 
            alert('Data Yang Anda Masukkan Dalam Excel Kurang Dari dari 4 Peserta, Mohon Lengkapi Data !');
            document.location.href = 'kolektif_upload_excel.php?idprog=$idprog&idbatch=$idbatch';
            </script>";
            exit;
        }

        for ($i = 2; $i <= $sheetCount; $i ++) {
            $email = "";
            if (isset($spreadSheetAry[$i][1])) {
                $email = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
            }
            
            $pass = "";
            if (isset($spreadSheetAry[$i][2])) {
                $pass = mysqli_real_escape_string($conn, $spreadSheetAry[$i][2]);
            }
            $name = "";
            if (isset($spreadSheetAry[$i][0])) {
                $name = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
            }
            $jk = "";
            if (isset($spreadSheetAry[$i][3])) {
                $gender = strtolower (mysqli_real_escape_string($conn, $spreadSheetAry[$i][3]));
                if($gender == 'l'){
                    $jk = 0;
                }else if($gender == 'p'){
                    $jk = 1;
                }
            }
            $notelp = "";
            if (isset($spreadSheetAry[$i][4])) {
                $notelp = mysqli_real_escape_string($conn, $spreadSheetAry[$i][4]);
            }
            $npwp = "";
            if (isset($spreadSheetAry[$i][5])) {
                $npwp = mysqli_real_escape_string($conn, $spreadSheetAry[$i][5]);
            }
            $alamatnpwp = "";
            if (isset($spreadSheetAry[$i][6])) {
                $alamatnpwp = mysqli_real_escape_string($conn, $spreadSheetAry[$i][6]);
            }
            $alamatrumah = "";
            if (isset($spreadSheetAry[$i][7])) {
                $alamatrumah = mysqli_real_escape_string($conn, $spreadSheetAry[$i][7]);
            }
            $instansi = "";
            if (isset($spreadSheetAry[$i][8])) {
                $instansi = mysqli_real_escape_string($conn, $spreadSheetAry[$i][8]);
            }
            $jabatan = "";
            if (isset($spreadSheetAry[$i][9])) {
                $jabatan = mysqli_real_escape_string($conn, $spreadSheetAry[$i][9]);
            }
            
            $alumni = "";
            if (isset($spreadSheetAry[$i][10])) {
                $al = strtolower (mysqli_real_escape_string($conn, $spreadSheetAry[$i][10]));
                if($al == 'tidak'){
                    $alumni = 0;
                }else if($al == 'ya'){
                    $alumni = 1;
                }
            }
            $fakultas = "";
            $idfak = "";
            if (isset($spreadSheetAry[$i][11])) {
                $fakultas = strtolower (mysqli_real_escape_string($conn, $spreadSheetAry[$i][11]));
                //ambil Fakultas
                if($fakultas == 'fib'){
                    $idfak = 'F01';
                }else if($fakultas == 'feb'){
                    $idfak = 'F02';
                }else if($fakultas == 'fk'){
                    $idfak = 'F03';
                }else if($fakultas == 'fkg'){
                    $idfak = 'F04';
                }else if($fakultas == 'fkh'){
                    $idfak = 'F05';
                }else if($fakultas == 'fpk'){
                    $idfak = 'F06';
                }else if($fakultas == 'fpsi'){
                    $idfak = 'F07';
                }else if($fakultas == 'ffarm'){
                    $idfak = 'F08';
                }else if($fakultas == 'fkm'){
                    $idfak = 'F09';
                }else if($fakultas == 'fst'){
                    $idfak = 'F10';
                }else if($fakultas == 'fh'){
                    $idfak = 'F11';
                }else if($fakultas == 'fkep'){
                    $idfak = 'F12';
                }else if($fakultas == 'fisip'){
                    $idfak = 'F13';
                }else if($fakultas == 'fv'){
                    $idfak = 'F14';
                }else if($fakultas == 'pasca'){
                    $idfak = 'F15';
                }else if($fakultas == 'ftmm'){
                    $idfak = 'F16';
                }
            }

            $notif_email = "";
            if (isset($spreadSheetAry[$i][10])) {
                $em = strtolower (mysqli_real_escape_string($conn, $spreadSheetAry[$i][12]));
                if($em == 'tidak'){
                    $notif_email = 0;
                }else if($em == 'ya'){
                    $notif_email = 1;
                }
            }

            $notif_news = "";
            if (isset($spreadSheetAry[$i][10])) {
                $news = strtolower (mysqli_real_escape_string($conn, $spreadSheetAry[$i][12]));
                if($news == 'tidak'){
                    $notif_news = 0;
                }else if($news == 'ya'){
                    $notif_news = 1;
                }
            }
            

            
            
            if ($name!=null & $email!=null) {
                
                // input user
                $password = password_hash($pass, PASSWORD_DEFAULT);
                $queri = "INSERT INTO `user` (`EMAIL`, `PASSWORD`, `ROLE`, `AEEC_EMAIL`, `AEEC_NEWSLETTER`) VALUES ('$email', '$password', 'user', '$notif_email', '$notif_news')";
                $hasil = mysqli_query($conn, $queri);

                //ambil id_user
                $id         = mysqli_query($conn,"SELECT ID_USER FROM user ORDER BY ID_USER DESC LIMIT 1");
                $row_id     = $id->fetch_assoc();
                $id_user = $row_id['ID_USER'];

                // input client
                // $query = "INSERT INTO client (`ID_USER`, `NAMA`, `JK`, `NO_TELP`, `NPWP`, `ALAMAT_NPWP`, `ALAMAT_RUMAH`, `INSTANSI`,`JABATAN`, `ALUMNI`, `ID_FAKULTAS`) 
                // VALUES('$id_user','$name','$jk','$notelp','$npwp','$alamatnpwp','$alamatrumah','$instansi','$jabatan', '$alumni', '$idfak')";
                
                if($fakultas != null){
                    $client         = mysqli_query($conn, "INSERT INTO client (ID_USER, NAMA, JK, NO_TELP, NPWP, ALAMAT_NPWP, ALAMAT_RUMAH, INSTANSI, ALUMNI, ID_FAKULTAS, JABATAN) 
                                                             VALUES ('$id_user','$name', '$jk', '$notelp', '$npwp', '$alamatnpwp', '$alamatrumah', '$instansi', '$alumni','$idfak', '$jabatan')");
                }else{
                    $client         = mysqli_query($conn, "INSERT INTO client (ID_USER, NAMA, JK, NO_TELP, NPWP, ALAMAT_NPWP, ALAMAT_RUMAH, INSTANSI, ALUMNI, JABATAN) 
                                                             VALUES ('$id_user','$name', '$jk', '$notelp', '$npwp', '$alamatnpwp', '$alamatrumah', '$instansi', '$alumni', '$jabatan')");
                }
                
                $paramType = "ssssssssss";
                $jumlahInput = $sheetCount -2;

                $paramArray = array(
                    $name,
                    $jk,
                    $notelp,
                    $npwp,
                    $alamatnpwp,
                    $alamatrumah,
                    $instansi,
                    $jabatan,
                    $alumni
                );

                // $result = mysqli_query($conn, $query);

                // if (! empty($insertId)) {
                    
                if($result = true){
                    $type = "success";
                    $message = "Data Berhasil Dimasukkan";

                    echo"<script>location='kolektif_tampil_excel.php?idprog=$idprog&idbatch=$idbatch&jenis=$type&pesan=$message&jumlah=$jumlahInput'</script>";
                } else {
                    $type = "error";
                    $message = "Data Gagal Dimasukkan";
                }
            }
            // else if(empty($name)) {
            //     $type = "error";
            //     $message = "Data Gagal Dimasukkan Ada Data Yang Kosong";
            // }
        }
    } else {
        $type = "error";
        $message = "Invalid Tipe File. Upload File Excel Sesuai Template.";
    }

    
}

?>

<!-- BAGIAN HEADER -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airlangga Executive Education</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    
<!-- <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="../../assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="../../assets/vendors/fontawesome/all.min.css">
<style>
    table.dataTable td{
        padding: 15px 8px;
    }
    .fontawesome-icons .the-icon svg {
        font-size: 24px;
    }
        #response {
            padding: 10px;
            margin-top: 10px;
            border-radius: 2px;
            display: none;
        }

        .success {
            background: #c7efd9;
            border: #bbe2cd 1px solid;
        }

        .error {
            background: #fbcfcf;
            border: #f3c6c7 1px solid;
        }

        div#response.display-block {
            display: block;
        }
        </style>

<link rel="stylesheet" href="../../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
<link rel="stylesheet" href="../../assets/vendors/bootstrap-icons/bootstrap-icons.css">
<link rel="stylesheet" href="../../assets/css/app.css">
<link rel="shortcut icon" href="../../assets/images/favicon.svg" type="image/x-icon">
</head>

<body>

<?php include_once('../sidebar/sidebar.php'); ?>

    </ul>
</div>
<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
    </div>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
<!-- BAGIAN UTAMA CODING [MULAI main-content] -->

<!-- HALAMAN UTAMA -->
<!-- <div id="main-content"> -->
                
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Pendaftaran</h3>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Pendaftaran</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Kolektif</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

            <!-- CARD UNTUK FORM -->
            <section class="section">
                <div class="card" >
                    <div class="card-header">
                        <h4><?= $hasil['NAMA_PROGRAM'] ?><h4>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                        <h4 class="card-title">Mohon Isi File dengan Data yang Sudah Benar</h4>
                        <p> Unduh Template File : <a href="../../assets/template/kolektif.xlsx"><i class="bi bi-file-arrow-down-fill fs-4"></i></a> </p>
                    
                            <p>
                                <b>Keterangan : </b>
                            </p>
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Data diri anda akan dihitung sebagai peserta</span>
                                    <span class="badge bg-primary badge-pill badge-round ml-1">1</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Anda tidak perlu memasukkan data diri anda ke dalam excel</span>
                                    <span class="badge bg-primary badge-pill badge-round ml-1">2</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Pastikan data diri yang anda masukkan ke excel benar !</span>
                                    <span class="badge bg-primary badge-pill badge-round ml-1">3</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Pastikan anda mengisikan data sesuai dengan template yang tersedia</span>
                                    <span class="badge bg-primary badge-pill badge-round ml-1">4</span>
                                </li>
                            </ul>

                            <p class="me-1 mt-3 mb-0">Pastikan NPWP anda adalah NPWP perusahaan !</p>
                            <a href="../../assets/NPWP/<?= $path_npwp ?>" class="btn btn-primary me-1 mt-0" target="_blank" rel="noopener noreferrer"><i class="bi bi-download"></i><span> NPWP Anda</span></a>
                            
                            <p class="me-1 mt-3 mb-0">Silahkan upload ulang NPWP anda jika tidak sesuai</p>
                            <button class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#exampleModalCenter"><i class="bi bi-arrow-counterclockwise"></i>Ganti NPWP Anda</button>
                            
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical " method="post" action=""  enctype="multipart/form-data" name="frmExcelImport" id="frmExcelImport">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Berkas Pendaftaran</label>
                                                <input class="form-control"  required  type="file" name="file" id="file" accept=".xls,.xlsx">
                                            </div>
                                        </div>
                                                                                
                                        <div class="col-12 d-flex justify-content-end">
                                            <button class="btn btn-primary me-1 mb-1" type="submit" id="submit" name="import">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
            </div>
        </div>
    </section>


                
            
                    <!-- END CARD -->
                    <!-- Basic Tables end -->
                </div>


<!-- BAGIAN FOOTER -->
<!-- <footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>2021 &copy; Mazer</p>
        </div>
        <div class="float-end">
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                by <a href="https://ahmadsaugi.com">Saugi</a></p>
        </div>
    </div>
</footer> -->
        </div>
            <!-- END HALAMAN UTAMA -->
        </div>
    </div>

    <!-- Modal Ganti NPWP -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Masukkan NPWP perusahaan anda
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form form-vertical " method="post" action=""  enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Berkas NPWP Perusahaan</label>
                                        <input class="form-control"  required  type="file" name="update" id="update" >
                                    </div>
                                </div>
                                                                        
                                <div class="col-12 d-flex justify-content-end">
                                    <button class="btn btn-primary me-1 mb-1" type="submit" id="submit" name="ganti">Ganti</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    <button type="button" class="btn btn-light-secondary me-1 mb-1"
                                        data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Tutup</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Accept</span>
                    </button>
                </div> -->
            </div>
        </div>
    </div>


    <script src="../../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    
    <script src="../../assets/js/mazer.js"></script>


    <!-- Include Choices JavaScript -->
<script src="../../assets/vendors/choices.js/choices.min.js"></script>
<script src="../../assets/js/pages/form-element-select.js"></script>


</body>

</html>

