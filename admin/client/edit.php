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
            
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Data Peserta</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                </nav>
            </div>
        </div>
    </div>

    <!-- Basic Tables start -->
    <?php
    $id             = $_GET['id'];
    $query_peserta = "SELECT * from client
                        where ID_CLIENT = '$id' ";
    $tabel_peserta = mysqli_query($mysqli, $query_peserta);    
    $data_peserta  = $tabel_peserta->fetch_assoc();  
    ?>
     <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" >Edit  Data Peserta</h4>
                    </div>
                    <!-- <div class="card-content"> -->
                        <div class="card-body">
                            <form class="form form-vertical" method="post" action=""  enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                    <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">ID Peserta</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="id_client"  readonly value="<?php echo $data_peserta['ID_CLIENT'];?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">ID User</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="id_user" readonly value="<?php echo $data_peserta['ID_USER'];?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Nama Peserta</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="nama" value="<?php echo $data_peserta['NAMA'];?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Jenis Kelamin</label>
                                                    <select class="form-select" name="jk" required>
                                                        <option >Pilih </option>
	                                                    <option value="1">Perempuan</option>
	                                                    <option value="0">Laki-Laki</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">No Telepon</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="no_telp"  value="<?php echo $data_peserta['NO_TELP'];?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">NPWP</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="npwp"  value="<?php echo $data_peserta['NPWP'];?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Alamat Rumah</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="alamat_rumah"  value="<?php echo $data_peserta['ALAMAT_RUMAH'];?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Alamat NPWP</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="alamat_npwp"  value="<?php echo $data_peserta['ALAMAT_NPWP'];?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Instansi</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="instansi"  value="<?php echo $data_peserta['INSTANSI'];?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Jabatan</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="jabatan"  value="<?php echo $data_peserta['JABATAN'];?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group  mb-0">
                                            <label for="exampleInputPassword1">Berkas NPWP</label>
                                            <input type="file" name="berkas"class="form-control">
                                        </div>
                                       <br></br>
                                       <br></br>
                                
                                        <div class="col-12 d-flex justify-content-end ">
                                            <button type="submit" name="edit" value="edit" class="btn btn-primary me-1 mb-1">UPDATE</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <?php
                  if(isset($_POST['edit'])){
                    $id_client    = $_POST['id_client'];
                    $id_user      = $_POST['id_user'];
                    $nama         = $_POST['nama'];
                    $jk           = $_POST['jk'];
                    $no_telp      = $_POST['no_telp'];
                    $npwp         = $_POST['npwp'];
                    $alamat_rumah = $_POST['alamat_rumah'];
                    $alamat_npwp  = $_POST['alamat_npwp'];
                    $instansi     = $_POST['instansi'];
                    $jabatan      = $_POST['jabatan'];
                  

                    $berkas         = $_FILES['berkas']['name'];
                    $lokasi         = $_FILES['berkas']['tmp_name'];



                    if(!empty($lokasi)){
                        $old = mysqli_query($mysqli,"SELECT BERKAS_NPWP FROM client WHERE ID_CLIENT='".$_GET['id']."'");
                        $data = $old->fetch_assoc();
                        $gambar_lama = $data['BERKAS_NPWP'];

                         unlink('../../assets/NPWP/'.$gambar_lama);
                         move_uploaded_file($lokasi,  '../../assets/NPWP/'.$berkas);

                         $update_peserta    = mysqli_query($mysqli,"UPDATE client
                                                                    SET NAMA='$nama', JK='$jk', NO_TELP='$no_telp',
                                                                        NPWP='$npwp', ALAMAT_NPWP='$alamat_npwp',
                                                                        ALAMAT_RUMAH='$alamat_rumah', INSTANSI='$instansi',
                                                                        JABATAN='$jabatan', BERKAS_NPWP='$berkas'
                                                                    WHERE ID_CLIENT='" . $_GET['id'] ."'");

                    

                        

                     } else {
                        $update_peserta     = mysqli_query($mysqli,"UPDATE client
                                                                    SET NAMA='$nama',JK='$jk', NO_TELP='$no_telp',
                                                                        NPWP='$npwp', ALAMAT_NPWP='$alamat_npwp',
                                                                        ALAMAT_RUMAH='$alamat_rumah', INSTANSI='$instansi',
                                                                        JABATAN='$jabatan'
                                                                    WHERE ID_CLIENT='" . $_GET['id'] ."'");

                
                     }

              
                    echo "<script>location='peserta.php';</script>";
      
                  }
              ?>







    <!-- Basic Tables end -->
</div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
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
