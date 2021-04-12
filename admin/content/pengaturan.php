 <?php
  include_once ('../setting/koneksi.php');
  $nama = $_SESSION['username'];
  error_reporting(0);

  $profil = mysqli_query($db, "select * from user a inner join akun b on
  a.username = b.username where a.username = '$nama' ");
  $ar     = mysqli_fetch_Assoc($profil);
?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
            <form method="post" action="../setting/function/upload.php">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../img/profil/<?php echo $ar['foto'] ?>"
                       alt="User profile picture">
                </div>
                <h3 class="profile-username text-center"><?php echo $ar['namadepan']; echo ' '.$ar['namabelakang'] ?></h3>
              </div>
            </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tentang Saya</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Status</b><a class="float-right"><?php echo $ar['status'] ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Jenis Kelamin</b> <a class="float-right"><?php echo $ar['jeniskelamin'] ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Alamat</b> <a class="float-right"><?php echo $ar['alamat'] ?></a>
                  </li>
                </ul>
                <strong><i class="fa fa-book mr-1"></i> Pendidikan</strong>

                <p class="text-muted">
                 <?php echo $ar['pendidikanterakhir'] ?>
                </p>

                <hr>

                <strong><i class="fa fa-map-marker mr-1"></i> Kota, Provinsi</strong>

                <p class="text-muted"><?php echo $ar['kota'] ?>, <?php echo $ar['provinsi'] ?></p>

                <hr>

                <strong><i class="fa fa-file-text-o mr-1"></i> Bio</strong>

                <p class="text-muted"><?php echo $ar['bio'] ?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
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
              <div class="card-body">
                <div class="tab-content">
                  <form class="form-horizontal" action="../setting/function/gantipass.php" method="post" >
                      <div class="form-group">
                        <label for="inputName" class="col-sm-5 control-label">Pasword Saat Ini</label>
                        <div class="col-sm-10">
                          <input type="password"  name="passlama"  class="form-control" id="inputName" placeholder="Pasword Saat Ini">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-5 control-label">Password Baru</label>
                        <div class="col-sm-10">
                          <input type="password"  name="passbaru"  class="form-control" id="inputName" placeholder="Pasword Baru">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-5 control-label">Konfir Password</label>
                        <div class="col-sm-10">
                          <input type="password"  name="konfirpassbaru" class="form-control" id="inputName" placeholder="Konfirmasi Password Baru">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" name="daftar" class="btn btn-danger">Perbarui Profil</button>
                        </div>
                      </div>
                    </form>

                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
