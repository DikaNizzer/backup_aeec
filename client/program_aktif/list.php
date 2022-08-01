<?php 
//Cek Login
require_once("../auth/auth.php"); 
require_once("../../config/database.php");

$iduser = $_SESSION["user"]["ID_USER"];

$tgl    = DATE("Y-m-d");

$pendaftaran = mysqli_query($mysqli, "SELECT * From client 
                                        join histori
                                        on client.ID_CLIENT = histori.ID_CLIENT
                                        join pendaftaran
                                        on histori.ID_PENDAFTARAN = pendaftaran.ID_PENDAFTARAN
                                        join batch_program
                                        on pendaftaran.ID_BATCH = batch_program.ID_BATCH
                                        where histori.STATUS = 1
                                        AND batch_program.TGL_BERAKHIR > '$tgl'
                                        and client.ID_USER = '$iduser'");
$data_daftar = $pendaftaran->fetch_assoc();

// AMBIL NPWP CLIENT
$npwp    = mysqli_query($mysqli, "SELECT BERKAS_NPWP FROM client 
                                            where ID_USER = '$iduser'" );
if(mysqli_num_rows($npwp) > 0){
    $ambil_data = $npwp->fetch_assoc();
    $nama_npwp    = $ambil_data['BERKAS_NPWP'];
}


// if($data_daftar != null){
    if(empty($nama_npwp)){
        $alert = 'kosong';
        echo " <script>alert('Mohon Upload berkas NPWP jika ingin mengakses akun MOOC!');</script>";
    }
// }
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
                                <h3>Program Aktif Anda</h3>
                                <p class="text-subtitle text-muted">Program Aktif yang Anda Ikuti</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <!-- <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="../dashboard/dashboard.php">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Program Aktif</li>
                                    </ol>
                                </nav> -->
                            </div>
                        </div>
                    </div>
                    

                    <!-- Basic Tables start -->
    <section class="section">
        <div class="card" >
            <div class="card-header">
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                    <thead> 
                        <tr>
                            <th>Nama Program</th>            
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Berakhir</th>
                            <th>Username MOOC</th>
                            <th>Password MOOC</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <?php foreach($pendaftaran as $hasil): ?>
                        <tr>
                            <td><?= $hasil['NAMA_CLASS'] ?> </td>
                            <td><?= $hasil['TGL_MULAI'] ?></td>
                            <td><?= $hasil['TGL_BERAKHIR'] ?></td>
                            <?php 
                                if(isset($alert)){
                                    ?>
                                    <td colspan="2"> 
                                    <a href="#" class="btn btn-warning" style="align:center">Upload NPWP</a>
                                    </td>
                                    <?php
                                }else{
                                    ?>
                                    <td><?= $hasil['USERNAME_MOOC'] ?></td>
                                    <td><?= $hasil['PASSWORD_MOOC'] ?></td> 

                                    <?php
                                }
                            ?>

                            <td><a href="nilai.php?id_history=<?= $hasil['ID_HISTORI']; ?>&idbatch=<?=$hasil['ID_BATCH']?>" class="btn btn-primary">Lihat</a></td>
                        </tr>
                    <?php endforeach; ?>                   
                    </tbody>
                    </div>
                </table>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->




                </div>


<!-- BAGIAN FOOTER -->
<!-- <footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>2022 &copy; AEEC</p>
        </div>
        <div class="float-end">
            <p>AIRLANGGA EXECUTIVE EDUCATION CENTER <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span></p>
        </div>
    </div>
</footer> -->
        </div>
            <!-- END HALAMAN UTAMA -->
        </div>
    </div>
    <script src="../../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    
<script src="../../assets/vendors/jquery/jquery.min.js"></script>
<script src="../../assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>
<script src="../../assets/vendors/fontawesome/all.min.js"></script>
<script>
    // Jquery Datatable
    let jquery_datatable = $("#table1").DataTable()
</script>

    <script src="../../assets/js/mazer.js"></script>
</body>

</html>