
  <!-- Sidebar -->
    <!-- Sidebar Menu -->
    <nav class="mt-1">
    </nav>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header ">
        <div class="d-flex justify-content-between">
               <img src="../../assets/images/logo/aeec.png" style="width: 200px; height: 60px;"  alt="Logo" srcset="">       
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu ">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            
          

            <li
                class="sidebar-item <?= !!strpos($_SERVER['REQUEST_URI'], 'pembayaran') ? 'active' : '' ?>">
                <a href="../pembayaran/pembayaran.php" class='sidebar-link  '>
                    <i class="bi bi-file-earmark-medical-fill"></i>
                    <span>Pembayaran</span>
                </a>
            </li>


            <br></br>
            <br></br>
            <br></br>
            <br></br>
            <br></br>
            <br></br>
            <br></br>
            <br></br>
            <br></br>
           
           
         


            <li  class="sidebar-item mt-3">
                <center>                
                <a href="../auth/logout.php" class="btn btn-danger" style="width: 200px; height: 40px;">LOGOUT</a>
            </center>

            </li>

  </div>
