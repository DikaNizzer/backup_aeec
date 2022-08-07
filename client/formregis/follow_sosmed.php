<?php 
require_once("../auth/auth.php"); 
require_once("../../config/database.php");

$idprog  = $_GET['idprog'];
$idbatch = $_GET['idbatch'];
$iduser  = $_SESSION["user"]["ID_USER"];
$email   = $_SESSION["user"]["EMAIL"];


$client = mysqli_query($mysqli,"SELECT * FROM client where ID_USER = '$iduser'");
if(mysqli_num_rows($client) == 0){  
    echo "<script>location='lengkapi_data.php?idprog=$idprog&idbatch=$idbatch&iddiskon=3&email=$email';</script>";
}

$select_histori = mysqli_query($mysqli,"SELECT h.* 
                                        FROM histori h, client c, pendaftaran p
                                        WHERE h.ID_CLIENT = c.ID_CLIENT
                                        AND c.ID_USER = '$iduser'
                                        AND h.ID_PENDAFTARAN = p.ID_PENDAFTARAN
                                        AND p.ID_BATCH = '$idbatch'");
if(mysqli_num_rows($select_histori) > 0){
    echo "<script>alert('Anda sudah terdaftar di program ini!');</script>";
    echo "<script>location='../dashboard/regular.php';</script>";
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

                    <!-- CARD UNTUK FORM -->
                    <section class="section">
        <div class="card" >
            <div class="card-body">             
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical " method="post" action=""  enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                       <!-- <p><span><i class="bi bi-instagram"></i></span>@airlangga_executive_edu</p> -->
                                        <div class="form-group mb-4">
                                        <label for="exampleInputPassword1">Bukti follow instagram / linkedin / youtube / twitter / facebook AEEC</label>
                                        <input type="file" name="bukti"class="form-control" accept='image/*' required >
                                        </div>
                                      
                                        
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1" type="submit" name="tambah">Submit</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>                                    
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
                    <!-- END CARD -->
                    <!-- Basic Tables end -->
                </div>


<!-- BAGIAN FOOTER -->
<!-- <footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>2021 &copy; Mazer</p>
        </div>
        <div class="float-end">
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                by <a href="https://ahmadsaugi.com">Saugi</a></p>
        </div>
    </div>
</footer> -->
        </div>
            <!-- END HALAMAN UTAMA -->
        </div>
    </div>




    <script src="../../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    
    <script src="../../assets/js/mazer.js"></script>


    <!-- Include Choices JavaScript -->
<script src="../../assets/vendors/choices.js/choices.min.js"></script>
<script src="../../assets/js/pages/form-element-select.js"></script>


</body>

</html>


<?php
        
        if(isset($_POST['tambah'])){
            $select_id        = mysqli_query($mysqli,"SELECT c.*, u.* FROM client c, user u 
                                                      WHERE c.ID_USER = u.ID_USER
                                                      AND u.ID_USER='$iduser'");
            $row              = $select_id->fetch_assoc();
            $idclient         = $row['ID_CLIENT'];

            
            //FOLLOW INSTAGRAM
            $namafile1        = $_FILES['bukti']['name'];
            $tempat1          = $_FILES['bukti']['tmp_name'];
            $ekstensiupload1  = explode('.', $namafile1);
            $ekstensiupload1  = strtolower (end($ekstensiupload1));    
            //Ganti Nama
            $follow_ig       = uniqid();
            $follow_ig      .= ".";
            $follow_ig      .=$ekstensiupload1;   
            // move_uploaded_file($tempat, '../../assets/excel/'.$namafotobaru);
            $targetPath1 = '../../assets/sosmed/' . $follow_ig;
            move_uploaded_file($tempat1, $targetPath1);



            //insert bukti
            $insert_bukti = mysqli_query($mysqli,"INSERT INTO penyimpanan (ID_CLIENT, BUKTI)
                                                  VALUES  ('$idclient', '$follow_ig')");

               
            echo "<script>location='confirm_3.php?idprog=$idprog&idbatch=$idbatch&iddiskon=3';</script>";
            
        }

?>