<?php
//Cek Login
require_once("../auth/auth.php"); 
require_once("../../config/database.php");
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

/* TAB CSS */

.wrapper{
  /* max-width: 700px; */
  width: 100%;
  margin: 50px auto;
  padding: 25px 30px 30px 30px;
  border-radius: 5px;
  background: #fff;
  box-shadow: 0px 10px 15px rgba(0,0,0,0.1);
}
.wrapper header{
  font-size: 30px;
  font-weight: 600;
  padding-bottom: 20px;
}
.wrapper nav{
  position: relative;
  width: 100%;
  height: 50px;
  display: flex;
  align-items: center;
}
.wrapper nav label{
  display: block;
  height: 100%;
  width: 100%;
  text-align: center;
  line-height: 50px;
  cursor: pointer;
  position: relative;
  z-index: 1;
  color: #17a2b8;
  font-size: 14px;
  border-radius: 5px;
  margin: 0 5px;
  transition: all 0.3s ease;
}
.wrapper nav label:hover{
  background: rgba(23,162,184,0.3);
}
#home:checked ~ nav label.home,
#blog:checked ~ nav label.blog,
#code:checked ~ nav label.code,
#help:checked ~ nav label.help,
  #about:checked ~ nav label.about{
  color: #fff;
}
nav label i{
  padding-right: 7px;
}
nav .slider{
  position: absolute;
  height: 100%;
  width: 20%;
  left: 0;
  bottom: 0;
  z-index: 0;
  border-radius: 5px;
  background: #17a2b8;
  transition: all 0.3s ease;
}
input[type="radio"]{
  display: none;
}
#blog:checked ~ nav .slider{
  left: 20%;
}
#code:checked ~ nav .slider{
  left: 40%;
}
#help:checked ~ nav .slider{
  left: 60%;
}
#about:checked ~ nav .slider{
  left: 80%;
}
section .content{
  display: none;
  background: #fff;
}
#home:checked ~ section .content-1,
#blog:checked ~ section .content-2,
#code:checked ~ section .content-3,
#help:checked ~ section .content-4,
#about:checked ~ section .content-5{
  display: block;
}
section .content .title{
  font-size: 21px;
  font-weight: 500;
  margin: 30px 0 10px 0;
}
section .content p{
text-align: justify;
}
/* END TAB CSS */

.container-fostrap {
  display: table-cell;
  padding: 1em;
  text-align: center;
  vertical-align: middle;
}
.fostrap-logo {
  width: 100px;
  margin-bottom:15px
}
h1.heading {
  color: #fff;
  font-size: 1.15em;
  font-weight: 900;
  margin: 0 0 0.5em;
  color: #505050;
}
@media (min-width: 450px) {
  h1.heading {
    font-size: 3.55em;
  }
}
@media (min-width: 760px) {
  h1.heading {
    font-size: 3.05em;
  }
}
@media (min-width: 900px) {
  h1.heading {
    font-size: 3.25em;
    margin: 0 0 0.3em;
  }
} 
.card {
  display: block; 
    margin-bottom: 20px;
    line-height: 1.42857143;
    background-color: #fff;
    border-radius: 2px;
}
/* .card:hover {
  box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
} */
.img-card {
  width: 100%;
  height:200px;
  border-top-left-radius:2px;
  border-top-right-radius:2px;
  display:block;
    overflow: hidden;
}
.img-card img{
  width: 100%;
  height: 200px;
  object-fit:cover; 
  transition: all .25s ease;
} 
.card-content {
  padding:15px;
  text-align:left;
}
.card-title {
  margin-top:0px;
  font-weight: 700;
  font-size: 1.65em;
}
.card-title a {
  color: #000;
  text-decoration: none !important;
}
.card-read-more {
  border-top: 1px solid #D4D4D4;
}
.card-read-more a {
  text-decoration: none !important;
  padding:10px;
  font-weight:600;
  text-transform: uppercase
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
                                <h3>Non-Regular CLass</h3>
                                <p class="text-subtitle text-muted">Program Reguler yang sedang aktif</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="../dashboard/dashboard.php">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Program</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

<!-- BAGIAN UTAMA CODING [MULAI main-content] -->
<?php 

$reguler = mysqli_query($mysqli,"SELECT b.*
                FROM batch_program b, program p
                WHERE  p.ID_PROGRAM = b.ID_PROGRAM
                AND p.ID_PROGRAM = '".$_GET['id']."'
                AND b.STATUS = '1';");
?>
            <!-- HALAMAN UTAMA -->
            <!-- <div id="main-content">
                 -->
        <section class="section">
        <div class="card mb-3">
            <div class="card-body">
              <div class="row">

    <?php 
		while($spare = mysqli_fetch_array($reguler)){ ?>
                <div class="mb-3 col-md-8 col-lg-3">
                  <div class="border rounded h-100 d-flex flex-column justify-content-between pb-3">
                    <div class="overflow-hidden">
                      <div class="position-relative rounded-top overflow-hidden">
                          <img class="img-fluid rounded-top" style="width:100%; height: 200px; object-fit:cover;" 
                           src="../../assets/images/program/<?=$spare['IMAGE'] ?>" alt="">
                          <span class="badge badge-pill badge-success position-absolute r-0 t-0 mt-2 mr-2 z-index-2">New</span>
                        </div> 

                        <div class="p-3">
                        <h5 class="fs-0"><a class="text-dark" href="">
                        <?= $spare['NAMA_CLASS']  ?>
                        </a></h5>
                        
                        <h5 class="fs-md-2 text-warning mb-0 d-flex align-items-center mb-3"> 
                        <?php echo 'Kuota : '.$spare['KUOTA'] ?>
                        </h5>

                       <a href="../formregis/jenisdaftar.php?idprog=<?=$spare['ID_PROGRAM'] ?>&idbatch=<?=$spare['ID_BATCH'] ?>" class="btn btn-primary w-100 mt-4 mb-0">DAFTAR</a>

                        
                                      
                      </div>
                    </div> 
                  </div>
                </div>
      <?php }?>
              </div>
            </div>       
          </div>

    </section>
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


  
</body>

</html>