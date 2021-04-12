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
        <h1 class="page-header">Hapus Tiket #<?php echo 'KD'.$tiket2 ?></h1>
        </div>
          </div>
        </div>
        </div>
</section>
      <div class="form-group" >
        Anda Yakin Akan Menghapus Tiket Dengan ID <?php echo $tiket2 ?>.?
      </div>

      <form action="../setting/function/hapustiket.php" method="POST" >
        <input type="hidden" name="id" value="<?php echo $tiket2 ?>">
      <a href="index.php?menu=tiket">Kembali</a>
        <input type="submit" value="Hapus" name="hapus" class="btn btn-danger" name="daftar" >
      </form>
      <hr>