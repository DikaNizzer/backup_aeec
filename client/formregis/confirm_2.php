<?php 

require_once("../auth/auth.php"); 
require_once("../../config/database.php"); 

// Tangkap Data
$idprog     = $_GET['idprog'];
$idbatch    = $_GET['idbatch'];
$iduser     = $_SESSION["user"]["ID_USER"];
$iddiskon1  = $_GET['iddiskon1'];
$iddiskon2  = $_GET['iddiskon2'];

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
                        

                    <div class="table-responsive">
                            <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                                <thead> 
                                    <tr>
                                        <th class="col-1">No</th>
                                        <th>ID User</th>
                                        <th>Email</th>                
                                        <th class="col-2">Kelengkapan data</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                        <td> 1 </td>
                                        <td> <?php echo $iduser; ?></td>
                                        <td> <?php echo $_SESSION['user']['EMAIL']; ?></td>
                                        <td>
                                        <font color="success"><b><i>data lengkap</i></b></font>
                                        </td>          
                                    </tr>  


                                    <?php
                                    $counter = 2;   
                                    $id_user = [];      
                                                     
                                    for($i = 0; $i<count($_SESSION['data']); $i++){   
                                        $data_client = mysqli_query($mysqli, "SELECT * FROM  user  WHERE EMAIL ='".$_SESSION['data'][$i][0]."'");
                                        $user        = $data_client->fetch_assoc();


                                        
                                    ?>
                                    <tr>
                                        <td><?php echo $counter; ?></td>
                                        <td><?php echo $user['ID_USER']; ?></td>
                                        <td><?php echo $user['EMAIL']; ?></td>
                                        <td>
                                            <?php
                                            $cek = mysqli_query($mysqli,"SELECT c.* FROM client c, user u 
                                                                         WHERE c.ID_USER = u.ID_USER
                                                                         AND u.EMAIL = '".$user['EMAIL']."'");
                                            
                                            if(mysqli_num_rows($cek) > 0){
                                            ?>
                                            <font color="success"><b><i>data lengkap</i></b></font>
                                            <?php array_push($id_user, $user['ID_USER']); ?>
                                            <?php
                                            }else{
                                            ?>
                                            <a href="lengkapi_data.php?email=<?php echo $user['EMAIL']; ?>&idprog=<?=$idprog?>&idbatch=<?=$idbatch?>&iddiskon=2" class="btn btn-primary">Lengkapi data</a>
                                            <?php
                                            }
                                            ?>
                                        </td>          
                                    </tr>  
                                    <?php
                                $counter ++;
                                }
                                ?>                    
                                </tbody>                
                              </div>
                            </table>
                        </div>  
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



                        $batas             = 50/100*$individu;
                        if($data_em >= $batas){
                            $data_em = $batas;
                        }

                        $jumlah_email      = count($_SESSION['data']);
                        $jumlah_client     = count($id_user);  

                        $select_diskon1    = mysqli_query($mysqli,"SELECT * FROM diskon WHERE ID_DISKON = '$iddiskon2'");
                        $row_diskon1      = $select_diskon1->fetch_assoc();

                        $total             = $individu;

                        $persentase1       = $row_diskon1['PERSENTASE']/100*$individu;
                        $voucher           = $individu-$persentase1;

                        for($i=0; $i<($jumlah_email - ($jumlah_email% 3)); $i++){
                            $total         = $total + $voucher;
                        } 



                        $select_diskon2    = mysqli_query($mysqli,"SELECT * FROM diskon WHERE ID_DISKON = '$iddiskon1'");
                        $row_diskon2       = $select_diskon2->fetch_assoc();

                        $persentase2       = $row_diskon2['PERSENTASE']/100*$individu;
                        $cashback          = (($jumlah_email - ( $jumlah_email % 3))/3)*$persentase2;


                        $harga_fix   = 0;
                        $harga_awal  = $individu*($jumlah_email+1);
                        $diskon      = ($jumlah_email - ($jumlah_email% 3))*$persentase1;
                                                

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
                         <br>


            
                            <table class="table table-bordered bg-white">
                            <thead>
                                <tr>
                                    <th>ID</th>    
                                    <th>Nama Program</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
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
                                            <td>'.($jumlah_email+1).'</td>
                                            <td>'.'Rp. '.number_format($individu*($jumlah_email+1)).'</td>
                                        </tr>';
                                    endforeach
                                ?>
                                    <tr>
                                        <td colspan="4" class="text-right"> <?='Diskon '.$row_diskon1['PERSENTASE'].'% untuk '.($jumlah_email - ($jumlah_email% 3))?> peserta yang diajak</td>
                                        <td><?= 'Rp. '.number_format($diskon) ?></td>
                                    </tr>
                                <?php
                                    if(isset($_POST['gunakan'])){
                                    $default_em = $data_em;
                                    $total      = $total-$data_em;                             
                                    ?>
                                <tr>
                                    <td colspan="4" class="text-right">Potongan E-money AEEC</td>
                                    <td><?= 'Rp. '.number_format($data_em) ?></td>
                                </tr>
                                <?php
                                }else{
                                    $default_em = 0;
                                }
                                ?>
                                <tr>
                                    <th colspan="4" class="text-right">TOTAL</th>
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



        $select_client  = mysqli_query($mysqli, "SELECT * FROM client WHERE ID_USER = '$iduser'");
        $row_client     = $select_client->fetch_assoc();
        $id_client      = $row_client['ID_CLIENT'];

        
        if(isset($_POST['daftar'])){
            $fix           = $_POST['harga_fix'];
            $default       = $_POST['default_em'];
        
            if($jumlah_email != $jumlah_client){
                echo "<script>alert('Lengkapi data peserta!');</script>";
            }else{                
                
                //insert pendaftaran
                if($default == 0){
                $pendaftaran    = mysqli_query($mysqli, "INSERT INTO pendaftaran (ID_BATCH, ID_CLIENT, ID_DISKON, HARGA_AWAL, DISKON, TAGIHAN, CASHBACK, TGL_PENDAFTARAN, STATUS, JENIS_PENDAFTARAN) 
                                                         VALUES ('$idbatch', '$id_client','2', '$harga_awal','$diskon','$fix', '$cashback', '$tanggal', '0', 'Individu : mengajak 3 partisipan')");    
                }else{
                $pendaftaran    = mysqli_query($mysqli, "INSERT INTO pendaftaran (ID_BATCH, ID_CLIENT, ID_DISKON, HARGA_AWAL, DISKON, POTONGAN, TAGIHAN, CASHBACK, TGL_PENDAFTARAN, STATUS, JENIS_PENDAFTARAN) 
                                                         VALUES ('$idbatch', '$id_client','2', '$harga_awal','$diskon', '$default', '$fix', '$cashback', '$tanggal', '0', 'Individu : mengajak 3 partisipan')");        
                }



                //ambil id pendaftaran
                $select_daftar  = mysqli_query($mysqli,"SELECT ID_PENDAFTARAN FROM pendaftaran ORDER BY ID_PENDAFTARAN DESC LIMIT 1");
                $row_daftar     = $select_daftar->fetch_assoc();
                $id_pendaftaran = $row_daftar['ID_PENDAFTARAN'];

                //insert histori leader
                $insert_leader  = mysqli_query($mysqli, "INSERT INTO histori (ID_CLIENT, ID_PENDAFTARAN)
                                                         VALUE ('$id_client', '$id_pendaftaran')");

                //insert histori member
                for($i = 0; $i < $jumlah_client; $i++){ 
                    $cek_client  = mysqli_query($mysqli,"SELECT c.* FROM client c, user u 
                                                         WHERE c.ID_USER = u.ID_USER
                                                         AND u.EMAIL = '".$_SESSION['data'][$i][0]."'");
                    $row_cl      = $cek_client->fetch_assoc();

                    $insert_hs   = mysqli_query($mysqli,"INSERT INTO histori (ID_CLIENT, ID_PENDAFTARAN)
                                                         VALUES ('".$row_cl['ID_CLIENT']."', '$id_pendaftaran')");
                }

                

            
                echo "<script> 
                    alert('Pendaftaran Berhasil');
                    document.location.href = '../transaksi/pendaftaran.php';
                    </script>";
            }          
        }



        
        if(isset($_POST['cancel'])){
            $cek = mysqli_query($mysqli,"SELECT * FROM histori WHERE ID_CLIENT = '$id_client'");

            if(mysqli_num_rows($cek) == 0){  
                $delete_leader = mysqli_query($mysqli, "DELETE FROM client WHERE ID_CLIENT = '$id_client'");       
            }

           

            for($i = 0; $i < $jumlah_client; $i++){ 
                $cek_cl2     = mysqli_query($mysqli,"SELECT c.* FROM client c, user u 
                                                     WHERE c.ID_USER = u.ID_USER
                                                     AND u.EMAIL = '".$_SESSION['data'][$i]."'");

                $row_cl2      = $cek_cl2->fetch_assoc();

                $cek_cl3      = mysqli_query($mysqli,"SELECT * FROM histori 
                                                     WHERE ID_CLIENT = '".$row_cl2['ID_CLIENT']."'");

                if(mysqli_num_rows($cek_cl3) == 0){
                $delete_member = mysqli_query($mysqli, "DELETE FROM CLIENT 
                                                        WHERE ID_CLIENT =  '".$row_cl2['ID_CLIENT']."'");
                }
            }
                echo "<script>location='../dashboard/regular.php';</script>;";
            

           
        }

?>