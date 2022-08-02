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
                <h3>Edit Data Batch</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                </nav>
            </div>
        </div>
    </div>

    <!-- Basic Tables start -->
    <?php
    $query_batch = "SELECT * FROM batch_program WHERE ID_BATCH = '".$_GET['id']."' ";
    $tabel_batch = mysqli_query($mysqli, $query_batch);    
    $data_batch  = $tabel_batch->fetch_assoc();  
    ?>
     <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" >Edit  Batch</h4>
                    </div>
                    <!-- <div class="card-content"> -->
                        <div class="card-body">
                            <form class="form form-vertical" method="post" action=""  enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                    <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Kode Batch</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="id_batch" readonly value="<?php echo $data_batch['ID_BATCH'];?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Kode Program</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="id_program" readonly value="<?php echo $data_batch['ID_PROGRAM'];?>" required>
                                            </div>
                                        </div>
                                    
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Tanggal Mulai</label>
                                                <input type="date" id="first-name-vertical" class="form-control"
                                                    name="tgl_mulai" value="<?php echo $data_batch['TGL_MULAI'];?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Tanggal Berakhir</label>
                                                <input type="date" id="first-name-vertical" class="form-control"
                                                    name="tgl_berakhir" value="<?php echo $data_batch['TGL_BERAKHIR'];?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Kuota</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="kuota" value="<?php echo  $data_batch['KUOTA']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Batch</label>
                                                <input type="number" id="first-name-vertical" class="form-control"
                                                    name="batch" value="<?php echo $data_batch['BATCH'];?>" required>
                                            </div>
                                        </div>           
                                       <br></br>
                                       <br></br>
                                
                                        <div class="col-12 d-flex justify-content-end ">
                                            <button type="submit" name="edit" value="edit" class="btn btn-primary me-1 mb-1">UPDATE</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <?php
                  if(isset($_POST['edit'])){
                    $id_batch      = $_POST['id_batch'];
                    $id_program    = $_POST['id_program'];
                    $tgl_mulai     = $_POST['tgl_mulai'];
                    $tgl_berakhir  = $_POST['tgl_berakhir'];
                    $batch         = $_POST['batch'];
                    $kuota         = $_POST['kuota'];


                    $update_batch  = mysqli_query($mysqli,"UPDATE batch_program
                                                           SET TGL_MULAI='$tgl_mulai', TGL_BERAKHIR='$tgl_berakhir', BATCH='$batch', KUOTA='$kuota'
                                                           WHERE ID_BATCH='".$_GET['id']."'");



                    if($update_batch){
                    echo "<script>location='detail_regular.php?id=$id_program';</script>";
                    }
                  }
              ?>







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
