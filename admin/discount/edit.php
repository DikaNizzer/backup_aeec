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
                    <h3>Edit Data Diskon</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end"></nav>
                </div>
            </div>
        </div>
        
        <!-- Basic Tables start -->
        <?php
            $query_diskon = "SELECT * FROM diskon WHERE ID_DISKON = '".$_GET['id']."' ";
            $tabel_diskon = mysqli_query($mysqli, $query_diskon);    
            $data_diskon  = $tabel_diskon->fetch_assoc();  
        ?>
        <section id="basic-vertical-layouts">
            <div class="row match-height">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form form-vertical" method="post" action=""  enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">ID Diskon</label>
                                                <input type="text" id="first-name-vertical" class="form-control" 
                                                name="id_diskon" readonly value="<?php echo $data_diskon['ID_DISKON'];?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="first-name-vertical">Kode Voucher</label>
                                                <input type="text" id="first-name-vertical" class="form-control" 
                                                name="kode" value="<?php echo $data_diskon['KODE'];?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="first-name-vertical">Nama Diskon</label>
                                                <input type="text" id="first-name-vertical" class="form-control" 
                                                name="nama_diskon" value="<?php echo $data_diskon['NAMA_DISKON'];?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="first-name-vertical">PRESENTASE</label>
                                                <input type="int" id="first-name-vertical" class="form-control" 
                                                name="persentase" value="<?php echo $data_diskon['PERSENTASE'];?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="first-name-vertical">BENTUK</label>
                                                    <select class="form-select" name="bentuk" required>
                                                        <option>Pilih</option>
	                                                    <option value="Cashback">Cashback</option>
	                                                    <option value="Voucher">Voucher</option>
                                                    </select>
                                            </div>
                                            <div>
                                             Deskripsi
                                            <div class="form-floating mb-3">
                                             <input class="form-control" type="text" value="<?php echo  $data_diskon['DESKRIPSI']; ?>" name="deskripsi" id="floatingTextarea" required>
                                            </div>
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
            $id_diskon      = $_POST['id_diskon'];
            $kode           = $_POST['kode'];
            $nama_diskon    = $_POST['nama_diskon'];
            $persentase     = $_POST['persentase'];
            $bentuk         = $_POST['bentuk'];
            $deskripsi      = $_POST['deskripsi']; 
            
            $update_diskon  = mysqli_query($mysqli,"UPDATE diskon
                                                SET NAMA_DISKON='$nama_diskon',KODE ='$kode',  PERSENTASE='$persentase', BENTUK='$bentuk', DESKRIPSI='$deskripsi'
                                                WHERE ID_DISKON='".$_GET['id']."'");
            
            if($update_diskon){
                echo "<script>location='detail.php?id=$id_diskon';</script>";
            } else {
                echo "gagal input data";
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
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="http://ahmadsaugi.com">A. Saugi</a></p>
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
