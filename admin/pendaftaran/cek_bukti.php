<?php
//Cek session
require_once("../auth/auth.php"); 
include_once('../../config/database.php');
$idclient = $_GET['idclient'];

// AMbil Data Sosmed
$bukti    = mysqli_query($mysqli, "SELECT * FROM penyimpanan where ID_CLIENT = '$idclient'" );
$ambil_data = $bukti->fetch_assoc();
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
                <h3>Bukti Pendaftaran Follow Social Media AEEC</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end"></nav>
            </div>
        </div>
    </div>


 
    <section class="section">
        <div class="card">
            <div class="card-header">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Follow Instagram</th>    
                            <td><a href="../../assets/sosmed/<?=$ambil_data['FOLLOW_IG'] ?>" target='_blank' class="btn btn-success">Lihat</a>  </td>
                        </tr>
                        <tr>
                            <th>Like Instagram</th>    
                            <td><a href="../../assets/sosmed/<?=$ambil_data['LIKE_IG'] ?>" target='_blank' class="btn btn-success">Lihat</a>  </td>
                        </tr>
                        <tr>
                            <th>Follow Linkedin</th>    
                            <td><a href="../../assets/sosmed/<?=$ambil_data['FOLLOW_LINKEDIN'] ?>" target='_blank' class="btn btn-success">Lihat</a>  </td>
                        </tr>
                        <tr>
                            <th>Like Linkedin</th>    
                            <td><a href="../../assets/sosmed/<?=$ambil_data['LIKE_LINKEDIN'] ?>" target='_blank' class="btn btn-success">Lihat</a>  </td>
                        </tr>
                        <tr>
                            <th>Subscribe Youtube</th>    
                            <td><a href="../../assets/sosmed/<?=$ambil_data['SUBS_YT'] ?>" target='_blank' class="btn btn-success">Lihat</a>  </td>
                        </tr>
                        <tr>
                            <th>Like Youtube</th>    
                            <td><a href="../../assets/sosmed/<?=$ambil_data['LIKE_YT'] ?>" target='_blank' class="btn btn-success">Lihat</a>  </td>
                        </tr>
                        <tr>
                            <th>Twitter</th>    
                            <td><a href="../../assets/sosmed/<?=$ambil_data['TWITTER'] ?>" target='_blank' class="btn btn-success">Lihat</a>  </td>
                        </tr>
                        <tr>
                            <th>Facebook</th>    
                            <td><a href="../../assets/sosmed/<?=$ambil_data['FACEBOOK'] ?>" target='_blank' class="btn btn-success">Lihat</a>  </td>
                        </tr>
                    </thead>
                </table>   



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
