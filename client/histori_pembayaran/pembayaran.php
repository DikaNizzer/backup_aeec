<?php 
//Cek Login
require_once("../auth/auth.php"); 
require_once("../../config/database.php");

$iduser = $_SESSION["user"]["ID_USER"];

$pembayaran = mysqli_query($mysqli, "SELECT  pay.*, p.*, b.*,c.*
                                     FROM pembayaran pay JOIN pendaftaran p
                                     ON pay.ID_PENDAFTARAN = p.ID_PENDAFTARAN
                                     JOIN batch_program b
                                     ON p.ID_BATCH = b.ID_BATCH
                                     JOIN client c
                                     ON p.ID_CLIENT = c.ID_CLIENT
                                     AND c.ID_USER = '$iduser'");
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
                                <h3>Pembayaran</h3>
                                <p class="text-subtitle text-muted">Verifikasi oleh admin dilakukan dengan estimasi 2x24 jam</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="../dashboard/dashboard.php">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Riwayat Pembayaran</li>
                                    </ol>
                                </nav>
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
                            <th>ID Pembayaran</th>
                            <th>ID Pendaftaran</th>
                            <th>Nama Program</th>            
                            <th>Tanggal Pembayaran</th>
                            <th>Bukti Bayar</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <?php foreach($pembayaran as $hasil): ?>
                        <tr>
                            <td><?= $hasil['ID_PEMBAYARAN'] ?> </td>  
                            <td><?= $hasil['ID_PENDAFTARAN'] ?> </td>
                            <td><?= $hasil['NAMA_CLASS'] ?></td>
                            <td><?= $hasil['TGL_PEMBAYARAN'] ?></td>
                            <td>
                                <a href="../../assets/bukti_bayar/<?php echo $hasil['BUKTI'];?>"><font color="blue"><i><b>Tampilkan</b></i></font></a>
                            </td>   
                            <td>
                                <a href="nota.php?id=<?php echo $hasil['ID_PEMBAYARAN']; ?>" class="btn btn-primary">Nota</a>
                            </td>    
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