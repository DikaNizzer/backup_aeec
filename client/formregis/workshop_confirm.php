<?php 

require_once("../auth/auth.php"); 
require_once("../../config/database.php"); 

// Tangkap Data
$idprog   = $_GET['idprog'];
$idbatch  = $_GET['idbatch'];
$jenisDaftar = $_GET['jenisDaftar'];
$iduser   = $_SESSION["user"]["ID_USER"];

$select_histori = mysqli_query($mysqli,"SELECT h.* 
                                        FROM histori h, client c, pendaftaran p
                                        WHERE h.ID_CLIENT = c.ID_CLIENT
                                        AND c.ID_USER = '$iduser'
                                        AND h.ID_PENDAFTARAN = p.ID_PENDAFTARAN
                                        AND p.ID_BATCH = '$idbatch'");
if(mysqli_num_rows($select_histori) > 0){
    echo "<script>alert('Anda sudah terdaftar di program ini !.');</script>";
    echo "<script>location='../dashboard/workshop.php';</script>";
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
                          


                        <?php
                        $client = mysqli_query($mysqli, "SELECT * FROM client WHERE ID_USER ='$iduser'" );
                        $ambil_data = $client->fetch_assoc();
                        ?>

                            <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="col-3">ID Peserta</th>    
                                <td><?=$ambil_data['ID_CLIENT'] ?></td>
                            </tr>
                            <tr>
                                <th>Nama Peserta</th>    
                                <td><?=$ambil_data['NAMA'] ?></td>
                            </tr>
                            <tr>
                                <th>NPWP</th>    
                                <td><?= $ambil_data['NPWP'] ?></td>
                            </tr>
                            <tr>
                                <th>No. Telepon</th>    
                                <td><?= $ambil_data['NO_TELP'] ?></td>
                            </tr>
                            <tr>
                                <th>Alamat NPWP</th>    
                                <td><?= $ambil_data['ALAMAT_NPWP'] ?></td>
                            </tr>
                            <tr>
                                <th>Alamat Pengiriman Sertifikat</th>    
                                <td><?= $ambil_data['ALAMAT_RUMAH'] ?></td>
                            </tr>
                            <tr>
                                <th>Instansi</th>    
                                <?php
                                if($ambil_data['INSTANSI'] != null){
                                ?>
                                    <td><?= $ambil_data['INSTANSI'] ?></td>
                                <?php
                                }else{
                                ?>
                                    <td><?php echo '-'?></td>

                                <?php
                                }
                                ?>                              
                            </tr>
                            <tr>
                                <th>Jabatan</th>    
                                <?php
                                if($ambil_data['JABATAN'] != null){
                                ?>
                                    <td><?= $ambil_data['JABATAN'] ?></td>
                                <?php
                                }else{
                                ?>
                                    <td><?php echo '-'?></td>

                                <?php
                                }
                                ?>                              
                            </tr>
                        </thead>
                        </table>
                        <br>
                        <?php
                        date_default_timezone_set("Asia/Jakarta");
                        $tanggal           = date("Y-m-d");
                        $id_diskon = 0;



                        $class             = mysqli_query($mysqli, "SELECT p.*, b.* 
                                                        FROM program p, batch_program b
                                                        WHERE p.ID_PROGRAM = b.ID_PROGRAM
                                                        AND ID_BATCH = '$idbatch'");
                        
                        $row_class         = $class->fetch_assoc();

                        if($jenisDaftar == 1){
                            $total = $row_class['INDIVIDU'];
                            $jenis = 'Individu : pendaftaran umum';
                        }else if( $jenisDaftar == 2){
                            $total = $row_class['KOLEKTIF'];
                            $jenis = 'Kolektif';
                        }else if( $jenisDaftar == 3){
                            $total = $row_class['KORPORAT'];
                            $jenis = 'Mahasiswa';
                        }
                        
     
                        ?>
                
                        <br>

                        <br>         
                        <table class="table table-bordered bg-white">
                            <thead>
                                <tr>
                                    <th>ID</th>    
                                    <th>Nama Program</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $row_class['ID_BATCH'] ?></td>
                                    <td><?= $row_class['NAMA_CLASS'] ?></td>
                                    <td><?='Rp. '. number_format($total) ?></td>
                                </tr>
                                
                                <tr>
                                    <th colspan="2" class="text-right">TOTAL</th>
                                    <th><?=  'Rp. '.number_format($total) ?></th>
                                </tr>
                                <?php
                                $harga_fix=$total;
                                ?>
                            </tbody>
                            </table>
                        
                        <form method="post" action="">
                        <div class="form-group">
                        <input type="hidden" value="<?= "$harga_fix"?>" name= "harga_fix" required>
                        <input type="hidden" value="<?= "$default_em"?>" name= "default_em" required>
                        </div>
                        <button type="submit" class="btn btn-danger" name="cancel">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="daftar">Daftar</button>
                        </form>
                     
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
                    <!-- END CARD -->
                    <!-- Basic Tables end -->
                </div>

<div class="modal fade text-left" id="kode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title white" id="myModalLabel160">Masukkan Kode Voucher</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <br>
                        <form action="#" method="POST">
                        <div class="col">
                        <div class="form-group">
                            <label for="first-name-vertical">Kode Voucher</label>
                            <input type="text" id="first-name-vertical" class="form-control"
                                   name="kode" placeholder="Kode Voucher" required>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-warning " name="cekkode">Terapkan</button>
                        </form>
                        <!-- Copy Fields -->
                </div>
            </div>
        </div>
    </div>
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


        
        if(isset($_POST['daftar'])){

            $fix           = $_POST['harga_fix'];
            $default       = $_POST['default_em'];
            $id_client     = $ambil_data['ID_CLIENT'];


                  //insert pendaftaran without kode and e-money
                  $pendaftaran    = mysqli_query($mysqli, "INSERT INTO pendaftaran (ID_BATCH, ID_CLIENT, HARGA_AWAL, TAGIHAN, TGL_PENDAFTARAN, STATUS, JENIS_PENDAFTARAN) 
                                                           VALUES ('$idbatch', '$id_client', '$total', '$total', '$tanggal', '0', '$jenis')"); 


           

            $select_daftar   = mysqli_query($mysqli,"SELECT ID_PENDAFTARAN FROM pendaftaran ORDER BY ID_PENDAFTARAN DESC LIMIT 1");          
            $row_daftar      = $select_daftar->fetch_assoc();
            $id_pendaftaran  = $row_daftar['ID_PENDAFTARAN'];

            //insert histori 
            $insert_histori  = mysqli_query($mysqli, "INSERT INTO histori (ID_CLIENT, ID_PENDAFTARAN)
                                                     VALUE ('$id_client', '$id_pendaftaran')");

                      
            
            echo "<script> 
                alert('Pendaftaran Berhasil');
                document.location.href = '../transaksi/pendaftaran.php';
                </script>";
            
        }
        
        if(isset($_POST['cancel'])){
            $id_client = $ambil_data['ID_CLIENT'];
            $cek = mysqli_query($mysqli,"SELECT * FROM histori WHERE ID_CLIENT = '$id_client'");

            if(mysqli_num_rows($cek) == 0){  
                $delete = mysqli_query($mysqli, "DELETE FROM client WHERE ID_CLIENT = '$id_client'");
                echo "<script>location='../dashboard/workshop.php';</script>;";              
            }else{
                echo "<script>location='../dashboard/workshop.php';</script>;";
            }

           
        }

?>