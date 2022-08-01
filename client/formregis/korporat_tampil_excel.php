<?php 

// var_dump($jumlah = $_GET['jumlah']);
// exit;
require_once("../auth/auth.php"); 
require_once("../../config/database.php"); 

$idprog    = $_GET['idprog'];
$idbatch   = $_GET['idbatch'];
$type = $_GET['jenis'];
$message = $_GET['pesan'];
$jumlah = $_GET['jumlah'];
$iduser = $_SESSION["user"]["ID_USER"];

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

        #response {
            padding: 10px;
            margin-top: 10px;
            border-radius: 2px;
            display: none;
        }

        .success {
            background: #c7efd9;
            border: #bbe2cd 1px solid;
        }

        .error {
            background: #fbcfcf;
            border: #f3c6c7 1px solid;
        }

        div#response.display-block {
            display: block;
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
                        <div class="row">
                            
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                </nav>
                            </div>
                        </div>

                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Pendaftaran</h3>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Pendaftaran</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Korporat</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

            <!-- CARD UNTUK FORM -->
            <section class="section">
                <div class="card" >
                    <div class="card-header">
                    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
                    </div>
                    <div class="card-body">
                        
                    <div class="table-responsive">
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
                                <th>Nama Pendaftar</th>    
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
                                <th>Alamat Perusahaan</th>    
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
                        <br></br>           
                            <?php $no=1; ?>
                            <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                                <thead> 
                                    <tr>
                                        <th>No</th> 
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Jenis Kelamin</th>
                                        <th>No Telp</th>
                                        <th>NPWP</th>
                                        <th>Alamat NPWP </th>
                                        <th>Alamat Rumah </th>
                                        <th>Instansi </th> 
                                        <th>Jabatan </th>                                
                                        <th>Alumni</th>
                                        <th>Asal Fakultas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                
                                    $query_client = "SELECT * from user
                                                    join client on user.ID_USER = client.ID_USER ORDER BY client.ID_CLIENT DESC LIMIT $jumlah";
                                    $tabel_client = mysqli_query($mysqli, $query_client);
                                    
                                    $result = []; 
                                        
                                    foreach ($tabel_client as $data_client) :
                                        array_push($result, $data_client['EMAIL']);
                                        // $_SESSION['data'] = array();
                                                            
                                    ?>

                                    
                                    <tr>
                                        <td><?= $no; $no++; ?></td> 
                                        <td><?php echo $data_client['NAMA']; ?></td> 
                                        <td><?php echo $data_client['EMAIL']; ?></td> 
                                        <td><?php
                                        if($data_client['JK']==1){
                                            echo 'Perempuan'; 
                                        }else{
                                            echo 'Laki-Laki';
                                        }
                                        
                                        ?></td> 
                                        <td><?php echo $data_client['NO_TELP']; ?></td> 
                                        <td><?php echo $data_client['NPWP']; ?></td> 
                                        <td><?php echo $data_client['ALAMAT_NPWP']; ?></td> 
                                        <td><?php echo $data_client['ALAMAT_RUMAH']; ?></td> 
                                        <td><?php echo $data_client['INSTANSI']; ?></td> 
                                        <td><?php echo $data_client['JABATAN']; ?></td>
                                        <td><?php 
                                                        if($data_client['ALUMNI'] == 1) {
                                                            echo "Ya";
                                                        }else if($data_client['ALUMNI'] == 0){
                                                            echo "Bukan Alumni";
                                                        }
                                            
                                            ?>
                                        </td>
                                        <?php
                                            if($data_client['ALUMNI'] == 1){
                                                $idfak = $data_client['ID_FAKULTAS'];
                                                $query_fakultas = "SELECT * FROM fakultas where ID_FAKULTAS = '$idfak'";
                                                $tabel_fak   = mysqli_query($mysqli, $query_fakultas);
                                                $hasilfak       = $tabel_fak->fetch_assoc();
                                                $nama_fakultas  = $hasilfak['NAMA_FAKULTAS'];

                                                echo '<td>'.$nama_fakultas.'</td>';
                                            } else{
                                                echo '<td>-</td>';
                                            }
                                            ?>

                                        <!-- <td>
                                            <a href="detail.php?id=<?php echo $data_client['ID_CLIENT']; ?>" class="btn btn-primary">Detail</a>
                                        </td>    -->         
                                    
                                    </tr>
                                    <?php
                                        endforeach
                                    ?>
                                    </tbody>                   
                                </div>

                            </table>
                        </div>


                        <!-- HARGA -->

                        <table class="table table-bordered bg-white">
                        <thead>
                            <tr>
                                <th>ID</th>    
                                <th>Nama Program</th>
                                <th>Harga</th>
                                <th>Jumlah Peserta</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                                $class = mysqli_query($mysqli, "SELECT p.*, b.* 
                                                                FROM program p, batch_program b
                                                                WHERE p.ID_PROGRAM = b.ID_PROGRAM
                                                                AND ID_BATCH = '$idbatch'");
                          
                                foreach ($class as $data):
                                echo '<tr>
                                        <td>'.$data['ID_BATCH'].'</td>
                                        <td>'.$data['NAMA_PROGRAM'].'</td>
                                        <td>'.'Rp. '.number_format($data['KORPORAT']).'</td>
                                        <td>'.$jumlah.'</td>
                                      </tr>';
                                endforeach
                            ?>
                            <tr>
                                <th colspan="3" class="text-right">TOTAL</th>
                                <?php $tagihan =$data['KORPORAT']*($jumlah);  
                                $harga_awal = $data['KORPORAT'];?>
                                <th><?= 'Rp. '.number_format($tagihan) ?></th>
                            </tr>
                        </tbody>
                    </table>
                        <!-- END HARGA -->

                        <p>Catatan :</p>
                            <ul class="list-group mb-2">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Pastikan semua data yang anda submit sudah benar</span>
                                    <span class="badge bg-success badge-pill badge-round ml-1">1</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Silahkan klik <b>daftar</b> setelah memastikan kebenaran data,
                                            Silahkan klik <b>cancel</b> jika terdapat data yang salah dan
                                            silahkan <b>ulangi</b> proses upload excel dengan data yang benar
                                    </span>
                                    <span class="badge bg-success badge-pill badge-round ml-1">2</span>
                                </li>
                            </ul>


                        <form method="post" action="">
                            <button type="submit" class="btn btn-danger" name="cancel">Cancel</button>
                            <button type="submit" class="btn btn-primary" name="daftar">Daftar</button>
                        </form>
                        <!-- <?php 
                        $_SESSION['data'] = $result;
                        var_dump($result);
                        var_dump($_SESSION['data']);
                        ?>  -->
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
    date_default_timezone_set("Asia/Jakarta");
    $tanggal   = date("Y-m-d");
    $select_client  = mysqli_query($mysqli, "SELECT * FROM client WHERE ID_USER = '$iduser'");
    $row_client     = $select_client->fetch_assoc();
    $id_client      = $row_client['ID_CLIENT'];

    
    if(isset($_POST['daftar'])){
                       
            //insert pendaftaran HRDNYA
            $pendaftaran    = mysqli_query($mysqli, "INSERT INTO pendaftaran (ID_BATCH, ID_CLIENT,  TGL_PENDAFTARAN, HARGA_AWAL, TAGIHAN, STATUS, JENIS_PENDAFTARAN) 
                                                        VALUES ('$idbatch', '$id_client', '$tanggal',$harga_awal, $tagihan, '0', 'Korporat')");

            //ambil id pendaftaran
            $select_daftar  = mysqli_query($mysqli,"SELECT ID_PENDAFTARAN FROM pendaftaran ORDER BY ID_PENDAFTARAN DESC LIMIT 1");
            $row_daftar     = $select_daftar->fetch_assoc();
            $id_pendaftaran = $row_daftar['ID_PENDAFTARAN'];

            //insert histori HRDNYA
            // $insert_leader  = mysqli_query($mysqli, "INSERT INTO histori (ID_CLIENT, ID_PENDAFTARAN)
            //                                             VALUE ('$id_client', '$id_pendaftaran')");

            //insert histori Pegawai
            for($i = 0; $i < $jumlah; $i++){ 
                $cek_client  = mysqli_query($mysqli,"SELECT c.* FROM client c, user u 
                                                        WHERE c.ID_USER = u.ID_USER
                                                        AND u.EMAIL = '".$result[$i]."'");
                $row_cl      = $cek_client->fetch_assoc();

                $insert_hs   = mysqli_query($mysqli,"INSERT INTO histori (ID_CLIENT, ID_PENDAFTARAN)
                                                        VALUE ('".$row_cl['ID_CLIENT']."', '$id_pendaftaran')");

            }
            echo "<script> 
                alert('Pendaftaran Berhasil');
                document.location.href = '../transaksi/pendaftaran.php';
                </script>";
                  
    }



    
    if(isset($_POST['cancel'])){
        // Menghapus Data Kalau Ga Jadi Daftar
        $cek = mysqli_query($mysqli,"SELECT * FROM histori WHERE ID_CLIENT = '$id_client'");

        if(mysqli_num_rows($cek) == 0){  
            $delete_leader = mysqli_query($mysqli, "DELETE FROM client WHERE ID_CLIENT = '$id_client'");       
        }

        

        for($i = 0; $i < $jumlah; $i++){ 
            $cek_cl2     = mysqli_query($mysqli,"SELECT c.* FROM client c, user u 
                                                    WHERE c.ID_USER = u.ID_USER
                                                    AND u.EMAIL = '".$result[$i]."'");

            $row_cl2      = $cek_cl2->fetch_assoc();

            // $cek_cl3      = mysqli_query($mysqli,"SELECT * FROM histori 
            //                                         WHERE ID_CLIENT = '".$row_cl2['ID_CLIENT']."'");

            $cek_cl3      = mysqli_query($mysqli,"SELECT * FROM histori join client 
                                                    WHERE histori.ID_CLIENT = client.ID_CLIENT
                                                    AND client.ID_CLIENT = '".$row_cl2['ID_CLIENT']."'");

            if(mysqli_num_rows($cek_cl3) == 0){
            $delete_member = mysqli_query($mysqli, "DELETE FROM user 
                                                    WHERE ID_USER =  '".$row_cl2['ID_USER']."'");
            }
        }
            echo "<script>location='../dashboard/regular.php';</script>;";
        

        
}

?>