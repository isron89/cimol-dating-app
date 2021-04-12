<?php
  if(empty($_SESSION['emuk'])){
    header('location:../');
  } 

  $nama = $_SESSION['emuk'];

  $batas   = 5;
  $halaman = @$_GET['halaman'];
  if(empty($halaman)){
   $posisi  = 0;
   $halaman = 1;
  }
  else{ 
    $posisi  = ($halaman-1) * $batas; 
  }
?>
    <section >
      <div class="container">
        <div class="row">
        <div class="col-md-7">
        <div class="container" >
          <img src="img/logo.png" class="logo" alt="">
          <form class="form-inline" action="index.php?menu=member" method="post" >
            <div class="form-group">
              <input type="text" class="form-control" id="exampleInputEmail3" name="username" placeholder="Username, Nama  Atau Kota">
            </div>
            <button type="submit" name="cari" class="btn btn-default">Cari</button><br>
            <div class="checkbox">
            </div>
          </form>
      </div>
          <hr class="row member-row">
            <div class="members">
              <h1 class="page-header">Cimol User</h1>

        <?php

          $member = mysqli_query($db,"select * from user a inner join akun b on a.username = b.username where a.username != '$nama' and a.username != 'admin'  LIMIT $posisi,$batas");
          $no = $posisi+1;
          while($tmp = mysqli_fetch_array($member)):
          $usernamenya  = $tmp['username'];
          $namadepan    = $tmp['namadepan'];
          $namabelakang = $tmp['namabelakang'];
          $jenkelamin   = $tmp['jeniskelamin'];
          $fotomember   = $tmp['foto'];
          $statusas     = $tmp['status'];
          $bionya       = $tmp['bio'];

        ?>
              <div class="row member-row">
                <div class="col-md-3">
                  <?php
                      if($fotomember != '')
                      {
                       echo"<img src='../img/profil/$fotomember' alt='foto profil' class='img-thumbnail' width='120px'  height='120px'>";
                      }
                      else
                      {
                        echo"<img src='../img/profil/user.png' alt='foto profil' class='img-thumbnail' width='100%'  height='100%'>";
                      }
                  ?>
                </div>

                <div class="col-md-5">
                  <div class="text-left">
                    <h3><a href="index.php?menu=profil&username=<?php echo $tmp['username']?>"><?php echo $namadepan.' '.$namabelakang?></a></h3>
                    <b>Username</b> : <?php echo $usernamenya ?><br>
                    <b>Jenis Kelamin</b> : 
                    <?php 
                      if($jenkelamin == 'L')
                      {
                        echo "Laki Laki";
                      } 
                      else
                      {
                        echo "Perempuan";
                      }
                    ?>
                    <br>
                    <b>Status</b> : <?php echo $statusas ?><br>
                    <b>Bio</b> : <b><?php echo $bionya ?></b><br>
                  </div>
                </div>
                <div class="col-md-3">
                <?php 
                  $love   = mysqli_query($db,"select * from love where username = '$usernamenya' and likers = '$nama'");
                  $hitung = $love->num_rows;
                  if($hitung > 0){
                ?>
                  <a href="../setting/function/love.php?user=<?php echo $usernamenya ?>" class="btn btn-default btn-block"><i class="fa fa-heart-o"></i> UnLove</a>
                <?php
                  }
                  else
                  {

                    $user123 = $tmp['username'];
                    $user1234=base64_encode($user123);
                ?>
                <a href="../setting/function/love.php?user=<?php echo $usernamenya ?>" class="btn btn-danger btn-block"><i class="fa fa-heart"></i> Love</a>
                <?php
                  }
                ?>
                <?php if(!empty($tlahir)&& ($tglahir))
                {
                ?>
                <?php
                }
                $infoo  = $tmp['username'];
                $en     = base64_encode($infoo);
                ?>
                  <a href="chatperson.php?user=<?php echo $user1234 ?>" class="btn btn-success btn-block"><i class="fa fa-envelope"></i> Kirim Pesan</a>
                  <a href="index.php?menu=profil&username=<?php echo $en ?>" class="btn btn-info btn-block"><i class="fa fa-info-circle"></i> Lihat Profil</a>
                </div>
              </div>

        <?php
          $no++;
          endwhile;
          $query2     = mysqli_query($db, "select * from user a inner join akun b on a.username = b.username where a.username != '$nama'");
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
        </div>
      </div>
    </div>
  </div>
  </section>
