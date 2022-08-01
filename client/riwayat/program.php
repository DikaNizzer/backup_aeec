<?php 
//Cek Login
require_once("../auth/auth.php"); 
require_once("../../config/database.php");

$id_user = $_SESSION["user"]["ID_USER"];

$tgl    =DATE("Y-m-d");

$pendaftaran = mysqli_query($mysqli, "SELECT pr.NAMA_PROGRAM, pn.ID_PENDAFTARAN, b.TGL_MULAI, b.TGL_BERAKHIR
                                      FROM program pr, batch_program b, pendaftaran pn, client c
                                      WHERE pr.ID_PROGRAM = b.ID_PROGRAM
                                      AND pn.ID_BATCH = b.ID_BATCH
                                      AND pn.ID_CLIENT = c.ID_CLIENT
                                      AND b.TGL_BERAKHIR < '$tgl'
                                      AND c.ID_USER = '$id_user'");
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
<!-- BAGIAN SIDEBAR -->
<?php include_once('../sidebar/sidebar.php'); ?>


<!-- BAGIAN UTAMA CODING [MULAI main-content] -->

                    <!-- HALAMAN UTAMA -->
                    <!-- <div id="main-content"> -->
                
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>History Program Anda</h3>
                                <p class="text-subtitle text-muted">Program Anda yang Sudah Terlaksana</p>
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
                            <th>ID Pendaftaran</th> 
                            <th>Nama Program</th>            
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Berakhir</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php foreach($pendaftaran as $hasil): ?>
                        <tr>
                            <td><?= $hasil['ID_PENDAFTARAN'] ?> </td>
                            <td><?= $hasil['NAMA_PROGRAM'] ?> </td>
                            <td><?= $hasil['TGL_MULAI'] ?></td>
                            <td><?= $hasil['TGL_BERAKHIR'] ?></td>    
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