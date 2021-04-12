<?php
session_start();
include('../setting/koneksi.php');
  $nama = $_SESSION['emuk'];
  $useruser = $get['emuk'];
  $pesan = mysqli_query($db,"select * from pesan where idpengirim = '$nama' and idpenerima ='$useruser' or idpengirim = '$useruser' and idpenerima = '$nama'");
        while ($msg = mysqli_fetch_array($pesan)):
        $isip   = $msg['isi'];
        $dari   = $msg['idpengirim'];

       if($msg['idpengirim'] == $_SESSION['emuk']){
      ?>
        <li class="replies">
          <img src="../img/profil/<?php echo $foto ?>" alt="" />
          <p><?php echo $isip ?></p>
        </li>
      <?php 
        }

      if($msg['idpengirim'] == $_GET['user']){?>
        <li class="sent">
          <img src="../img/profil/<?php echo $quser['foto']; ?>" alt="" />
          <p><?php echo $isip ?></p>
        </li>
      <?php
        }
      endwhile;
?>