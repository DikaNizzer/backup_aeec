<?php
//Cek session
require_once("../auth/auth.php"); 
include_once('../../config/database.php');
$id_history     = $_GET['id_history'];
$idbatch        = $_GET['idbatch'];

// AMBIL NAMA PROGRAM
$program = "SELECT * FROM batch_program where ID_BATCH = '$idbatch'";
$ambilnama = mysqli_query($mysqli, $program);
foreach($ambilnama as $hasil){
}

// Query Ambil data client
$select_client = mysqli_query($mysqli, "SELECT * from client
                                join histori
                                on (client.ID_CLIENT = histori.ID_CLIENT)
                                where ID_HISTORI='$id_history'");

foreach($select_client as $data_client){
}
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
                <h3><?= $hasil['NAMA_CLASS']?></h3>
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
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Penilaian</h3>
                </div>

                        <table class="table table-bordered bg-white ">
                        <thead>
                        <tr>
                            <th class="col-4">Nama Peserta</th>    
                            <th><?= $data_client['NAMA']?></th>
                        </tr>
                        <tr>
                            <th class="col-4">No Telp</th>    
                            <th><?= $data_client['NO_TELP']?></th>
                        </tr>
                        <tr>
                            <th class="col-4">Instansi</th>    
                            <th><?= $data_client['INSTANSI']?></th>
                        </tr>
                        <tr>
                            <th class="col-4">Jabatan</th>    
                            <th><?= $data_client['JABATAN']?></th>
                        </tr>
                       
                        
                    </thead>
                    </table>
                    
                    <button class="btn btn-success me-1 mb-2" type="submit" name="tambah" data-bs-toggle="modal"
                                data-bs-target="#exampleModalCenter">Tambah</button>
                    

                    
                    <?php
                        $select_nilai = mysqli_query($mysqli, "SELECT * FROM penilaian where ID_HISTORI='$id_history'");
                    ?>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                            <thead> 
                                <tr>
                                    <th>Nilai Ke</th>    
                                    <th>Nilai</th>
                                    <th>Tanggal</th>
                                    <!-- <th>Edit</th>
                                    <th>Delete</th> -->
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $no=1;
                                foreach ($select_nilai as $data_nilai) :                            
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>  
                                    <td><?php echo $data_nilai['NILAI']; ?></td>                         
                                    <td><?php echo $data_nilai['CREATED_AT']; ?></td> 
                                    
                                </tr>
                                <?php
                                    $no++;
                                    endforeach
                                ?>
                                </tbody>                   
                            </div>

                        </table>
                    </div>
 

                   
                </div>
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

    
    <!-- Modal Tambah Nilai -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Input Nilai
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form form-vertical " method="post" action=""  enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Nilai</label>
                                        <input type="number" id="first-name-vertical" class="form-control"
                                            name="nilai" placeholder="0 - 100">
                                    </div>
                                </div>
                                                                        
                                <div class="col-12 d-flex justify-content-end">
                                    <button class="btn btn-primary me-1 mb-1" type="submit" id="submit" name="tambah">Tambah</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    <button type="button" class="btn btn-light-secondary me-1 mb-1"
                                        data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Tutup</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Accept</span>
                    </button>
                </div> -->
            </div>
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

<?php
if (isset($_POST["tambah"])) {

    $nilai = $_POST['nilai'];
    $tambah_nilai         = mysqli_query($mysqli, "INSERT INTO `penilaian` (`ID_HISTORI`, `NILAI`) VALUES ('$id_history', $nilai)");

    if (mysqli_affected_rows($mysqli) > 0){
        echo "<script> 
        alert('Nilai berhasil ditambahkan');
        document.location.href = 'nilai.php?id_history=$id_history&idbatch=$idbatch';
        </script>";
    }else{
        echo "<script> 
        alert('Nilai gagal ditambahkan');
        document.location.href = 'nilai.php?id_history=$id_history&idbatch=$idbatch';
        </script>";
    }
}


?>