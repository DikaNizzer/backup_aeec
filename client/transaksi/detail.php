<?php
include_once('../../config/database.php');
require_once("../auth/auth.php"); 
require '../method.php';

$iduser = $_SESSION["user"]["ID_USER"];
$id     = $_GET['id'];

$daftar = mysqli_query($mysqli, "SELECT p.*, c.*, b.BATCH, pr.*
                                    FROM pendaftaran p JOIN client c
                                    ON p.ID_CLIENT = c.ID_CLIENT
                                    JOIN batch_program b
                                    ON b.ID_BATCH = p.ID_BATCH
                                    JOIN program pr
                                    ON b.ID_PROGRAM = pr.ID_PROGRAM
                                    AND p.ID_PENDAFTARAN = '$id'
");
foreach($daftar as $hasil){
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Airlangga Executive Education</title>
    
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../../assets/css/bootstrap.css">
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
        <a href="#" class="burger-btn d-block d-xl-none"><i class="bi bi-justify fs-3"></i></a>
    </header>
            
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail Pendaftaran</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end"></nav>
            </div>
        </div>
    </div>

    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class ="col-4">No Pendaftaran</th>    
                            <td><?=$hasil['ID_PENDAFTARAN'] ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Pendaftaran</th>    
                            <td><?=$hasil['TGL_PENDAFTARAN'] ?></td>
                        </tr>
                        <tr>
                            <th>ID Pendaftar</th>    
                            <td><?=$hasil['ID_CLIENT'] ?></td>
                        </tr>
                        <tr>
                            <th>Nama Pendaftar</th>    
                            <td><?=$hasil['NAMA'] ?></td>
                        </tr>
                        <tr>
                            <th>ID Program</th>    
                            <td><?=$hasil['ID_PROGRAM'] ?></td>
                        </tr>
                        <tr>
                            <th>Nama Program</th>    
                            <td><?=$hasil['NAMA_PROGRAM'] ?></td>
                        </tr>
                        <tr>
                            <th>Batch</th>    
                            <td><?=$hasil['BATCH'] ?></td>
                        </tr>                   
                        <tr>
                            <th>Status</th>    
                            <td>
                            <?php
                            if($hasil['STATUS']=='1'){
                            ?>
                            <a href=""><font color="success"><i><b>Verifed</b></i></font></a>
                            <?php
                            }else{
                            ?>
                            <a href=""><font color="grey"><i><b>Unverified</b></i></font></a>
                            <?php
                            }
                            ?>     
                            </td>
                        </tr>
                        <tr>
                            <th>Virtual Account</th>    
                            <td>
                            <?php
                            if($hasil['VIRTUAL_ACC']!=null){
                            ?>
                            <a href=""><font color="success"><i><b><?= $hasil['VIRTUAL_ACC'] ?></b></i></font></a>
                            <?php
                            }else{
                            ?>
                            <a href=""><font color="grey"><i><b>Menunggu virtual account</b></i></font></a>
                            <?php
                            }
                            ?>     
                            </td>
                        </tr>
                        <tr>
                            <th>Invoice</th>    
                            <td>
                            <?php
                            if($hasil['INVOICE']!=null){
                            ?>
                             <a href="../../assets/invoice/<?=$hasil['INVOICE'];?>" class="btn btn-primary"><i class="bi bi-download"></i><span> Invoice</span></a>
                            <?php
                            }else{
                            ?>
                            <a href=""><font color="grey"><i><b>Menunggu invoice</b></i></font></a>
                            <?php
                            }
                            ?>     
                            </td>
                        </tr>
                        
                    </thead>
                </table>   
                <a href="pendaftaran.php" class="btn btn-primary">Kembali</a>  
                <?php
                            $select_pembayaran = mysqli_query($mysqli, "SELECT * FROM pembayaran WHERE ID_PENDAFTARAN = '$id'");

                            if($hasil['VIRTUAL_ACC']!=null & mysqli_num_rows($select_pembayaran) == 0){
                            ?>
                              <a href="bayar.php?id=<?=$hasil['ID_PENDAFTARAN']?>" class="btn btn-success">Bayar</a>
                            <?php
                            }else{
                            ?>
                                 <a href="" class="btn btn-secondary">Bayar</a>
                            <?php
                            }
                            ?>          
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
