<section>
      <div class="container">
        <div class="row">
        <div class="col-md-7">
            <div class="members">
              <h1 class="page-header">Pengaturan Akun</h1>
        <?php

          $profil = mysqli_query($db,"select * from user a inner join akun b on a.username = b.username where a.username = '$nama'");
          while($tmp2 = mysqli_fetch_assoc($profil)):
          $usernamenya2 = $tmp2['username'];
          $namadepan2   = $tmp2['namadepan'];
          $namabelakang2= $tmp2['namabelakang'];
          $jenkelamin2  = $tmp2['jeniskelamin'];
          $fotomember2  = $tmp2['foto'];
          $statusas2    = $tmp2['status'];
          $bionya2      = $tmp2['bio'];
          $tlahir      = $tmp2['tanggallahir'];

        ?>
          
              <div class="row member-row">
  <div class="col-md-3">
    <img src="../img/profil/<?php echo $fotomember2 ?>" class="img-thumbnail" alt="">
  </div>
  <div class="col-md-5">
    <div class="text-left">
      <h3><?php echo $namadepan2.' '.$namabelakang2?> (<?php echo $usernamenya2 ?>)</h3>
      <b>Username</b> : <?php echo $usernamenya2 ?><br>
      <b>Jenis Kelamin</b> : 
      <?php 
        if($jenkelamin2 == 'L')
        {
          echo "Laki Laki";
        } 
        else
        {
          echo "Perempuan";
        }
      ?>
      <br>
      <b>Status</b> : <?php echo $statusas2 ?><br>
      <b>Bio</b> : <b><?php echo $bionya2 ?></b><br>
    </div>
  </div>
  <div class="col-md-3">
    <br><br><br>
    <b>Tempat Lahir</b> : <?php echo $statusas2 ?><br>
    <b>Tanggal Lahir</b> : <b><?php echo $tlahir ?></b><br>
  </div>
              </div>

        <?php
          endwhile;
        ?>
        </div>
          </div>
        </div>
        </div>
    </section>
    <?php
      if($_GET['alert'] <> '' )
      {
        echo"
            <div class='alert alert-success'>
              <strong>Success!</strong> Password Berhasil Diubah!
            </div> ";
      }
      elseif ($_GET['error'] <> '' ) {
        echo"
            <div class='alert alert-warning'>
              <strong>Kesalahan!</strong> Password Lama Tidak Benar, Mohon Ulangi Lagi!
            </div>";
      }
      elseif ($_GET['eror'] <> '' ) {
        echo"
            <div class='alert alert-warning'>
              <strong>Kesalahan!</strong> Password & Konfirmasi Password Tidak Sama!
            </div>";
      }
    ?>
    <form action="../setting/function/gantipass.php" method="post">
    <input type="hidden" class="form-control" name="namae" value="<?php echo"$usernamenya2"; ?>">
      <div class="form-group">
        *Password<input type="password" class="form-control" id="exampleInputEmail3" name="passlama" placeholder="Masukan Password Saat Ini" required>
      </div>
      <div class="form-group">
        *Password<input type="password" class="form-control" id="exampleInputEmail3" name="password" placeholder="Masukan Password" required>
      </div>
       <div class="form-group">
        *Konfirmasi Password<input type="password" class="form-control" id="exampleInputEmail3" name="konfirpassword" placeholder="Konfirmasi Password" required>
      </div>
      <button type="submit" class="btn btn-primary" name="daftar">Simpan</button>
      <hr>
    </form>