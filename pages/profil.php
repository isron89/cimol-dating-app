<?php
  $nama = $_SESSION['emuk'];
  error_reporting(0);
  if(!$nama){
    header('location:index.php');
  }

  if($_GET['username'] == '')
  {
?>
<section> 
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="profile">
          <h1 class="page-header"><?php echo $nmdepan.' '.$nmblk ?> (<?php echo $nama ?>)</h1>
          <form method="post" enctype="multipart/form-data" action="../setting/function/upload.php">
              
          <div class="col-md-4"> <?php if($foto != '') {echo"<img src='../img/profil/$foto' class='img-thumbnail' alt='foto profil'>"; } 
              else {echo"<img src='../img/profil/user.png' class='img-thumbnail' alt='foto profil'>"; } ?> 
              <input type="file" name="fupload" ><br>
              <input class="btn btn-success" type="submit" name="image" value="Ubah Foto">
          </div>
            
          </form>
          <div class="col-md-8">
          <form action="../setting/function/updateprofil.php" method="post"> 
            <div class="row"> 
              <table class="col-md-8"> 
                <tr>
                  <td>Nama Depan : </td>
                  <td>:</td>
                  <td><input type="text" name='namad' value='<?php echo $nmdepan ?>'/>  </td>
                </tr>
                <tr>
                  <td>Nama Belakang</td>
                  <td>:</td>
                  <td><input type="text" name='namab' value='<?php echo $nmblk ?>'/>  </td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td>:</td>
                  <td><select name="jk"> 
                        <option value="<?php echo $jk ?>"><?php echo $jk ?></option>
                        <option value="L">Laki Laki</option>
                        <option value="P">Perempuan</option>
                    </select></td>
                </tr>
                <tr>
                  <td>Tempat  Lahir</td>
                  <td>:</td>
                  <td><input type="text" name='tempatl' value='<?php echo $tlahir ?>'/></td>
                </tr>
                <tr>
                  <td>Tanggal  Lahir</td>
                  <td>:</td>
                  <td><input type="date" name='tanggall' value='<?php echo $tglahir ?>'/></td>
                </tr>
                <tr>
                  <td>Umur</td>
                  <td>:</td>
                  <td><input type="text" name='umur' value='<?php 
                  function hitung_umur($tanggal_lahir){
                  $birthDate = new DateTime($tanggal_lahir);
                  $today = new DateTime("today");
                  if ($birthDate > $today) { 
                      exit("0 tahun 0 bulan 0 hari");
                  }
                  $y = $today->diff($birthDate)->y;
                  $m = $today->diff($birthDate)->m;
                  $d = $today->diff($birthDate)->d;
                  return $y." tahun ";
                }
                echo hitung_umur($tglahir); ?>'disabled /></td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td>:</td>
                  <td><select name="status"> 
                        <option value="<?php echo $status ?>"><?php echo $status ?></option>
                        <option value="Lajang">Lajang</option>
                        <option value="Janda">Janda</option>
                        <option value="Duda">Duda</option>
                        <option value="Tanpa Status">Tanpa Status</option>
                    </select> Gol Darah : 
                        <select name="goldarah"> 
                        <option value="<?php echo $goldarah ?>"><?php echo $goldarah ?></option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select></td>
                </tr>
                <tr>
                  <td>Provinsi</td>
                  <td>:</td>
                  <td><input type="text" name='provinsi' value='<?php echo $provinsi ?>'/></td>
                </tr>
                <tr>
                  <td>Kota</td>
                  <td>:</td>
                  <td><input type="text" name='kota' value='<?php echo $kota ?>'/></td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td>:</td>
                  <td><textarea cols="30" name="alamat"><?php echo $alamat ?></textarea></td>
                </tr>
                <tr>
                  <td>Hobi</td>
                  <td>:</td>
                  <td><input type="text" name='hobi' value='<?php echo $hobi ?>'/></td>
                </tr>
                <tr>
                  <td>Pendidikan</td>
                  <td>:</td>
                  <td><select name="pendidikan"> 
                        <option value="<?php echo $pndidik ?>"><?php echo $pndidik ?></option>
                        <option value="SD Sederajat">SD Sederajat</option>
                        <option value="SMP Sederajat">SMP Sederajat</option>
                        <option value="SMA Sederajat">SMA Sederajat</option>
                        <option value="D1">D1</option>
                        <option value="D2">D2</option>
                        <option value="D3">D3</option>
                        <option value="S1/D4">S1/D4</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                        <option value="Tidak Sekolah">Tidak Sekolah</option>
                    </select></td>
                </tr>
              </table>
            <div class="row"> 
              <div class="col-md-11"> 
                <div class="panel panel-default">
                  <div class="panel-heading"> <h3 class="panel-title">Bio Anda</h3> </div>
                  <div class="panel-body"> 
                    <form>
                      <div class="form-group">
                        <textarea class="form-control" name="bio" placeholder="Ubah Bio Anda Disini"><?php echo $bio?></textarea> 
                      </div> 
                      
                  </div>
                  </div>.
                  <button type="submit" name='perbarui' class="btn btn-success">Perbarui Profil</button> 
          </form> 
        </div>
       </div>
     </div>
   </div> 
</section>
<?php
}
else
{

  $de         = $_GET['username'];
  $idinfo     = base64_decode($de);
  $tampilkan  = mysqli_query($db, "select * from user a inner join akun b on
   a.username = b.username where a.username = '$idinfo' ");
   while($row = mysqli_fetch_assoc($tampilkan)):
    $i_nmdepan = $row['namadepan'];
    $i_nmblk   = $row['namabelakang'];
    $i_foto    = $row['foto'];
    $i_jk      = $row['jeniskelamin'];
    $i_tlahir  = $row['tempatlahir'];
    $i_tglahir = $row['tanggallahir'];
    $i_goldarah= $row['goldarah'];
    $i_alamat  = $row['alamat'];
    $i_kota    = $row['kota'];
    $i_provinsi= $row['provinsi'];
    $i_hobi    = $row['hobi'];
    $i_statusn = $row['status'];
    $i_pndidik = $row['pendidikanterakhir'];
    $i_bio     = $row['bio'];
    endwhile;
?>
<section> 
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="profile">
          <form> <h1 class="page-header"><?php echo $i_nmdepan.' '.$i_nmblk ?> (<?php echo $idinfo ?>)</h1>
            <div class="row"> 
              <div class="col-md-4"> <?php if($i_foto != '') {echo"<img src='../img/profil/$i_foto' class='img-thumbnail' alt='foto profil'>"; } 
              else {echo"<img src='../img/profil/user.png' class='img-thumbnail' alt='foto profil'>"; } ?> <br>
                <?php 
                    $love = mysqli_query($db,"select * from love where username = '$idinfo'");
                    $jumlahlove = mysqli_num_rows($love);
                  ?>
                  <tr><h4>
                    <td> Disukai Oleh</td>
                    <td>:</td>
                    <td><?php echo $jumlahlove ?> User</td>
                  </h4></tr>
              </div> 
              <table class="col-md-8">
                
                <tr>
                  <td>Nama Depan : </td>
                  <td>:</td>
                  <td><?php echo $i_nmdepan ?></td>
                </tr>
                <tr>
                  <td>Nama Belakang</td>
                  <td>:</td>
                  <td><?php echo $i_nmblk ?></td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td>:</td>
                  <td><?php echo $i_jk ?></td>
                </tr>
                 <tr>
                  <td>Golongan Darah</td>
                  <td>:</td>
                  <td><?php echo $i_goldarah ?></td>
                </tr>
                <tr>
                  <td>Tempat  Lahir</td>
                  <td>:</td>
                  <td><?php echo $i_tlahir ?></td>
                </tr>
                <tr>
                  <td>Tanggal  Lahir</td>
                  <td>:</td>
                  <td><?php echo $i_tglahir ?></td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td>:</td>
                  <td><?php echo $i_statusn ?></td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td>:</td>
                  <td><?php echo $i_alamat ?></td>
                </tr>
                <tr>
                  <td>Kota</td>
                  <td>:</td>
                  <td><?php echo $i_kota ?></td>
                </tr>
                <tr>
                  <td>Provinsi</td>
                  <td>:</td>
                  <td><?php echo $i_provinsi ?></td>
                </tr>
                <tr>
                  <td>Hobi</td>
                  <td>:</td>
                  <td><?php echo $i_hobi ?></td>
                </tr> 
                <tr>
                  <td>Bio</td>
                  <td>:</td>
                  <td><?php echo $i_bio ?></td>
                </tr> 
              </table>
              <tr>
                  <td><a href="index.php" class="btn btn-success"><i class="fa fa-arrow-left"></i> Kembali</a></td>
              </tr>
          </form> 
        </div>
       </div>
     </div>
   </div> 
</section>
<?php
}
?>