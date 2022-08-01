<?php
//Cek session
require_once("../auth/auth.php"); 
include_once('../../config/database.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AEEC || Administrator</title>
    
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
            
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Pembayaran</h3>
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
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                    <thead> 
                        <tr>
                            <th>ID Pembayaran</th>
                            <th>ID Pendaftaran</th>
                            <th>Nama Program</th>                        
                            <th>Tanggal Bayar</th>
                            <th>Status</th>
                            <th>Detail</th>
                            <!-- <th>Nota</th> -->
                        </tr>
                    </thead>


                    <tbody>
                    <?php
                        $pembayaran = mysqli_query($mysqli, "SELECT  pay.*, b.*
                                                             FROM pembayaran pay JOIN pendaftaran p
                                                             ON pay.ID_PENDAFTARAN = p.ID_PENDAFTARAN
                                                             JOIN batch_program b
                                                             ON p.ID_BATCH = b.ID_BATCH");
                        
                        foreach ($pembayaran as $data_bayar) : 
                        ?>
                        <tr>
                            <td><?php echo $data_bayar['ID_PEMBAYARAN'];?></td>
                            <td><?php echo $data_bayar['ID_PENDAFTARAN'];?></td>
                            <td><?php echo $data_bayar['NAMA_CLASS'];?></td>
                            <td><?php echo $data_bayar['TGL_PEMBAYARAN'];?></td>  
                            <td>
                                <?php
                                $cek_status = mysqli_query($mysqli,"SELECT * FROM pembayaran WHERE ID_PEMBAYARAN = '".$data_bayar['ID_PEMBAYARAN']."'");
                                $cek        = $cek_status->fetch_assoc();
                                if($cek['STATUS']=='1'){
                                    ?>
                                    <a href="verif.php?id=<?php echo $data_bayar['ID_PEMBAYARAN']; ?>&status=<?= $cek['STATUS'] ?>"><font color="success"><i><b>Verifed</b></i></font></a>
                                    <?php
                                    }else{
                                    ?>
                                     <a href="verif.php?id=<?php echo $data_bayar['ID_PEMBAYARAN']; ?>&status=<?= $cek['STATUS'] ?>"><font color="grey"><i><b>Unverifed</b></i></font></a>
                                    <?php
                                    }
                                    ?>
                            </td>
                            <td>
                                <a href="detail.php?id=<?php echo $data_bayar['ID_PEMBAYARAN']; ?>&iddaftar=<?= $data_bayar['ID_PENDAFTARAN']; ?>" class="btn btn-primary">Detail</a>
                            </td>    
                            <!-- <td>
                                <a href="nota.php?id=<?php echo $data_bayar['ID_PEMBAYARAN']; ?>" class="btn btn-primary">Nota</a>
                            </td>           -->
                        </tr>   
                        <?php
                        endforeach
                        ?>                   
                    </tbody>
                    </div>

                </table>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->
</div>

            <!-- <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer> -->
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