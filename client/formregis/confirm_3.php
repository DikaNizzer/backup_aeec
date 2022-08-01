<?php 

require_once("../auth/auth.php"); 
require_once("../../config/database.php"); 

// Tangkap Data
$idprog    = $_GET['idprog'];
$idbatch   = $_GET['idbatch'];
$iduser    = $_SESSION["user"]["ID_USER"];
$iddiskon  = $_GET['iddiskon'];

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
                                <th>Alamat Rumah</th>    
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

                        $select_cashback   = mysqli_query($mysqli,"SELECT u.*, c.* FROM user u, cashback c
                                                                   WHERE u.ID_USER = c.ID_USER
                                                                   AND u.ID_USER = '$iduser'
                                                                   AND c.KADALUWARSA > '$tanggal'");
                        $class             = mysqli_query($mysqli, "SELECT p.*, b.* 
                                                                    FROM program p, batch_program b
                                                                    WHERE p.ID_PROGRAM = b.ID_PROGRAM
                                                                    AND ID_BATCH = '$idbatch'");
                       
                        $row_class         = $class->fetch_assoc();

                        if($row_class['INDIVIDU'] != null){
                            $individu          = $row_class['INDIVIDU'];
                            $ppn               = $row_class['PPN'];
                        }else{
                            $individu          = $row_class['B_INDIVIDU'];
                            $ppn               = $row_class['B_PPN'];
                        }


                        $emoney            = mysqli_query($mysqli,"SELECT SUM(c.NOMINAL) AS EMONEY FROM user u, cashback c
                                                                   WHERE u.ID_USER = c.ID_USER
                                                                   AND u.ID_USER = '$iduser'
                                                                   AND c.KADALUWARSA > '$tanggal'");
                        $row_emoney        = $emoney->fetch_assoc();
                        $data_em           = $row_emoney['EMONEY'];

                        $select_diskon     = mysqli_query($mysqli,"SELECT * FROM diskon WHERE ID_DISKON = '$iddiskon'");
                        $row_diskon        = $select_diskon->fetch_assoc();

                        $cashback          = $row_diskon['PERSENTASE']/100*$individu;


                        $total             = $individu;
     
                        $default_em        = 0;
                        $harga_fix         = 0;
                        $harga_awal        = $individu;
                        
                        if(mysqli_num_rows($select_cashback)>0){
                        $default_em        = 0;
                        ?>
                              <h6 >E-money AEEC yang Anda miliki : Rp. <?= number_format($data_em); ?>; </h6>
                              <p>*Maksimal penggunaan E-money adalah 50% dari harga program</p>
                              <h6 >Gunakan sekarang?</h6>
                              <form method="post" action="">
                              <button type="submit" class="btn btn-secondary" name="lain_kali">Lain kali</button>
                              <button type="submit" class="btn btn-warning" name="gunakan">Gunakan</button>
                              </form>
                        <?php
                        }
                        ?>
                        <br>   

                        <table class="table table-bordered bg-white">
                            <thead>
                                <tr>
                                    <th>ID</th>    
                                    <th>Nama Program</th>
                                    <th>Harga</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($class as $data):
                                    echo '<tr>
                                            <td>'.$data['ID_BATCH'].'</td>
                                            <td>'.$data['NAMA_CLASS'].'</td>
                                            <td>'.'Rp. '.number_format($individu).'</td>
                                            <td>'.'Rp. '.number_format($individu).'</td>
                                        </tr>';
                                    endforeach;

                                    if(isset($_POST['gunakan'])){
                                    $default_em = $data_em;
                                    $total      = $total-$data_em;                             
                                    ?>
                                <tr>
                                    <td colspan="3" class="text-right">Potongan E-money AEEC</td>
                                    <td><?= 'Rp. '.number_format($data_em) ?></td>
                                </tr>
                                <?php
                                }else{
                                    $default_em = 0;
                                }
                                ?>
                                <tr>
                                    <th colspan="3" class="text-right">TOTAL</th>
                                    <th><?= 'Rp. '.number_format($total) ?></th>
                                </tr>
                            </tbody>
                            </table>
                        <?php
                        $harga_fix    = $total;                     
                        ?>

                        <h6>Cashback yang akan Anda dapatkan : Rp. <?= number_format($cashback)?>; </h6>
                        <br></br>

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

            $fix       = $_POST['harga_fix'];
            $default   = $_POST['default_em'];
            $id_client = $ambil_data['ID_CLIENT'];

            if($default == 0){
                //insert pendaftaran
                $pendaftaran    = mysqli_query($mysqli, "INSERT INTO pendaftaran (ID_BATCH, ID_CLIENT, ID_DISKON, HARGA_AWAL, TAGIHAN, CASHBACK, TGL_PENDAFTARAN, STATUS, JENIS_PENDAFTARAN) 
                                                         VALUES ('$idbatch', '$id_client', '$iddiskon', '$harga_awal', '$fix', '$cashback', '$tanggal', '0', 'Individu : follow sosmed')"); 
             }else{
                 //insert pendaftaran
                 $pendaftaran    = mysqli_query($mysqli, "INSERT INTO pendaftaran (ID_BATCH, ID_CLIENT, ID_DISKON,  HARGA_AWAL, POTONGAN, TAGIHAN, CASHBACK, TGL_PENDAFTARAN, STATUS, JENIS_PENDAFTARAN) 
                                                          VALUES ('$idbatch', '$id_client', '$iddiskon', '$harga_awal', '$default', '$fix', '$cashback','$tanggal', '0', 'Individu : follow sosmed')"); 
             }

            $select_daftar  = mysqli_query($mysqli,"SELECT ID_PENDAFTARAN FROM pendaftaran ORDER BY ID_PENDAFTARAN DESC LIMIT 1");          
            $row_daftar     = $select_daftar->fetch_assoc();
            $id_pendaftaran = $row_daftar['ID_PENDAFTARAN'];

            //insert histori 
            $insert_leader  = mysqli_query($mysqli, "INSERT INTO histori (ID_CLIENT, ID_PENDAFTARAN)
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
                echo "<script>location='../dashboard/regular.php';</script>;";              
            }else{
                echo "<script>location='../dashboard/regular.php';</script>;";
            }

           
        }

?>