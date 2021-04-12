<?php
  include_once('../seting/koneksi.php');
  $nama = $_SESSION['emuk'];
?>
<section>
      <div class="container">
        <div class="row">
        <div class="col-md-7">
            <div class="members">
              <h1 class="page-header">Secret Messages</h1>
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
              <strong>Success!</strong> Tiket Berhasil Dikirim!
            </div> ";
      }
    ?>
    <form action="../setting/function/tiket.php" method="post">
    <input type="hidden" class="form-control" name="namae" value="<?php echo"$usernamenya2"; ?>">
      <div class="form-group">
        *Judul<input type="text" class="form-control" id="exampleInputEmail3" name="judul" placeholder="Masukan Password Saat Ini" required>
      </div>
      <div class="form-group">
        *Jenis Pertanyaan
        <select class="form-control" name="jenis">
          <option value="2">Tinggi (Pertanyaan Dengan Tingkat Kesulitan Sangat Sulit)</option>
          <option value="1">Sedang (Pertanyaan Dengan Tingkat Kesulitan Sedang)</option>
          <option value="0">Biasa (Pertanyaan Dengan Tingkat Kesulitan Biasa)</option>
        </select>
      </div>
      <div class="form-group">
        *Keterangan<textarea placeholder="Isi Keterangan Disini" name="isi" class="form-control" rows="5" id="exampleInputEmail3" ></textarea>
      </div>
      <button type="submit" class="btn btn-primary" name="daftar">Simpan</button>
      <hr>
    </form>

    <?php
       $batas   = 8;
      $halaman = @$_GET['halaman'];
      if(empty($halaman)){
       $posisi  = 0;
       $halaman = 1;
      }
      else{ 
        $posisi  = ($halaman-1) * $batas; 
      }
    ?>
    <!-- Menampilkan Tiket -->
              <div class="panel panel-default groups">
              <div class="panel-heading">
                <h3 class="panel-title">Secret messages </h3>
              </div>
              <div class="panel-body">
              <div class="group-item">
              <p align="justify">Berikut merupakan list pesan sembunyi yang telah anda buat</p>
              </div>
                <div class="clearfix"></div>
                  <div class="group-item">
                    <div class="col-md-1">
                      Id
                    </div>
                    <div class="col-md-4">
                     Judul
                    </div>
                    <div class="col-md-2">
                      Jenis Pesan
                    </div>
                    <div class="col-md-3">
                        Status
                    </div>
                    <div class="col-md-2">
                        Aksi
                    </div>
                  </div>
                <?php
                  $cocok = mysqli_query($db, "select * from tiket where idpengirim = '$nama' LIMIT $posisi,$batas ");   

                  while($kologi = mysqli_fetch_array($cocok)):
                ?>
                  <div class="group-item">
                    <div class="col-md-1">
                      <?php echo $kologi['id']?>
                    </div>
                    <div class="col-md-4">
                      <?php echo $kologi['judul']?>
                    </div>
                    <div class="col-md-2"><b>
                       <?php
                          $stat = $kologi['jenis'];
                          if ($stat == 2){
                            echo "Tinggi";
                          }else if ($stat == 1){
                            echo "Sedang";
                          } else {
                            echo"Biasa";
                          }
                        ?></b>
                    </div>
                    <div class="col-md-3">
                       <?php 
                          if($kologi['jawab'] == ''){
                            echo "<button class='btn btn-danger'>Belum Dijawab</button>";
                          }
                          else
                          {
                            echo "<button class='btn btn-success'>Dijawab</button>";
                          }
                       ?>
                    </div>
                    <div class="col-md-2">
                       <a href="index.php?menu=liattiket&tiket=<?php echo base64_encode($kologi['id'])?>"><button class="btn btn-success"> <i class='fa fa-info'> </i></button></a>
                    
                       <a href="index.php?menu=hapustiket&tiket=<?php echo base64_encode($kologi['id'])?>"><button class="btn btn-danger"> <i class='fa fa-trash'> </i></button></a>
                    </div>
                  </div>
                <?php
                  $no++;
                  endwhile;
                  $query2     = mysqli_query($db, "select * from tiket where idpengirim = '$nama' LIMIT $posisi,$batas");
                  $jmldata    = mysqli_num_rows($query2);
                  $jmlhalaman = ceil($jmldata/$batas);
                  echo "<br> Halaman : ";

                  for($i=1;$i<=$jmlhalaman;$i++)
                  if ($i != $halaman){
                   echo " <a href=\"index.php?halaman=$i\">$i</a> | ";
                  }
                  else{ 
                   echo " <b>$i</b> | "; 
                  }
                ?>
                <div class="clearfix"></div>
              </div>
            </div>