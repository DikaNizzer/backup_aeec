<?php 
require_once("../auth/auth.php"); 
require_once("../../config/database.php");


$iduser   = $_SESSION["user"]["ID_USER"];
$email    = $_SESSION["user"]["EMAIL"];



$client     = mysqli_query($mysqli,"SELECT c.*, u.* FROM client c, user u 
                                    where c.ID_USER = u.ID_USER 
                                    AND u.ID_USER = '$iduser'");
$row_client = $client->fetch_assoc();

$emoney    = mysqli_query($mysqli, "SELECT SUM(NOMINAL) AS 'EMONEY' FROM cashback
                                    WHERE ID_USER = '$iduser'
                                    AND KADALUWARSA >= NOW()");
$row_em    = $emoney->fetch_assoc();
$em        = $row_em['EMONEY'];

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
                                <h3>Profile</h3>
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
                    <div class="row "> 
                    <div class="col-9">
                    <h5 class="mb-3">Halo, <?php
                         if(mysqli_num_rows($client)>0){
                            echo $row_client['NAMA'];
                         }else{
                            echo  $email; 
                         }                       
                         ?></h5> 
                         <!-- <d6>ID :  <?php
                         if(mysqli_num_rows($client)>0){
                            echo $row_client['ID_CLIENT'];
                         }else{
                            echo  $iduser; 
                         }                       
                         ?></d6><br>
                         <d6>
                            <?php
                            echo 'Email : '.$email;
                            ?>
                         </d6> -->
                    <br>
                    <h6>E-money AEEC</h6>
                    <d6><?php echo 'Rp. '.number_format($em);?></d6> 
                    <br>
                    <d6 style="color:red"><i>E - money tidak berlaku untuk pendaftaran kolektif dan korporat</i></d6>
                    </div>                    
                    <div class="col">
                    <br>
                    <?php
                    if(mysqli_num_rows($client) > 0){
                    ?>
                     <a href="edit_profile.php" class="btn btn-primary"><i class="bi bi-pencil-square"></i><span>&nbsp &nbsp Edit Profile</span></a>
                    <?php
                    }
                    ?>
                  
                    </div>
                    </div>
                    </div>
                    </section>

                    <section class="section">
                    <div class="card" >
                    <div class="card-header">
                        <h5>Data Pribadi</h5>
                    </div>
                    <div class="card-body">
                    <?php
                    if(mysqli_num_rows($client)>0){
                    ?>
                      <div class="row g-3 mt-0 mb-3 ">                  
                                        <div class="col-6">
                                        <h6 class="mb-1">ID Peserta</h6>
                                        <d6><?=$row_client['ID_CLIENT'];?></d6>

                                        <h6 class=" mt-4 mb-1">Nama Lengkap</h6>
                                        <d6><?=$row_client['NAMA'];?></d6>

                                        <h6 class=" mt-4 mb-1">Email</h6>
                                        <d6><?=$row_client['EMAIL'];?></d6>

                                        <h6 class=" mt-4 mb-1">No. Telepon</h6>
                                        <d6><?=$row_client['NO_TELP'];?></d6>

                                        <h6 class=" mt-4 mb-1">Jenis Kelamin</h6>
                                        <d6><?php 
                                             if($row_client['JK'] == 1){
                                                echo 'Perempuan';
                                             }else{
                                                echo 'Laki-laki';
                                             }
                                        ?></d6>

                                        <h6 class=" mt-4 mb-1">NPWP</h6>
                                        <d6><?=$row_client['NPWP'];?></d6>
                                        </div>

                                        <div class="col-6">
                                        <h6 class="mb-1">Alamat Rumah</h6>
                                        <d6><?=$row_client['ALAMAT_RUMAH'];?></d6> 

                                        <h6 class=" mt-4 mb-1">Alamat NPWP</h6>
                                        <d6><?=$row_client['ALAMAT_NPWP'];?></d6>

                                        <h6 class=" mt-4 mb-1">Instansi</h6>
                                        <d6><?=$row_client['INSTANSI'];?></d6>

                                        <h6 class=" mt-4 mb-1">Jabatan</h6>
                                        <d6><?=$row_client['JABATAN'];?></d6>

                                        <h6 class=" mt-4 mb-1">Alumni UNAIR</h6>
                                        <d6><?php 
                                             if($row_client['ALUMNI'] == 1){
                                                echo $row_client['NAMA_FAKULTAS'];
                                             }else{
                                                echo 'Bukan Alumni';
                                             }
                                        ?></d6>

                                        <h6 class=" mt-4 mb-1">Berkas NPWP</h6>
                                        <a href="../../assets/NPWP/<?=$row_client['BERKAS_NPWP'];?>" class="btn btn-primary" target="_blank"><i class="bi bi-download"></i><span> download NPWP</span></a>
                                        </div>
                        </div>
                    <?php   
                    }else{
                    ?>
                    <d6><?= 'Anda belum terdaftar sebagai peserta'; ?></d6>
                    <?php
                    }
                    ?>
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