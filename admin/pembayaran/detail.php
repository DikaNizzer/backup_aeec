<?php
//Cek session
require_once("../auth/auth.php"); 
include_once('../../config/database.php');

// $iduser = $_SESSION["user"]["ID_USER"];
$id             = $_GET['id'];
$iddaftar     = $_GET['iddaftar'];
$daftar = mysqli_query($mysqli, "SELECT p.*, c.*, b.BATCH, pr.*, pay.*
                                    FROM pendaftaran p JOIN client c
                                    ON p.ID_CLIENT = c.ID_CLIENT
                                    JOIN batch_program b
                                    ON b.ID_BATCH = p.ID_BATCH
                                    JOIN program pr
                                    ON b.ID_PROGRAM = pr.ID_PROGRAM
                                    JOIN pembayaran pay
                                    ON p.ID_PENDAFTARAN = pay.ID_PENDAFTARAN
                                    AND pay.ID_PEMBAYARAN = '$id'
");
foreach($daftar as $hasil){
}

// Query dibawah untuk menentukan jumlah pendaftaran
// Jika lebih dari satu maka akan ditambahkan section kolektif / korporat
$query_history = "SELECT count(ID_PENDAFTARAN) as 'jumlah' 
                FROM histori where ID_PENDAFTARAN = '$iddaftar'";
$tabel_history   = mysqli_query($mysqli, $query_history);
$jumlah       = $tabel_history->fetch_assoc();
$jumlah_pendaftar  = $jumlah['jumlah'];
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
                <h3>Detail Pembayaran</h3>
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
                    <?php
                    $nota       = mysqli_query($mysqli, "SELECT * FROM pendaftaran WHERE ID_PENDAFTARAN ='$id' " );
                    $ambil_data = $nota->fetch_assoc();

                    $cek        = mysqli_query($mysqli, "SELECT * FROM pembayaran WHERE ID_PEMBAYARAN = '$id'");
                    $cek_status = $cek->fetch_assoc();

                    ?>

                        <table class="table table-bordered bg-white ">
                        <thead>
                        <tr>
                            <th class="col-4">No Pembayaran</th>    
                            <th><?=$hasil['ID_PEMBAYARAN'] ?></th>
                        </tr>
                        <tr>
                            <th class="col-4">No Pendaftaran</th>    
                            <th><?=$hasil['ID_PENDAFTARAN'] ?></th>
                        </tr>
                        <tr>
                            <th>Nama Pendaftar</th>    
                            <th><?= $hasil['NAMA'] ?></th>
                        </tr>
                        <tr>
                            <th>Tanggal Pembayaran</th>    
                            <th><?= $hasil['TGL_PEMBAYARAN'] ?></th>
                        </tr>
                        <tr>
                            <th>Virtual Account</th>    
                            <th><?= $hasil['VIRTUAL_ACC'] ?></th>
                        </tr>
                        <tr>
                            <th>Status</th>    
                            <td>
                            <?php
                            if($cek_status['STATUS'] == 1){
                            ?>
                            <font color="success"><i><b> Verivied  </b></i></font>
                            <?php
                            }else{
                            ?>
                            <a href=""><font color="grey"><i><b>Unverivied </b></i></font></a>
                            <?php
                            }
                            ?>     
                            </td>
                        </tr>
                        <tr>
                            <th>Bukti Bayar</th>    
                            <th> 
                                <a href="../../assets/bukti_bayar/<?php echo $hasil['BUKTI']; ?>"
                                     class="btn btn-primary" target="_blank">Lihat Berkas
                                </a>
                            </th>
                        </tr>
                       
                       

                        <!-- Ketika sendiri akan ada menu tambah akun mooc -->

                        <?php

                            if($jumlah_pendaftar == 1){ 
                                ?>
                                    <tr>
                                        <th>Tambah Akun MOOC</th>    
                                        <th> 
                                            <!-- <a href="../../assets/bukti_bayar/<?php echo $hasil['ID_CLIENT']; ?>"
                                                class="btn btn-success">Tambah
                                            </a> -->

                                            <a href="addmooc.php?id_pendaftaran=<?= $hasil['ID_PENDAFTARAN']?>&id_client=<?= $hasil['ID_CLIENT']; ?>" type="button" class="btn btn-success" target="_blank">
                                                Tambah
                                            </a>
                                        </th>
                                    </tr>
                                <?php
                            }

                        ?>
                        
                        
                    </thead>
                    </table>


                    <div class="table-responsive">
                <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>    
                                    <th>Nama Program</th>
                                    <th>Harga</th>
                                    <?php
                                        if($jumlah_pendaftar == 1){ //Kalau pendaftarnya lebih dari 1 maka masuk di kolektif/korporat
                                            echo '<th>Subtotal</th>';
                                        }else if($jumlah_pendaftar > 1){
                                            echo '<th>Jumlah Pendaftar</th>';
                                        }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                if($jumlah_pendaftar == 1){ //Kalau pendaftarnya lebih dari 1 maka masuk di kolektif/korporat
                                    foreach ($daftar as $data):
                                        echo '<tr>
                                                <td>'.$data['ID_BATCH'].'</td>
                                                <td>'.$data['NAMA_PROGRAM'].'</td>
                                                <td>'.'Rp. '.number_format($data['INDIVIDU']).'</td>
                                                <td>'.'Rp. '.number_format($data['INDIVIDU']).'</td>
                                            </tr>';
                                    endforeach;
                                }else if($jumlah_pendaftar > 1){
                                    foreach ($daftar as $data):
                                        echo '<tr>
                                                <td>'.$data['ID_BATCH'].'</td>
                                                <td>'.$data['NAMA_PROGRAM'].'</td>
                                                <td>'.'Rp. '.number_format($data['HARGA_AWAL']).'</td>
                                                <td>'.$jumlah_pendaftar.'</td>
                                            </tr>';
                                        endforeach;
                                }

                                    
                                ?>
                            
                              
                                <?php
                                if($hasil['POTONGAN'] != null){
                                ?>
                                  <tr>
                                    <td colspan="3" class="text-right">Potongan E-money AEEC</td>
                                    <td><?= 'Rp. '.number_format($hasil['POTONGAN']) ?></td>                                        
                                </tr>
                                <?php
                                }
                                ?>
                                <?php
                                if($hasil['DISKON'] != null){
                                ?>
                                  <tr>
                                    <td colspan="3" class="text-right">Diskon yang didapatkan</td>
                                    <td><?= 'Rp. '.number_format($hasil['DISKON']) ?></td>                                        
                                </tr>
                                <?php
                                }
                                ?>
                                <tr>
                                    <th colspan="3" class="text-right">TOTAL</th>
                                    <th><?= 'Rp. '.number_format($hasil['TAGIHAN']) ?></th>
                                </tr>
                                
                            </tbody>
                            </table>
                            
                            <?php
                            if($hasil['CASHBACK'] != null){
                            ?>
                            <h6>Cashback yang didapatkan : Rp. <?= number_format($hasil['CASHBACK'])?>; </h6>
                            <br></br>
                            <?php
                            }
                            ?>
                          

                            </div>


                            <!-- Ketika Jumlah Pendaftaran Banyak maka akan muncul namanya siapa aja  -->
                            <?php
                                if($jumlah_pendaftar > 1){
                                ?>

                        <div class="table-responsive mt-10">
                            <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                                <thead> 
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peserta</th>
                                        <th>Akun MOOC</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php
                                    $no=1;
                                         $pembayaran = mysqli_query($mysqli, "SELECT * FROM pendaftaran
                                         join histori 
                                         on pendaftaran.ID_PENDAFTARAN = histori.ID_PENDAFTARAN
                                         join client 
                                         on histori.ID_CLIENT = client.ID_CLIENT
                                         and pendaftaran.ID_PENDAFTARAN = '$iddaftar'");
                                    foreach ($pembayaran as $client) : 
                                    ?>
                                    <tr>
                                        <td><?php echo $no; $no++; ?></td>
                                        <td><?= $client['NAMA']; ?></td>
                                        <td>
                                            <a href="addmooc.php?id_pendaftaran=<?= $hasil['ID_PENDAFTARAN']?>&id_client=<?= $client['ID_CLIENT']; ?>"
                                                class="btn btn-success" target="_blank">Tambah
                                            </a>
                                        </td>
                                    </tr>   
                                    <?php
                                    endforeach
                                    ?> 
                                </tbody>
                                </div>

                            </table>
                        </div>

                            <?php
                                }
                            ?>
                            <!-- END Daftar Jamak -->

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
