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
    
<link rel="stylesheet" href="../../assets/vendors/iconly/bold.css">

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
    <h3>Statistik</h3>
</div>

   <form class="form form-vertical" method="post" action="">
   <div class="form-body">
   <h5>Range</h5>
                                        <div class="more-field"></div>
                                        <div class="main-field">
                                        <div class="row g-3  mb-3 ">                  
                                        <div class="col-5">
                                        <div class="form-group">
                                                <label for="first-name-vertical">Tanggal Mulai</label>
                                                <input type="date" id="first-name-vertical" class="form-control"
                                                    name="start"  required>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                        <div class="form-group">
                                                <label for="first-name-vertical">Tanggal Berakhir</label>
                                                <input type="date" id="first-name-vertical" class="form-control"
                                                    name="end"  required>
                                            </div>
                                        </div>
                                        <div class="col action-field">
                                            <br>
                                            <button type="submit" name="range" value="range" class="btn btn-success me-1 mb-1">Submit</button>
                                        </div>
                                        </div>
    </div>
    </form>
<br>

<div class="page-content">



        <?php
        if(isset($_POST['range'])){
            $start      = $_POST['start'];
            $end        = $_POST['end'];

            if($end < $start){
                echo "<script>alert('Tanggal berakhir harus lebih besar daripada tanggal mulai!')</script>";
               
            }
        ?>
            <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold-s">Akun pengguna</h6>
                                    <h6 class="font-extrabold mb-0">
                                        <?php
                                        $select_user = mysqli_query($mysqli, "SELECT * FROM user
                                                                              WHERE CREATED_AT >= '$start' AND CREATED_AT <= '$end'");
                                        echo mysqli_num_rows($select_user).' akun';
                                        ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Peserta terdaftar</h6>
                                    <h6 class="font-extrabold mb-0">
                                        <?php
                                        $select_client = mysqli_query($mysqli, "SELECT * FROM client
                                                                                WHERE CREATED_AT >= '$start' AND CREATED_AT <= '$end' ");
                                        echo mysqli_num_rows($select_client).' peserta';
                                        ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Pendapatan</h6>
                                    <h6 class="font-extrabold mb-0">
                                        <?php
                                        $select_pendapatan = mysqli_query($mysqli, "SELECT SUM(NOMINAL) AS OMZET FROM pembayaran
                                                                                    WHERE TGL_PEMBAYARAN >= '$start' AND TGL_PEMBAYARAN <= '$end' ");
                                        $row_pendapatan    = $select_pendapatan->fetch_assoc();
                                        echo 'Rp '.number_format($row_pendapatan['OMZET']);
                                        ?> 
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldUser"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Alumni</h6>
                                    <h6 class="font-extrabold mb-0">
                                        <?php
                                        $select_alumni = mysqli_query($mysqli, "SELECT * FROM client WHERE ALUMNI = 1
                                                                                AND CREATED_AT >= '$start' AND CREATED_AT <= '$end'");
                                        echo mysqli_num_rows($select_alumni).' alumni';
                                        ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           <div class="card" >
            <div class="card-header">
                <h6>Statistik Pelatihan</h6>
            </div>           
            <div class="card-body">           
            <div class="table-responsive">            
                <table class="table table-bordered" id="table1" width="100%" cellspacing="0">           
                    <thead>    
                        <tr> 
                            <th>ID Program</th>
                            <th>Nama Program</th>
                            <th>Batch terlaksana</th>
                            <th>Jumlah peserta</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $select_client = mysqli_query($mysqli, "SELECT  * FROM program  WHERE ID_KATEGORI != 'NRC' ");
                        foreach ($select_client as $data_client) :                            
                        ?>
                        <tr>
                            <td><?php echo $data_client['ID_PROGRAM']; ?></td>                           
                            <td><?php echo $data_client['NAMA_PROGRAM']; ?></td> 
                            <td><?php
                            $select_batch = mysqli_query($mysqli, "SELECT COUNT(*) AS 'BATCH' FROM batch_program b, program p
                                                                   WHERE p.ID_PROGRAM = b.ID_PROGRAM
                                                                   AND b.TGL_BERAKHIR >= '$start'
                                                                   AND b.TGL_MULAI <= '$end'                                                                                                                              
                                                                   AND p.ID_PROGRAM = '".$data_client['ID_PROGRAM']."'"); 

                            $row_batch    = $select_batch->fetch_assoc();
                            echo $row_batch['BATCH'];      
                            ?></td> 
                            <td><?php 
                            $select_peserta = mysqli_query($mysqli, "SELECT COUNT(*) AS 'CLIENT' 
                                                                     FROM client c JOIN histori h
                                                                     ON c.ID_CLIENT = h.ID_CLIENT
                                                                     JOIN pendaftaran p
                                                                     ON h.ID_PENDAFTARAN = p.ID_PENDAFTARAN
                                                                     JOIN batch_program b
                                                                     ON b.ID_BATCH = p.ID_BATCH
                                                                     AND h.CREATED_AT >= '$start'
                                                                     AND h.CREATED_AT <= '$end'
                                                                     AND b.ID_PROGRAM = '".$data_client['ID_PROGRAM']."'");
                            $row_peserta   = $select_peserta->fetch_assoc();
                            echo $row_peserta['CLIENT']; 
                            
                            ?></td>                          
                        </tr>
                        <?php
                            endforeach
                        ?>
                        </tbody>                   
                    </div>
                </table>
            </div>
        </div>
  </div>         
        
        <div class="card" >
            <div class="card-header">
                <h6>Level Manajerial</h6>
            </div>           
            <div class="card-body">           
            <div class="table-responsive">            
                <table class="table table-bordered" id="table1" width="100%" cellspacing="0">           
                    <thead>    
                        <tr> 
                            <th>Jabatan</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $select_jabatan = mysqli_query($mysqli, "SELECT JABATAN, COUNT(*) AS 'JUMLAH' FROM CLIENT
                                                                 WHERE CREATED_AT >= '$start' AND CREATED_AT <= '$end'
                                                                 GROUP BY JABATAN");
                        foreach ($select_jabatan as $data_jabatan) :                            
                        ?>
                        <tr>
                            <td><?php echo $data_jabatan['JABATAN']; ?></td>                           
                            <td><?php echo $data_jabatan['JUMLAH']; ?></td>                        
                        </tr>
                        <?php
                            endforeach
                        ?>
                        </tbody>                   
                    </div>
                </table>
            </div>
        </div>
       <?php
        }else{
        ?>
                    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold-s">Akun pengguna</h6>
                                    <h6 class="font-extrabold mb-0">
                                        <?php
                                        $select_user = mysqli_query($mysqli, "SELECT * FROM user ");
                                        echo mysqli_num_rows($select_user).' akun';
                                        ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Peserta terdaftar</h6>
                                    <h6 class="font-extrabold mb-0">
                                        <?php
                                        $select_client = mysqli_query($mysqli, "SELECT * FROM client");
                                        echo mysqli_num_rows($select_client).' peserta';
                                        ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Pendapatan</h6>
                                    <h6 class="font-extrabold mb-0">
                                        <?php
                                        $select_pendapatan = mysqli_query($mysqli, "SELECT SUM(NOMINAL) AS OMZET FROM pembayaran ");
                                        $row_pendapatan    = $select_pendapatan->fetch_assoc();
                                        echo 'Rp '.number_format($row_pendapatan['OMZET']);
                                        ?> 
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldUser"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Alumni</h6>
                                    <h6 class="font-extrabold mb-0">
                                        <?php
                                        $select_alumni = mysqli_query($mysqli, "SELECT * FROM client WHERE ALUMNI = 1");
                                        echo mysqli_num_rows($select_alumni).' alumni';
                                        ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" >
            <div class="card-header">
                <h6>Statistik Pelatihan</h6>
            </div>           
            <div class="card-body">           
            <div class="table-responsive">            
                <table class="table table-bordered" id="table1" width="100%" cellspacing="0">           
                    <thead>    
                        <tr> 
                            <th>ID Program</th>
                            <th>Nama Program</th>
                            <th>Batch terlaksana</th>
                            <th>Jumlah peserta</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $select_client = mysqli_query($mysqli, "SELECT  * FROM program WHERE ID_KATEGORI != 'NRC'");
                        foreach ($select_client as $data_client) :                            
                        ?>
                        <tr>
                            <td><?php echo $data_client['ID_PROGRAM']; ?></td>                           
                            <td><?php echo $data_client['NAMA_PROGRAM']; ?></td> 
                            <td><?php
                            $select_batch = mysqli_query($mysqli, "SELECT COUNT(*) AS 'BATCH'FROM batch_program b, program p
                                                                   WHERE p.ID_PROGRAM = b.ID_PROGRAM
                                                                   AND p.ID_PROGRAM = '".$data_client['ID_PROGRAM']."'"); 

                            $row_batch    = $select_batch->fetch_assoc();
                            echo $row_batch['BATCH'];      
                            ?></td> 
                            <td><?php 
                            $select_peserta = mysqli_query($mysqli, "SELECT COUNT(*) AS 'CLIENT' 
                                                                     FROM client c JOIN histori h
                                                                     ON c.ID_CLIENT = h.ID_CLIENT
                                                                     JOIN pendaftaran p
                                                                     ON h.ID_PENDAFTARAN = p.ID_PENDAFTARAN
                                                                     JOIN batch_program b
                                                                     ON b.ID_BATCH = p.ID_BATCH
                                                                     AND b.ID_PROGRAM = '".$data_client['ID_PROGRAM']."'");
                            $row_peserta   = $select_peserta->fetch_assoc();
                            echo $row_peserta['CLIENT']; 
                            
                            ?></td>                          
                        </tr>
                        <?php
                            endforeach
                        ?>
                        </tbody>                   
                    </div>
                </table>
            </div>
        </div>
  </div>      
        
        <div class="card" >
            <div class="card-header">
                <h6>Level Manajerial</h6>
            </div>           
            <div class="card-body">           
            <div class="table-responsive">            
                <table class="table table-bordered" id="table1" width="100%" cellspacing="0">           
                    <thead>    
                        <tr> 
                            <th>Jabatan</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $select_jabatan = mysqli_query($mysqli, "SELECT JABATAN, COUNT(*) AS 'JUMLAH' FROM CLIENT
                                                                GROUP BY JABATAN");
                        foreach ($select_jabatan as $data_jabatan) :                            
                        ?>
                        <tr>
                            <td><?php echo $data_jabatan['JABATAN']; ?></td>                           
                            <td><?php echo $data_jabatan['JUMLAH']; ?></td>                        
                        </tr>
                        <?php
                            endforeach
                        ?>
                        </tbody>                   
                    </div>
                </table>
            </div>
        </div>
        <?php
        }
        ?>

          

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
    
<script src="../../assets/vendors/apexcharts/apexcharts.js"></script>
<script src="../../assets/js/pages/dashboard.js"></script>

    <script src="../../assets/js/mazer.js"></script>
</body>

</html>
