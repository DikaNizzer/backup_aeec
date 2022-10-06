<?php 
//Cek Login
require_once("../auth/auth.php"); 
require '../method.php';

$idbatch = $_GET['idbatch'];
$id = $_GET['idprog'];



$program = query("SELECT * FROM program where ID_PROGRAM = '$id'");
foreach($program as $hasil){
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
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
                                <h3>Pendaftaran</h3>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                </nav>
                            </div>
                        </div>
                    </div>
                       <!-- Basic Tables start -->
                       <section class="section">
                        <div class="card" >
                            <div class="card-header">
                            <h4><?= $hasil['NAMA_PROGRAM'] ?><h4>
                            

                            </div>
                            <div class="card-body">
                                
                
                            <section class="section">
                        <div class="row">
                            <div class="col-12 col-md-8 offset-md-2">
                                <div class="pricing">
                                    <div class="row align-items-center">
                                        <div class="col-md-6 px-0">
                                            <div class="card">
                                                <div class="card-header text-center">
                                                    <h4 class="card-title">Kolektif</h4>
                                                    <p class="text-center">Minimal 4 Orang dan Maksimal 9 Orang</p>
                                                    <p>Pendaftar harus berasal dari institusi yang sama</p>
                                                </div>
                                                <h1 class="price"><i class="bi bi-people"></i></h1>
                                            
                                                <div class="card-footer">
                                                    <a href="workshop_cekForm.php?idprog=<?=$hasil['ID_PROGRAM']?>&idbatch=<?=$_GET['idbatch'] ?>&jenisDaftar=2"><button class="btn btn-primary btn-block">Daftar</button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 px-0">
                                            <div class="card card-highlighted">
                                                <div class="card-header text-center">
                                                    <h4 class="card-title">Individu</h4>
                                                    <br>
                                                    <p>   </p>
                                                    <p>   </p>
                                                </div>
                                                <h1 class="price text-white"><i class="bi bi-person-fill"></i></h1>
                                                <br><br><br>
                                                <div class="card-footer">
                                                    <a href="workshop_cekForm.php?idprog=<?=$hasil['ID_PROGRAM']?>&idbatch=<?=$_GET['idbatch'] ?>&jenisDaftar=1"><button class="btn btn-outline-white btn-block">Daftar</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                            </div>
                        </div>
                
                    </section>
                    <!-- Basic Tables end -->
                </div>
        </div>
            <!-- END HALAMAN UTAMA -->
        </div>
    </div>


    <script src="../../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    
    <script src="../../assets/js/mazer.js"></script>
</body>

</html>