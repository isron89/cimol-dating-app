      <div class="container">
        <div class="panel panel-default">
              <div class="section-title">
                <h2>Registrasi</h2>
                <h3>Sekarang waktu anda untuk <span>Registrasi</span></h3>
                <p>Ketika melakukan pendaftaran secara otomatis anda menyetujui kebijakan Cimol.</p>
              </div>
              <div class="panel-body">
              <div class="col-md-8 offset-2">
                <!-- <?php
                if($_GET['alert'] <> '' )
                {
                  echo"
                      <div class='alert alert-success'>
                        <strong>Success!</strong> Akun Anda Berhasil Di Buat!
                      </div> ";
                }
                elseif ($_GET['error'] <> '' ) {
                  echo"
                    <div class='alert alert-warning'>
                        <strong>Kesalahan!</strong> Password & Konfirmasi Password Harus Sama!
                    </div> 
                  ";
                }
                elseif ($_GET['duplicate'] <> '' ) {
                  echo"
                    <div class='alert alert-danger'>
                        <strong>GAGAL!</strong> Nama Pengguna Sudah Ada, Coba Ganti!
                    </div> 
                  ";
                }
                elseif ($_GET['false'] <> '' ) {
                  echo"
                    <div class='alert alert-danger'>
                        <strong>Ada masalah!</strong> Coba Ulangi Lagi!
                    </div> 
                  ";
                }
              ?> -->
                <form action="setting/function/proses_tambah_user.php" method="post">
                  <div class="form-group">
                    Nama Pengguna<input type="text" class="form-control" id="exampleInputEmail3" name="username" placeholder="Masukan Nama Pengguna" required>
                  </div>
                  <div class="form-group">
                    Nama Depan<input type="text" class="form-control" id="exampleInputEmail3" name="namadepan" placeholder="Nama Depan" required>
                  </div>
                  <!-- <div class="form-group">
                    Nama Belakang<input type="text" class="form-control" id="exampleInputEmail3" name="namabelakang" placeholder="Nama Belakang" >
                  </div> -->
                  <div class="form-group">
                    Tanggal lahir<input type="date" class="form-control" id="exampleInputEmail3" name="tanggal" placeholder="Tanggal lahir" required>
                  </div>
                  <!-- <input type="date" name='tanggall' value='<?php echo $tglahir ?>'/> -->
                  <div class="form-group">
                   Jenis Kelamin <select name="jk" class="form-control">
                      <option value="L">Laki Laki</option>
                      <option value="P">Perempuan</option>
                   </select>
                  </div>
                  <div class="form-group">
                   Status <select name="status" class="form-control">
                      <option value="Lajang">Lajang</option>
                      <option value="Duda">Duda</option>
                      <option value="Janda">Janda</option>
                   </select>
                  </div>
                  <div class="form-group">
                    Password<input type="password" class="form-control" id="exampleInputEmail3" name="password" placeholder="Masukan Password" required>
                  </div>
                   <div class="form-group">
                    Konfirmasi Password<input type="password" class="form-control" id="exampleInputEmail3" name="konfirpassword" placeholder="Konfirmasi Password" required>
                  </div>
                  <button type="submit" class="btn btn-primary" name="daftar">Daftar</button>
                  <hr>
                  <div class="pull-left">
                    <b>Catatan</b> <br>
                    <li>Mendaftar berarti menyetujui <a href="#" data-toggle="modal" data-target="#myModal">syarat & ketentuan</a></li>
                    <li>(*) Wajib diisi</li>
                  </div>
                </form>
              </div>
            </div>
        </div>
      </div>