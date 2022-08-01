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
                <h3>Diskon Utama</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Diskon</li>
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
                                <th>ID</th>
                                <th>Diskon</th>
                                <th>Presentase</th>
                                <th>Deskripsi</th>
                                <th>Detail</th>
                                <th>Edit</th>   
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query_diskon = "SELECT * FROM diskon WHERE ID_DISKON IN ('1','2', '3') ";
                        $tabel_diskon = mysqli_query($mysqli, $query_diskon);
                        foreach ($tabel_diskon as $data_diskon) :                            
                        ?>
                        <tr>
                            <td><?php echo $data_diskon['ID_DISKON']; ?></td>
                            <td><?php echo $data_diskon['NAMA_DISKON']; ?></td> 
                            <td><?php echo $data_diskon['BENTUK'].' '.$data_diskon['PERSENTASE'].'%'; ?></td> 
                            <td><?php echo $data_diskon['DESKRIPSI']; ?></td> 
                            <td>
                                <a href="detail.php?id=<?php echo $data_diskon['ID_DISKON']; ?>" class="btn btn-primary">Detail</a>
                            </td>
                            <td>
                                <a href="edit.php?id=<?php echo $data_diskon['ID_DISKON']; ?>" class="btn btn-warning">Edit</a>
                            </td>
                              
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



        <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Kode Voucher</h3>
        </div>
        <section class="section">
        <div class="card" >
            <div class="card-header">
                <a href="insert.php" class="btn btn-success">Add +</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                        <thead> 
                            <tr>
                                <th>ID</th>
                                <th>Diskon</th>
                                <th>Kode</th>
                                <th>Presentase</th>
                                <th>Detail</th>
                                <th>Edit</th>   
                                <th>Delete</th>  
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query_voucher = "SELECT * FROM diskon WHERE ID_DISKON NOT IN ('1', '2', '3')";
                        $tabel_voucher = mysqli_query($mysqli, $query_voucher);
                        foreach ($tabel_voucher as $data_voucher) :                            
                        ?>
                        <tr>
                            <td><?php echo $data_voucher['ID_DISKON']; ?></td>
                            <td><?php echo $data_voucher['NAMA_DISKON']; ?></td> 
                            <td>
                                <?php
                                if($data_voucher['KODE'] != NULL){
                                    echo $data_voucher['KODE'];
                                }else{
                                echo '-'; 
                                }
                                ?>
                            </td> 
                            <td><?php echo $data_voucher['BENTUK'].' '.$data_voucher['PERSENTASE'].'%'; ?></td> 
                            <td>
                                <a href="detail.php?id=<?php echo $data_voucher['ID_DISKON']; ?>" class="btn btn-primary">Detail</a>
                            </td>
                            <td>
                                <a href="edit.php?id=<?php echo $data_voucher['ID_DISKON']; ?>" class="btn btn-warning">Edit</a>
                            </td>
                            <td>
                                <a href="delete.php?id=<?php echo $data_voucher['ID_DISKON']; ?>" class="btn btn-danger">Delete</a>
                            </td>              
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
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <ahref="http://ahmadsaugi.com">A. Saugi</a></p>
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
