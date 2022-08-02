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
                <h3>Edit Data Program</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                </nav>
            </div>
        </div>
    </div>

    <!-- Basic Tables start -->
    <?php
     $regular    = mysqli_query($mysqli, "SELECT * FROM program WHERE ID_PROGRAM ='".$_GET['id']."' " );
     $ambil_data = $regular->fetch_assoc();

    ?>
    <section class="section">
    <div class="card" >
    <div class="card-header">
    <div class="container-fluid py-1 px-2">
              <div class="row col-md-12"> 
              <h6 class="font-weight-bolder mb-4">Edit Data Program</h6>
              <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group  mb-3">
                    <label for="exampleInputEmail1">Kode Program</label>
                    <input type="text" name="id_program"class="form-control" value="<?php echo  $ambil_data['ID_PROGRAM']; ?>"  required autofocus autocomplete="off">
                    </div>
                    <div class="form-group  mb-3">
                    <label for="exampleInputPassword1">Nama Program</label>
                    <input type="text" name="nama_program"class="form-control" value="<?php echo  $ambil_data['NAMA_PROGRAM']; ?>"  required autofocus autocomplete="off">
                    </div>      
                    <div class="form-group ">
                    <label for="exampleInputPassword1">Gambar</label>
                    <input type="file" name="gambar" class="form-control" required>
                    </div>            
                <button type="submit" name="edit" value="edit" class="btn btn-primary w-30 mt-4 mb-2">UPDATE</button>
              </form>
              </div>
              </div>
              </div>

</div>
</div>
    </section>

    <?php
                  if(isset($_POST['edit'])){
                      $id_program      = $_POST['id_program'];
                      $nama_program    = $_POST['nama_program'];

                      $gambar         = $_FILES['gambar']['name'];
                      $lokasi         = $_FILES['gambar']['tmp_name'];
                      move_uploaded_file($lokasi, '../../assets/images/program/'.$gambar);
    
                
                      $old = mysqli_query($mysqli,"SELECT IMAGE from program WHERE ID_PROGRAM='".$_GET['id']."'");
                      $data = $old->fetch_assoc();
                      $gambar_lama = $data['IMAGE'];

                      //  unlink('../../assets/images/program/'.$gambar_lama);
                      move_uploaded_file($lokasi,  '../../assets/images/program/'.$gambar);
                 
                     
                      $update_program  = mysqli_query($mysqli,"UPDATE program
                                                               SET ID_PROGRAM='$id_program', NAMA_PROGRAM='$nama_program', IMAGE='$gambar'
                                                               WHERE ID_PROGRAM='" . $_GET['id'] ."'");

                    
                      echo "<script>location='non-reg.php';</script>";
                  
                  }
              ?>







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
