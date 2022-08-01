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
                <h3>Detail Pendaftaran</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end"></nav>
            </div>
        </div>
    </div>

    <!-- Basic Tables start -->
    <?php
    // AMBIL ID CLIENT
    $idclient = $_GET['idclient'];
    $iddaftar = $_GET['id'];
        $regular    = mysqli_query($mysqli, "SELECT * FROM pendaftaran join client 
        where pendaftaran.ID_CLIENT = client.ID_CLIENT
        and pendaftaran.ID_PENDAFTARAN = '$iddaftar'
        and client.ID_CLIENT = '$idclient'; " );
        $ambil_data = $regular->fetch_assoc();
        $id_cli    = $ambil_data['ID_PENDAFTARAN'];

// Query dibawah untuk menentukan jumlah pendaftaran
// Jika lebih dari satu maka akan ditambahkan section kolektif / korporat
$query_history      = "SELECT count(ID_PENDAFTARAN) as 'jumlah' 
                        FROM histori where ID_PENDAFTARAN = '$iddaftar'";
$tabel_history      = mysqli_query($mysqli, $query_history);
$jumlah             = $tabel_history->fetch_assoc();
$jumlah_pendaftar   = $jumlah['jumlah'];
    ?>
 
    <section class="section">
        <div class="card">
            <div class="card-header">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Batch</th>    
                            <td><?=$ambil_data['ID_BATCH'] ?></td>
                        </tr>
                        <tr>
                            <th>ID Client</th>    
                            <td><?=$ambil_data['ID_CLIENT'] ?></td>
                        </tr>
                        <tr>
                            <th>ID Diskon</th>    
                            <td><?=$ambil_data['ID_DISKON'] ?></td>
                        </tr>
                        <tr>
                            <th>Virtual Account</th>    
                            <td><?=$ambil_data['VIRTUAL_ACC'] ?>
                                
                            </td>
                        </tr>
                        <tr>
                            <th>Nama</th>    
                            <td><?=$ambil_data['NAMA'] ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Pendaftaran</th>    
                            <td><?=$ambil_data['TGL_PENDAFTARAN'] ?></td>
                        </tr>
                        <tr>
                            <th>Jenis  Pendaftaran</th>    
                            <td><?=$ambil_data['JENIS_PENDAFTARAN'] ?></td>
                        </tr>
                        <?php
                            if($ambil_data['JENIS_PENDAFTARAN'] == 'Individu : follow sosmed'){

                                echo    "<tr>
                                            <th>Periksa Bukti Follow</th>    
                                            <td><a href='cek_bukti.php?idclient=$idclient' target='_blank' class='btn btn-success'>Lihat</a>  </td>
                                        </tr>";
                            }
                        ?>
                        <tr>
                            <th>Tagihan</th>    
                            <td><?= number_format($ambil_data['TAGIHAN']) ?></td>
                        </tr>
                        <tr>
                            <th>Alamat NPWP</th>    
                            <td><?=$ambil_data['ALAMAT_NPWP'] ?></td>
                        </tr>
                        <tr>
                            <th>Berkas NPWP</th>    
                            <td><a href="../../assets/NPWP/<?= $ambil_data['BERKAS_NPWP'] ?> " class="btn btn-success" target="_blank">Lihat</a>  </td>
                        </tr>
                    </thead>
                </table>   

<!-- Ketika Jumlah Pendaftaran Banyak maka akan muncul namanya siapa aja  -->
<?php
        if($jumlah_pendaftar > 1){
        ?>

<div class="table-responsive mt-10">
    <table class="table table-bordered"  width="100%" cellspacing="0">
        <thead> 
            <tr>
                <th>No</th>
                <th>Nama Peserta</th>
                
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
                
            </tr>
            
            <?php
            endforeach
            ?>
            <tr>
                <th colspan="1" class="text-right">Jumlah Peserta</th>
                <th><?= $jumlah_pendaftar ?></th>
            </tr>    
        </tbody>
        </div>

    </table>
</div>

    <?php
        }
    ?>
    <!-- END Daftar Jamak -->

    <a href="pendaftaran.php" class="btn btn-primary">Kembali</a>
            </div>
        </div>
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
