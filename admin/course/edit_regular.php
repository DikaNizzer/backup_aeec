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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../../assets/js/jquery-3.6.0.js"></script>
   

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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

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
                <h3>Regular Class</h3>
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
     $ppn        = $ambil_data['PPN'];
     
     $individu_awal = (100/(100 + $ppn))*$ambil_data['INDIVIDU'];                 
     $kolektif_awal = (100/(100 + $ppn))*$ambil_data['KOLEKTIF'];
     $korporat_awal = (100/(100 + $ppn))*$ambil_data['KORPORAT'];
    ?>
    <section class="section">
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" >Insert New Class</h4>
                    </div>
                    <!-- <div class="card-content"> -->
                        <div class="card-body">
                            <form class="form form-vertical" method="post" action=""  enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                    <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Kode Program</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="id_program" readonly value="<?php echo  $ambil_data['ID_PROGRAM']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Nama Program</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="nama_program" value="<?php echo  $ambil_data['NAMA_PROGRAM']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Harga Individu (sebelum PPN)</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="individu" value="<?php echo  $individu_awal; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Harga Kolektif (sebelum PPN)</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="kolektif" value="<?php echo  $kolektif_awal; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Harga Korporat (sebelum PPN)</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="korporat" value="<?php echo  $korporat_awal; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">PPN</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="ppn" value="<?php echo  $ppn; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Sesi</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="sesi" value="<?php echo  $ambil_data['SESI']; ?>" required>
                                            </div>
                                        </div>

                                        <div>
                                           Deskripsi
                                            <div class="form-floating mb-3">
                                             <input class="form-control" type="text" value="<?php echo  $ambil_data['DESKRIPSI']; ?>" name="deskripsi" id="floatingTextarea" required>
                                            </div>
                                        </div>

                                        <label for="exampleInputPassword1" class="mb-0">Jadwal</label>
                                        <div class="more-field"></div>
                                        <div class="main-field">
                                        <div class="row g-3 mt-0 mb-3 ">                  
                                        <div class="col-6">
                                        <select class="form-select"  name="id_hari[]">
                                                <option value="">Pilih Hari</option>
                                                    <?php
                                                    $hari = $mysqli->query("SELECT * from hari");
                                                    while ( $tipe = $hari->fetch_assoc()){
                                                    ?>
                                                    <option value="<?php echo $tipe['ID_HARI'] ?>">
                                                    <?php 
                                                    echo $tipe['NAMA_HARI'];
                                                    ?>
                                                    </option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-5">
                                        <select class="form-select"  name="id_waktu[]">
                                                <option value="">Pilih Waktu</option>
                                                    <?php
                                                    $waktu = $mysqli->query("SELECT * FROM waktu");
                                                    while ( $tipe = $waktu->fetch_assoc()){
                                                    ?>
                                                    <option value="<?php echo $tipe['ID_WAKTU'] ?>">
                                                    <?php 
                                                    echo $tipe['WAKTU_MULAI'].' - '.$tipe['WAKTU_BERAKHIR'];
                                                    ?>
                                                    </option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-1 action-field">
                                            <button class="btn btn-success btn-add"> + </button>
                                        </div>
                                         </div>

                                        <div class="form-group ">
                                        <label for="exampleInputPassword1">Gambar</label>
                                        <input type="file" name="gambar" class="form-control" required>
                                        </div>


                                
                                        <div class="col-12 d-flex justify-content-end ">
                                            <button type="submit" name="edit" value="edit" class="btn btn-primary me-1 mb-1"> UPDATE</button>
                        
                                        </div>
                                    </div>
                                </div>
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
                $individu        = $_POST['individu'];
                $kolektif        = $_POST['kolektif'];
                $korporat        = $_POST['korporat'];
                $ppn             = $_POST['ppn'];
                $deskripsi       = $_POST['deskripsi'];             
                $sesi            = $_POST['sesi'];

                $result          = [];
                $id_hari         = $_POST['id_hari'];
                $id_waktu        = $_POST['id_waktu'];


                // Merge into one array
                for ($i = 0; $i < count($id_hari); $i++) { 
                    array_push($result, [
                        'id_hari'  => $id_hari[$i],
                        'id_waktu' => $id_waktu[$i],
                    ]);
                }


                $individu_ppn = $individu + ($individu * $ppn/100);
                $kolektif_ppn = $kolektif + ($kolektif  *  $ppn/100);
                $korporat_ppn = $korporat + ($korporat *  $ppn/100);

                $gambar         = $_FILES['gambar']['name'];
                $lokasi         = $_FILES['gambar']['tmp_name'];
                move_uploaded_file($lokasi, '../../assets/images/program/'.$gambar);
 
             
                $old = mysqli_query($mysqli,"SELECT IMAGE from program WHERE ID_PROGRAM='".$_GET['id']."'");
                $data = $old->fetch_assoc();
                $gambar_lama = $data['IMAGE'];

                //  unlink('../../assets/images/program/'.$gambar_lama);
                 move_uploaded_file($lokasi,  '../../assets/images/program/'.$gambar);


                 //delete detail program
                 $del            = mysqli_query($mysqli,"DELETE FROM detail_program WHERE ID_PROGRAM = '$id_program'");

                 $update_program  = mysqli_query($mysqli,"UPDATE program
                                                          SET ID_PROGRAM='$id_program', NAMA_PROGRAM='$nama_program',INDIVIDU='$individu_ppn',
                                                              KOLEKTIF='$kolektif_ppn', KORPORAT='$korporat_ppn',
                                                              DESKRIPSI='$deskripsi', SESI='$sesi', IMAGE='$gambar'
                                                           WHERE ID_PROGRAM='" . $_GET['id'] ."'");

    

                //loop insert jadwal
                foreach($result as $r){
                    $hari  = $r['id_hari'];
                    $waktu = $r['id_waktu'];


                //select detail program (jadwal)
                $select_jadwal  = mysqli_query($mysqli, "SELECT ID_JADWAL 
                                              FROM jadwal 
                                              WHERE ID_HARI = '$hari'
                                              AND ID_WAKTU = '$waktu'");              
                $cek            = mysqli_num_rows($select_jadwal);

                if($cek == 0){
                    //insert jadwal
                    $jadwal     = mysqli_query($mysqli,"INSERT INTO jadwal (ID_HARI, ID_WAKTU) 
                                                        VALUES ('$hari', '$waktu')");

                    //ambil id_jadwal
                    $id         = mysqli_query($mysqli,"SELECT ID_JADWAL FROM jadwal
                                                        ORDER BY ID_JADWAL DESC LIMIT 1");
                    $row_id     = $id->fetch_assoc();
                    $id_jadwal  = $row_id['ID_JADWAL'];
                    
                    //insert detail_program
                    $detail     = mysqli_query($mysqli,"INSERT INTO detail_program (ID_PROGRAM, ID_JADWAL)
                                                        VALUES ('$id_program', '$id_jadwal')");


                }else{
                    //ambil id_jadwal
                    $rows       = $select_jadwal->fetch_assoc();
                    $id_jadwal  = $rows['ID_JADWAL'];


                     //insert detail_program
                     $detail     = mysqli_query($mysqli,"INSERT INTO detail_program (ID_PROGRAM, ID_JADWAL)
                     VALUES ('$id_program', '$id_jadwal')");
                }
                }
                
               


                echo "<script>location='reguler.php';</script>";
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

    <script>
    $('.btn-add').click(function() {
        $('.more-field').append('<div class="single remove"></div>'); // add more div inside more-field
        $('.main-field .row').clone().appendTo('.more-field .single'); // clone field from main-field into .single
        $('.single .row .action-field').remove(); // remove plus button from previous field so you can replace it with 'x' button
        $('.single .row').append('<div class="col-1 action-field"><button class="btn btn-danger btn-remove">x</button></div>'); // add 'x' button
        $('.single').attr('class', 'remove');
    });

    $(document).on('click', '.btn-remove', function(e) {
        $(this).parentsUntil('.remove').remove();
        e.preventDefault();
    });
   </script>



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
