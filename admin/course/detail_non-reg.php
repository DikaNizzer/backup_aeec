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
                <h3>Non-Regular Class</h3>
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
            <a href="insert_batch_non-reg.php" class="btn btn-success">Add +</a>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                    <thead> 
                        <tr>
                            <th>ID</th>
                            <th class="col-4">Nama Webinar</th> 
                            <th>Tanggal </th> 
                            <th>Waktu</th> 
                            <th>Status</th>                     
                            <th>Peserta</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query_program = "SELECT * FROM batch_program WHERE ID_PROGRAM = '".$_GET['id']."' ";
                        $tabel_program= mysqli_query($mysqli, $query_program);
                        foreach ($tabel_program as $data_program) : 
                        ?>
                        <tr>
                            <td><?php echo $data_program['ID_BATCH']; ?></td>
                            <td><?php echo $data_program['NAMA_CLASS']; ?></td>   
                            <td><?php echo $data_program['TGL_MULAI']; ?></td>     
                            <td><?php 
                            echo $data_program['WAKTU_MULAI'].' - '.$data_program['WAKTU_BERAKHIR']; 
                            ?></td>  
                            <td> 
                                <?php 
                                if($data_program['STATUS']=='1'){?> 
                                <a href="change_status.php?id=<?php echo $data_program['ID_BATCH']; ?>">
                                     <font color="success"><i><b>Active</b></i></font>
                                </a>
                                <?php } else{ ?> 
                                <a href="change_status.php?id=<?php echo $data_program['ID_BATCH']; ?>">
                                     <font color="grey"><i><b>Non-active</b></i></font></a>
                               </a>
                                <?php } ?>  
                           </td>    
                            <td>
                            <a href="../peserta/tabelpeserta.php?idbatch=<?=$data_program['ID_BATCH']?>" class="btn btn-primary">Show</a>
                            </td>
                            <td>
                            <a href="edit_batch_non-reg.php?id=<?php echo $data_program['ID_BATCH'];?>" class="btn btn-warning">Edit</a>
                            </td>
                            <td>
                            <a href="delete_batch.php?id=<?php echo $data_program['ID_BATCH'];?>" class="btn btn-danger">Delete</a>
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
