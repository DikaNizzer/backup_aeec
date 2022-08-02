<?php
//Cek session
require_once("../auth/auth.php"); 
include_once('../../config/database.php');
    // CARI VENDOR PHPOFFICE
    require "../../vendor/autoload.php";
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    if(isset($_POST['cetak'])){
        // BUAT EXCEL
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle("Peserta");
        
        // AMBIL DATA
        $peserta = "select c.*, u.* from user u, client c where c.ID_USER = u.ID_USER";
        $data_peserta = mysqli_query($mysqli, $peserta);
        $i = 2;
        $sheet->setCellValue("A1", "ID Client");
        $sheet->setCellValue("B1", "NAMA");
        $sheet->setCellValue("C1", "jenis Kelamin");
        $sheet->setCellValue("D1", "No Telp");
        $sheet->setCellValue("E1", "NPWP");
        $sheet->setCellValue("F1", "Alamat NPWP");
        $sheet->setCellValue("G1", "Alamat Rumah");
        $sheet->setCellValue("H1", "Instansi");
        $sheet->setCellValue("I1", "Jabatan");
        $sheet->setCellValue("J1", "Alumni");
        $sheet->setCellValue("K1", "Email");
        

        foreach($data_peserta as $hasil){
            $jk = '';
            if($hasil['JK'] == 1){
                $jk = 'Perempuan';
            }else{
                $jk = 'Laki - Laki';
            }

            $alumni = '';
            if($hasil['ALUMNI'] == 1){
                $alumni = 'Iya';
            }else{
                $alumni = 'Bukan';
            }
            $sheet->setCellValue("A".$i, $hasil["ID_CLIENT"]);
            $sheet->setCellValue("B".$i, $hasil["NAMA"]);
            $sheet->setCellValue("C".$i, $jk);
            $sheet->setCellValue("D".$i, $hasil["NO_TELP"]);
            $sheet->setCellValue("E".$i, $hasil["NPWP"]);
            $sheet->setCellValue("F".$i, $hasil["ALAMAT_NPWP"]);
            $sheet->setCellValue("G".$i, $hasil["ALAMAT_RUMAH"]);
            $sheet->setCellValue("H".$i, $hasil["INSTANSI"]);
            $sheet->setCellValue("I".$i, $hasil["JABATAN"]);
            $sheet->setCellValue("J".$i, $alumni);
            $sheet->setCellValue("K".$i, $hasil["EMAIL"]);
            $i++;
        }


            $writer = new Xlsx($spreadsheet);
            

            header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
            header("Content-Disposition: attachment;filename=\"peserta.xlsx\"");
            header("Cache-Control: max-age=0");
            header("Expires: Fri, 11 Nov 2011 11:11:11 GMT");
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: cache, must-revalidate");
            header("Pragma: public");
            $writer->save("php://output");

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
                <h3>Data Peserta</h3>
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

                  <form method="post" action="">
                        <button class="btn btn-success me-1 mb-1" type="submit" name="cetak"><i class="bi bi-download"></i>&nbsp download Excel</button>
                    </form>
            </div>           
            <div class="card-body">           
            <div class="table-responsive">            
                <table class="table table-bordered" id="table1" width="100%" cellspacing="0">           
                    <thead>    
                        <tr> 
                            <th>ID Client</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>No Telp</th>
                            <th>NPWP</th>
                            <th>Notifikasi Email</th>
                            <th>Notifikasi Newslatter</th>                         
                            <th>Detail</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $query_client = "select c.*, u.* from user u, client c where c.ID_USER = u.ID_USER";
                        $tabel_client = mysqli_query($mysqli, $query_client);
                        foreach ($tabel_client as $data_client) :                            
                        ?>
                        <tr>
                            <td><?php echo $data_client['ID_CLIENT']; ?></td>                           
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
                            <td><?php 
                                    if($data_client['AEEC_EMAIL'] == 0){
                                        echo 'Tidak';
                                    }else{
                                        echo 'Iya';
                                    }
                                ?>
                            </td> 
                            <td><?php 
                                    if($data_client['AEEC_NEWSLETTER'] == 0){
                                        echo 'Tidak';
                                    }else{
                                        echo 'Iya';
                                    }
                                ?>
                            </td> 
                            <td>
                                <a href="detail.php?id=<?php echo $data_client['ID_CLIENT']; ?>" class="btn btn-primary">Detail</a>
                            </td>            
                            <td>
                                <a href="edit.php?id=<?php echo $data_client['ID_CLIENT']; ?>" class="btn btn-warning">Edit</a>
                            </td>  
                            <td>
                                <a href="delete.php?id=<?php echo $data_client['ID_CLIENT']; ?>" class="btn btn-danger">Delete</a>
                            </td>    
                        </tr>
                        <?php
                            endforeach
                        ?>
                        </tbody>                   
                    </div>
                </table>
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
