<?php 
require_once("../auth/auth.php"); 
require_once("../../config/database.php"); 

$id = $_GET['idprog'];
$batch = $_GET['idbatch'];
$program = mysqli_query($mysqli,"SELECT * FROM program where ID_PROGRAM = '$id'");
foreach($program as $hasil){
}
// Ambil ID USER
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

    <!-- FORM DINAMIS -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

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
                       <!-- Basic Tables start -->
                       <section class="section">
                        <div class="card" >
                            <div class="card-header">
                            <h4><?= $hasil['NAMA_PROGRAM'] ?><h4>
                            </div>
                            <div class="card-body">
                                
                
                            <section class="section">
                        <div class="row">
                            <!-- <div class="col-12 col-md-8 offset-md-2"> -->
                                <div class="pricing">
                                    <div class="row align-items-center">

                                        <div class="col-xs-12 col-sm-4">
                                            <div class="card card-highlighted">
                                                <div class="card-header text-center">
                                                    <h6 class="card-title">Pendaftaran</h6>
                                                    <h6 class="card-title">Umum </h6>                                               
                                                    <p> Daftar dengan harga asli</p>
                                                    <p></p>
                                                </div>
                                                <h1 class="price text-white"><i class="bi bi-person-x-fill"></i></h1>
                                               
                                                <div class="card-footer">
                                                    <a href="daftar_umum.php?idprog=<?=$hasil['ID_PROGRAM']?>&idbatch=<?=$_GET['idbatch']?>" class="btn btn-outline-white btn-block" >Daftar</a>
                                                </div>
                                            </div>
                                        </div>

                                    

                                        <!--CASHBACK FOLLOW SOSMED -->
                                        <div class="col-xs-12 col-sm-4">
                                            <div class="card card-highlighted">
                                                <div class="card-header text-center">
                                                    <h6 class="card-title">Mengajak 3 Partisipan</h6>
                                                    <p>Dapatkan cashback 10% dari instansi yang berbeda atau instansi yang sama</p>
                                                   
                                                </div>
                                                <h1 class="price text-white"><i class="bi bi-people-fill"></i></h1>
                                                
                                                <div class="card-footer">
                                              
                                                
                                                    <button type="button" class="btn btn-outline-white btn-block" data-bs-toggle="modal"
                                                        data-bs-target="#ajak">
                                                        Daftar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-4">
                                            <div class="card card-highlighted">
                                                <div class="card-header text-center">
                                                    <h6 class="card-title">Follow Sosmed AEEC</h6>
                                                    <p>Dapatkan cashback 5%</p>
                                                </div>
                                                <h1 class="price text-white"><i class="bi bi-people-fill"></i></h1>
                                                
                                                <div class="card-footer">
                                                    <a href="follow_sosmed.php?idprog=<?=$hasil['ID_PROGRAM']?>&idbatch=<?=$_GET['idbatch'] ?>&iddiskon=3">
                                                    <button class="btn btn-outline-white btn-block">Daftar</button></a>

                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    
                                </div>
                        </div>
                    </section>               
                            </div>
                        </div>
                    </section>
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





<!-- MODAL AJAK TEMAN -->
<div class="modal fade text-left" id="ajak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title white" id="myModalLabel160">Masukkan Email Partisipan Lain
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>*Pastikan partisipan sudah memiliki akun AEEC</h6>
                    <h6>*Partisipan diperbolehkan berasal dari institusi yang berbeda</h6>
                    <br>
                        <form action="#" method="POST">
                        <div class="input-group control-group after-add-more">
                        <input type="text" name="addmore[]" class="form-control" placeholder="Masukkan Email : ">
                        <div class="input-group-btn"> 
                            <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
                        </div>
                        </div>
                        <div class="control-group text-center">
                            <br>
                            <button class="btn btn-primary" type="submit" name="cariemail">Submit</button>
                        </div>
                        </form>
                        <!-- Copy Fields -->
                        <div class="copy hide" style="display: none">
                        <div class="control-group input-group" style="margin-top:10px">
                            <input type="text" name="addmore[]" class="form-control" placeholder="Masukkan Email :">
                            <div class="input-group-btn"> 
                            <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Hapus</button>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- END MODAL AJAK TEMAN -->




<!-- END MODAL SOSIAL MEDIA -->


    <script src="../../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    
    <script src="../../assets/js/mazer.js"></script>


    <!-- Include Choices JavaScript -->
<!-- <script src="../../../assets/vendors/choices.js/choices.min.js"></script>
<script src="../../../assets/js/pages/form-element-select.js"></script> -->

<!-- JS FORM DINAMIS -->
<script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script>
</body>

</html>


<!-- SINTAX UNTUK CARI RIWAYAT PROGAM -->
<?php
    
            
            
      

        // MENCARI EMAIL PARTISIPAN
        if(isset($_POST['cariemail'])){
            $dataditemukan = 0;
            $input = array_unique($_POST['addmore']);
            
            $banyakemail = count($input);
            $emailuser = $_SESSION["user"]["EMAIL"];
            $simpanemail=[];
            //Check inputan Minimal 3
            if($banyakemail < 3){
                echo "<script> 
                    alert('Masukkan Minimal 3 Email Partisipan !');
                    document.location.href = '#?idprog=$id&idbatch=$batch&iddiskon=D02';
                    </script>";
                exit;
            }
                // Check Email 
                foreach ($input as $output) {       
                    //Ga boleh sama kayak user        
                    $email= mysqli_query($mysqli,"SELECT * FROM user where EMAIL = '$output' and EMAIL != '$emailuser'");
                    foreach($email as $cekhasil){
                        array_push($simpanemail, $cekhasil['EMAIL']);
                        $dataditemukan = $dataditemukan+1;
                    }
                }
                
                

                if($dataditemukan == $banyakemail){
                    // Ketika semua email benar  

                    $_SESSION['data'] = array();
                    $result = []; 
                    for ($i = 0; $i < count($input); $i++) { 
                        array_push($result, [$input[$i]]);
                    }

                    for ($i = 0; $i < count($result); $i++) { 
                        $_SESSION['data'][$i] = $result[$i];
                    }

                    // $_SESSION['data'] = $simpanemail;

                    
                    echo "<script> 
                    alert('Email Partisipan Ditemukan');
                    document.location.href = 'cek_client.php?idprog=$id&idbatch=$batch&iddiskon=2';
                    </script>";
                }else{
                    // Ketika ada email yang salah
                    echo "<script> 
                    alert('Terdapat Email Yang Tidak Ditemukan');
                    document.location.href = '#';
                    </script>";
                }
            
        }

?>