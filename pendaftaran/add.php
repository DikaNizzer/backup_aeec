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
        <a href="#" class="burger-btn d-block d-xl-none"><i class="bi bi-justify fs-3"></i></a>
    </header>
            
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Virtual Account</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end"></nav>
            </div>
        </div>
    </div>

    <!-- Basic Tables start -->
    <?php
            $query_daftar = "SELECT * FROM pendaftaran WHERE ID_PENDAFTARAN = '".$_GET['id']."' ";
            $tabel_daftar = mysqli_query($mysqli, $query_daftar);    
            $data_daftar  = $tabel_daftar->fetch_assoc();  
        ?>
    <section class="section">
        <section id="basic-vertical-layouts">
            <div class="row match-height">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" >Add Virtual Account</h4>
                        </div>
                        
                        <div class="card-body">
                            <form class="form form-vertical" method="post" action="" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                        <!-- <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Virtual Account</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="virtual_acc" placeholder="Virtual Account" required>
                                            </div>
                                        </div> -->
                                        <div class="form-group">
                                                <label for="first-name-vertical">Virtual Account</label>
                                                <input type="int" id="first-name-vertical" class="form-control" 
                                                name="virtual_acc" value="<?php echo $data_daftar['VIRTUAL_ACC'];?>" required>
                                            </div>

                                        <div class="form-group ">
                                            <label for="exampleInputPassword1">Invoice</label>
                                            <input type="file" name="invoice"class="form-control" required >
                                        </div>

                                        <div class="col-12 d-flex justify-content-end ">
                                            <button type="submit" name="tambah" value="tambah" class="btn btn-success me-1 mb-1">Add +</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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

<?php
        if(isset($_POST['tambah'])){
            $id             = $_GET['id'];
            $virtual_acc    = $_POST['virtual_acc'];   
            
            //Invoice
            $namafile1        = $_FILES['invoice']['name'];
            $tempat1          = $_FILES['invoice']['tmp_name'];
            $ekstensiupload1  = explode('.', $namafile1);
            $ekstensiupload1  = strtolower (end($ekstensiupload1));    
            //Ganti Nama
            $invoice       = uniqid();
            $invoice      .= ".";
            $invoice      .=$ekstensiupload1;   
            // move_uploaded_file($tempat, '../../assets/invoice/'.$namafotobaru);
            $targetPath1 = '../../assets/invoice/' . $invoice;
            move_uploaded_file($tempat1, $targetPath1);

            //insert
            $update         = mysqli_query($mysqli,"UPDATE pendaftaran SET VIRTUAL_ACC = '$virtual_acc', INVOICE = '$invoice'
                                                    WHERE ID_PENDAFTARAN='".$_GET['id']."'");
                                        
        if ($update) {
            echo " <script>location='pendaftaran.php';</script>";
        } else {
            echo "gagal input data";
        } 
        }
    ?>