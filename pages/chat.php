<?php
  $nama = $_SESSION['emuk'];
  if(!$nama){
    header('location:index.php');
  }

  $useruser2 = $_GET['user'];
  $useruser = base64_decode($useruser2);

  $queryuser = mysqli_query($db, "select * from user a inner join akun b on a.username = b.username where a.username = '$useruser' ");
  $quser = mysqli_fetch_assoc($queryuser);
?>
<div class="contact-profile">
      <img src="../img/profil/<?php echo $quser['foto']; ?>" alt="" />
      <p><?php echo $quser['namadepan']; ?></p> 
    </div>
    <div class="messages">
      <ul>
      <div>
      <?php
        $pesan = mysqli_query($db,"select * from pesan where idpengirim = '$nama' and idpenerima ='$useruser' or idpengirim = '$useruser' and idpenerima = '$nama'");
        while ($msg = mysqli_fetch_array($pesan)):
        $isip   = $msg['isi'];
        $dari   = $msg['idpengirim'];

       if($msg['idpengirim'] == $_SESSION['emuk']){
      ?>
        <li class="replies">
          <img src="../img/profil/<?php echo $foto ?>" alt="" />
          <p><?php echo $isip ?><br>
          <a href="../setting/function/hapuspesan.php?id=<?php echo $msg['id']?>&user=<?php echo $useruser2?>"><i class="fa fa-trash"> </i></a> &nbsp;
          </p>
        </li>

      <?php 
        }
      if($msg['idpengirim'] == $useruser){?>
        <li class="sent">
          <img src="../img/profil/<?php echo $quser['foto']; ?>" alt="" />
          <p><?php echo $isip ?></p>
        </li>
      <?php
        }
        endwhile;
      ?>
      </ul>
    </div>
    <div class="message-input">
      <form method="post" action="../setting/function/pesan.php?user=<?php echo $useruser ?>">
        <div class="wrap">
          <input type="text" name="isi" placeholder="Tuliskan Pesan Disini..." />
          <a href="javascript:location.reload(true)"><i class="fa fa-refresh attachment" aria-hidden="true"  alt="refresh"></i></a>
          <button class="submit" name="kirim"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
        </div>
      </form>
    </div>