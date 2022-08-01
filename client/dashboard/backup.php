<div class="card">          
        <div class="wrapper">
        <header>Program yang Tersedia</header>
        <input type="radio" name="slider" checked id="home">
        <input type="radio" name="slider" id="blog">
        <input type="radio" name="slider" id="code">
        <input type="radio" name="slider" id="help">
        <input type="radio" name="slider" id="about">
        <nav>
        <label for="home" class="home"><i class="fas fa-home"></i>Regular Class</label>
        <label for="blog" class="blog"><i class="fas fa-blog"></i>In-House Training</label>
        <label for="code" class="code"><i class="fas fa-code"></i>C-Suite Connection</label>
        <label for="help" class="help"><i class="far fa-envelope"></i>Non-Regular Class</label>
        <label for="about" class="about"><i class="far fa-user"></i>Program Lain ..</label>
        <div class="slider"></div>
    </nav>
    <section>


    <div class="content content-1">
      
    
        <!-- ISI CARD -->
            <div class="container" style="margin:30px auto">
                <div class="row">
                <?php 
                foreach($reguler as $hasil) : 
                  $count_kuota   = mysqli_query($mysqli,"SELECT h.* 
                                                        FROM histori h JOIN pendaftaran p
                                                        ON h.ID_PENDAFTARAN = p.ID_PENDAFTARAN
                                                        JOIN batch_program b
                                                        ON b.ID_BATCH = p.ID_BATCH
                                                        AND b.ID_BATCH = '".$hasil['ID_BATCH']."'
                                                        ");
                ?>
                    <div class="col-xs-12 col-sm-4" >
                        <div class="card" >
                            <a class="img-card" href="">
                            <img src="../../assets/images/program/<?php echo $hasil['IMAGE'];?>" />
                        </a>
                            <div class="card-content">
                                <h4 class="card-title">
                                    <a href=""> <?= $hasil['NAMA_PROGRAM']?>
                                </a>
                                </h4>
                                <p>Kuota tersedia : <?= $hasil['KUOTA'] ?></p>
                            </div>
                            <center>                
                            <a href="../formregis/jenisdaftar.php?idprog=<?=$hasil['ID_PROGRAM'] ?>&idbatch=<?=$hasil['ID_BATCH'] ?>" class="btn btn-primary" style="width: 320px; height: 40px;">DAFTAR</a>
                            </center>
                        </div>
                </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- END ISI CARD -->
    </div>

    <!-- IN HOUSE -->
    <div class="content content-2">
    
     <!-- ISI CARD -->
     <div class="container" style="margin:30px auto">
                <div class="row">
                
                    <div class="col-xs-12 col-sm-4" >
                        <div class="card" >
                            <a class="img-card" href="">
                            <img src="../../assets/images/program/" />
                        </a>
                            <div class="card-content">
                                <h4 class="card-title">
                                    <a href=""> NANTI BUAT IN HOUSE 
                                </a>
                                </h4>
                                <p class="">
                                Baru Prototype
                                </p>
                            </div>
                            <div class="card-read-more a" style="height:50px;">
                                <a href="../formregis/jenisdaftar.php?idprog=<?=$hasil['ID_PROGRAM'] ?>&idbatch=<?=$hasil['ID_BATCH'] ?>" class="btn btn-link btn-block">
                                    DAFTAR
                                </a>
                            </div>
                        </div>
                </div>

            </div>
            <!-- END ISI CARD -->

    </div>



      <div class="content content-3">
        <div class="title">This is a Code content</div>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, debitis nesciunt! Consectetur officiis, libero nobis dolorem pariatur quisquam temporibus. Labore quaerat neque facere itaque laudantium odit veniam consectetur numquam delectus aspernatur, perferendis repellat illo sequi excepturi quos ipsam aliquid est consequuntur.</p>
      </div>
      <div class="content content-4">
        <div class="title">This is a Help content</div>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim reprehenderit null itaq, odio repellat asperiores vel voluptatem magnam praesentium, eveniet iure ab facere officiis. Quod sequi vel, rem quam provident soluta nihil, eos. Illo oditu omnis cumque praesentium voluptate maxime voluptatibus facilis nulla ipsam quidem mollitia! Veniam, fuga, possimus. Commodi, fugiat aut ut quorioms stu necessitatibus, cumque laborum rem provident tenetur.</p>
      </div>
      <div class="content content-5">
        <div class="title">This is a About content</div>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur officia sequi aliquam. Voluptatem distinctio nemo culpa veritatis nostrum fugit rem adipisci ea ipsam, non veniam ut aspernatur aperiam assumenda quis esse soluta vitae, placeat quasi. Iste dolorum asperiores hic impedit nesciunt atqu, officia magnam commodi iusto aliquid eaque, libero.</p>
      </div>
    </section>
  </div>

            <!-- end coba -->

            </div>
       