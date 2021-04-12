<?php
    include_once('setting/koneksi.php');
    //deklarasi queri
    $user       = mysqli_query($db, "select * from user a inner join akun b on a.username = b.username where a.username != 'admin' ");
    $user_online= mysqli_query($db, "select * from user where online = 1 and username != 'admin'");
    $user_pria  = mysqli_query($db, "select * from user a inner join akun b on a.username = b.username where jeniskelamin = 'L' and a.username != 'admin'");
    $user_wanita= mysqli_query($db, "select * from user a inner join akun b on a.username = b.username where jeniskelamin = 'P' and a.username != 'admin'");
    //deklarasi count
    $jumlah = $user->num_rows;
    $online = $user_online->num_rows;
    $pria = $user_pria->num_rows;
    $wanita = $user_wanita->num_rows;
?>
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="panel panel-default groups">
              <div class="panel-heading">
                <div class="section-title">
                <h2>Data user</h2>
                <h3>Jumlah <span>Pengguna</span></h3>
                </div>
                <!-- <h3 class="panel-title">DATA USER</h3> -->
              </div>
              <form  action="setting/function/proses_cari.php" method="get">
              <div class="row">
              <div class="col-sm-6 text-center">
                  <img src="img/status.png" alt="" style="width: 180px; height: 150px;">
                  <h4><span><?php echo $jumlah ?> User </span></h4>
              </div>
               <div class="col-sm-6 text-center">
                  <img src="img/memberonline.png" alt="" style="width: 180px; height: 150px;">
                  <h4><span><?php echo $online ?> Online </span></h4>
              </div>
              </div>
              <div class="row">
               <div class="col-lg-6 text-center">
                  <img src="img/men.png" alt="" style="width: 180px; height: 150px;">
                  <h4><?php echo $pria ?> Pria</h4>
              </div>
               <div class="col-lg-6 text-center">
                  <img src="img/women.png" alt="" style="width: 180px; height: 150px;">
                  <h4><?php echo $wanita ?> Wanita</h4>
              </div>
              </div>   
            </form>
          </div>
          <br><br>
          <div class="panel panel-default friends">
              <div class="section-title">
                <!-- <h3 class="panel-title">USER TERBARU</h3> -->
                <h2>Data user</h2>
                <h3>Pengguna <span>terbaru</span></h3>
              </div>
              <div class="panel-body">
                <ul class="row">
                <?php
                    include_once('setting/koneksi.php');
                    $new   = mysqli_query($db,"select * from user a inner join akun b on a.username = b.username 
                      order by a.username desc limit 4");
                    while($new2 = mysqli_fetch_array($new)):
                    $nm = $new2['namadepan'];
                    $ff = $new2['foto'];
                ?>
                  <li class="col-sm-3"><a href="#" class="thumbnail"><?php
                      if($ff != '')
                      {
                       echo"<img src='img/profil/$ff' alt='foto profil' style='width: 70px; height: 70px;'>";
                      }
                      else
                      {
                        echo"<img src='img/profil/user.png' alt='foto profil' width='50%'  height='50%'>";
                      }
                  ?></a></li>
                <?php
                  endwhile;
                ?>
                </ul>
                <div class="clearfix"></div>
              </div>
            </div>
        </div>
        
          
          <div class="col-md-6">
              <div class="panel">
                <div class="section-title">
                <h2>Testimoni</h2>
                <h3>Kata <span>Mereka</span></h3>
                </div>
                <!-- <h3 class="panel-title">KATA MEREKA </h3> -->
              </div>
              <br>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-4"><img src="img/muslimah22.jpg" style="width: 180px; height: 180px;"></div>
                  <div class="col-sm-8"><h4><a href="#" class="">Yessy Fitrianto</a></h4>
                  <p>"Saya menemukan masa depan saya disini :]"</p></div>
                </div>
                <div class="clearfix"></div>
                <br>
                <div class="row">
                  <div class="col-sm-4"><img src="img/muslim1.jpg" style="width: 180px; height: 180px;"></div>
                  <div class="col-sm-8"><h4><a href="#" class="">Hussein Isron</a></h4>
                  <p>"Aplikasi yang cukup unik dan bermanfaat bagi para jomblo :*"</p></div>
                </div>
                <div class="clearfix"></div>
                <br>
                <div class="row">
                  <div class="col-sm-4"><img src="img/muslim2.jpg" style="width: 180px; height: 180px;"></div>
                  <div class="col-sm-8"><h4><a href="#" class="">Paroke</a></h4>
                  <p>"Akhirnya aku bisa menemukan pasangan abadiku di Bojonegoro."</p></div>
                </div>
                <!-- <div class="group-item">
                  <img src="img/muslimah1.jpg" alt="">
                  <h4><a href="#" class="">Ayu citra</a></h4>
                  <p>Aplikasi yang bermanfaat untuk para jones.</p>
                </div> -->
              </div>
            </div>
        </div>
      </div>
