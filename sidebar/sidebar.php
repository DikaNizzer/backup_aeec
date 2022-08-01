
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
                class="sidebar-item  <?= !!strpos($_SERVER['REQUEST_URI'], 'dashboard') ? 'active' : '' ?> ">
                <a href="../layout/dashboard.php" class='sidebar-link '>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

          
            <li
                class="sidebar-item  <?= !!strpos($_SERVER['REQUEST_URI'], 'peserta') ? 'active' : '' ?>">
                <a href="../client/peserta.php" class='sidebar-link '>
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Peserta</span>
                </a>
            </li>
     
            <li
                class="sidebar-item  has-sub ">
                <a href="#" class='sidebar-link '>
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Program</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item  <?= !!strpos($_SERVER['REQUEST_URI'], 'reguler') ? 'active' : '' ?>">
                        <a href="../course/reguler.php">Regular Class</a>
                    </li>
                    <li class="submenu-item  <?= !!strpos($_SERVER['REQUEST_URI'], 'in-house') ? 'active' : '' ?>">
                        <a href="../course/in-house.php">In-House Training</a>
                    </li>
           
                    <li class="submenu-item <?= !!strpos($_SERVER['REQUEST_URI'], 'non-reg') ? 'active' : '' ?>">
                        <a href="../course/non-reg.php">Non-Regular Class</a>
                    </li>
                    
                </ul>
            </li>

            <li
                class="sidebar-item  <?= !!strpos($_SERVER['REQUEST_URI'], 'discount') ? 'active' : '' ?> ">
                <a href="../discount/discount.php" class='sidebar-link '>
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Diskon</span>
                </a>
            </li>



            <li
                class="sidebar-item  <?= !!strpos($_SERVER['REQUEST_URI'], 'pendaftaran') ? 'active' : '' ?>">
                <a href="../pendaftaran/pendaftaran.php" class='sidebar-link '>
                    <i class="bi bi-file-earmark-medical-fill"></i>
                    <span>Pendaftaran</span>
                </a>
            </li>


            <li
                class="sidebar-item <?= !!strpos($_SERVER['REQUEST_URI'], 'pembayaran') ? 'active' : '' ?>">
                <a href="../pembayaran/pembayaran.php" class='sidebar-link  '>
                    <i class="bi bi-file-earmark-medical-fill"></i>
                    <span>Pembayaran</span>
                </a>
            </li>

            <!-- <li
                class="sidebar-item <?= !!strpos($_SERVER['REQUEST_URI'], 'statistik') ? 'active' : '' ?>">
                <a href="../statistik/statistik.php" class='sidebar-link  '>
                    <i class="bi bi-file-earmark-medical-fill"></i>
                    <span>Statistik</span>
                </a>
            </li> -->
            <br></br>
            <br></br>
            <br></br>
           
           
         


            <li  class="sidebar-item mt-3">
                <center>                
                <a href="../auth/logout.php" class="btn btn-danger" style="width: 200px; height: 40px;">LOGOUT</a>
            </center>

            </li>

  </div>
