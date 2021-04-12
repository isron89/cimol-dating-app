<?php
  include_once('../seting/koneksi.php');
  $nama = $_SESSION['emuk'];


  $tiket  = $_GET['tiket'];
  $tiket2 = base64_decode($tiket);

    $profil = mysqli_query($db,"select * from tiket where id = '$tiket2'");
    while($tmp2 = mysqli_fetch_assoc($profil)):
    $id     = $tmp2['id'];
    $judul  = $tmp2['judul'];
    $isi  = $tmp2['isi'];
    $jawab  = $tmp2['jawab'];
    endwhile;

?>
<section>
      <div class="container">
        <div class="row">
        <div class="col-md-7">
      <div class="members">
        <h1 class="page-header">Tiket Bantuan #<?php echo 'KD'.$tiket2 ?></h1>
        </div>
    <input type="hidden" class="form-control" name="namae" value="<?php echo"$usernamenya2"; ?>">
      <div class="form-group">
        Judul : <?php echo $judul ?>
      </div>
      <div class="form-group">
        Jenis Pertanyaan : <?php echo $tmp2['jenis'] ?>
      </div>
      <div class="form-group">
        Jawaban : <?php echo $jawab ?>
      </div>

      <a href="index.php?menu=tiket"><button type="submit" class="btn btn-primary" name="daftar">Kembali</button></a>
      <hr>

          </div>
        </div>
        </div>
</section>