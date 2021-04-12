<?php
  session_start();
  include("../setting/koneksi.php");
  $nama = $_SESSION['emuk'];

  $querychat = mysqli_query($db, "select * from user a inner join akun b on a.username = b.username 
  	where a.username = '$nama' ");
  $querymin = mysqli_fetch_assoc($querychat);

  $kirimin = $querymin['username'];

?>

	
	<?php
        $pesan = mysqli_query($db,"select * from pesan a inner join akun b on a.username
          = b.username where privacy = 'publik' order by id ");
        while ($msg = mysqli_fetch_array($pesan)):
        $isip   = $msg['isi'];
        $dari   = $msg['idpengirim'];
        $foton  = $msg['foto'];

       if($msg['idpengirim'] == $_SESSION['emuk']){
      ?>
        <li class="replies">
          <a href="index.php?menu=profil">
          <img src="../img/profil/<?php echo $querymin['foto'] ?>" alt="" /></a>
          <p><font color="red"><?php echo 'By '.$msg['namadepan'].':' ?></font><br><?php echo $isip ?></p>
        </li>

      <?php 
        }
        else if ($msg['idpengirim'] == 'admin') {
      ?>
        <li class="sent " >
          <a href="index.php?menu=profil&username=<?php echo $dari ?>">
          <img src="../img/profil/<?php echo $foton ?>" alt="" /></a>
          <p><font color="lightgrey"><b><?php echo 'By '.$msg['username'].':' ?></b></font><br><?php echo $isip ?></p>
        </li>
      <?php
        }
        else
        {
      ?>
        <li class="sent">
          <a href="index.php?menu=profil&username=<?php echo $dari ?>">
          <img src="../img/profil/<?php echo $foton ?>" alt="" /></a>
          <p><font color="cyan"><?php echo 'By '.$msg['namadepan'].':' ?></font><br><?php echo $isip ?></p>
        </li>
      <?php
      	}
        endwhile;
      ?>
</ul>
    </div>
    