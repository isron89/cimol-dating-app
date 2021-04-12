<?php
  include_once ('../setting/koneksi.php');
  $nama = $_SESSION['username'];

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
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Pengaturan Akun</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <form class="form-horizontal" action="../setting/function/updateprofil.php" method="post" >
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Nama Depan</label>
                        <div class="col-sm-10">
                          <input type="text"  name="namadepan" value="<?php echo $ar['namadepan'] ?>" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-5 control-label">Nama Belakang</label>
                        <div class="col-sm-10">
                          <input type="text"  name="namabelakang" value="<?php echo $ar['namabelakang'] ?>" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName2" class="col-sm-5 control-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                          <select class="col-sm-5 control-label" name="jeniskelamin">
                            <option value="<?php echo $ar['jeniskelamin'] ?>"><?php
                            if($ar['jeniskelamin'] == 'L') { 
                              echo"Laki Laki";
                            } else {
                              echo "Perempuan";
                            }
                            ?></option>
                            <option>Laki Laki</option>
                            <option>Perempuan</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-5 control-label">Tempat Lahir</label>
                        <div class="col-sm-10">
                          <input type="text"  name="tempatlahir" value="<?php echo $ar['tempatlahir'] ?>" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-5 control-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                          <input type="date"  name="tanggallahir" value="<?php echo $ar['tanggallahir'] ?>" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName2" class="col-sm-5 control-label">Gol Darah</label>
                        <div class="col-sm-10">
                          <select class="col-sm-5 control-label" name="goldarah">
                            <option><?php echo $ar['goldarah'] ?></option>
                            <option>A</option>
                            <option>B</option>
                            <option>AB</option>
                            <option>O</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-10 control-label">Alamat</label>
                        <div class="col-sm-10">
                          <textarea class="col-sm-5 control-label" name="alamat"><?php echo $ar['alamat'] ?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-5 control-label">Kota</label>
                        <div class="col-sm-10">
                          <input type="text"  name="kota" value="<?php echo $ar['kota'] ?>" class="form-control" id="inputName" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-5 control-label">Provinsi</label>
                        <div class="col-sm-10">
                          <input type="text"  name="provinsi" value="<?php echo $ar['provinsi'] ?>" class="form-control" id="inputName" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-5 control-label">Hobi</label>
                        <div class="col-sm-10">
                          <input type="text"  name="hobi" value="<?php echo $ar['hobi'] ?>" class="form-control" id="inputName" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-5 control-label">Status</label>
                        <div class="col-sm-10">
                          <select class="col-sm-5 control-label" name="status">
                            <option value="<?php echo $ar['status'] ?>"><?php echo $ar['status'] ?></option>
                            <option value="Lajang">Lajang</option>
                            <option value="Janda">Janda</option>
                            <option value="Duda">Duda</option>
                            <option value="Menikah">Menikah</option>
                            <option value="Tanpa Status">Tanpa Status</option>
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-5 control-label">Pendidikan Terakhir</label>
                        <div class="col-sm-10">
                          <select class="col-sm-5 control-label" name="pendidikanterakhir">
                            <option value="<?php echo $ar['pendidikanterakhir'] ?>"><?php echo $ar['pendidikanterakhir'] ?></option>
                            <option value="SD Sederajat">SD Sederajat</option>
                            <option value="SMP Sederajat">SMP Sederajat</option>
                            <option value="SMA Sederajat">SMA Sederajat</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="S1/D4">S1/D4</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-10 control-label">Bio</label>
                        <div class="col-sm-10">
                          <textarea class="col-sm-5 control-label" name="bio"><?php echo $ar['bio'] ?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" name="perbarui" class="btn btn-danger">Perbarui Profil</button>
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