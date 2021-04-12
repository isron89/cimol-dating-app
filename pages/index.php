<?php
  session_start();
  include_once('../setting/koneksi.php');
  error_reporting(0);
  $nama = $_SESSION['emuk'];
  $s = mysqli_query($db, "update user set online = 1 where username = '$nama' ");

  
  // $tampildata = 

   $tampilkan = mysqli_query($db, "select * from user a inner join akun b on
   a.username = b.username where a.username = '$nama' ");
   while($row = mysqli_fetch_assoc($tampilkan)):
    $nmdepan = $row['namadepan'];
    $nmblk   = $row['namabelakang'];
    $foto    = $row['foto'];
    $jk      = $row['jeniskelamin'];
    $tlahir  = $row['tempatlahir'];
    $tglahir = $row['tanggallahir'];
    $goldarah= $row['goldarah'];
    $alamat  = $row['alamat'];
    $kota    = $row['kota'];
    $provinsi= $row['provinsi'];
    $hobi    = $row['hobi'];
    $status  = $row['status'];
    $pndidik = $row['pendidikanterakhir'];
    $bio     = $row['bio'];
    endwhile;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cimol</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link rel="icon" type="favicon" href="../img/status.png">
    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/font-awesome.css" rel="stylesheet">
    <script type="text/javascript" src="../js/prmajax.js"></script>
  </head>

  <body >
    <nav class="navbar navbar-default">
      <div class="container" >
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Beranda</a></li>
            <li><a href="chatperson.php">Pesan
            <?php
              $jumpes = mysqli_query($db,"select * from tmp_pesan where username = '$nama' and tujuan ='$nama' and  lihat =0 ");
              $pesjum = $jumpes->num_rows;
              if($pesjum > 0){
              echo '<i class="btn btn-success">'.$pesjum.'</i>';
            }
            ?>
            </a></li>
            <li><a href="chatgroup.php">ChatPublic</a></li>
            <li><a href="index.php?menu=tiket">Secret Messages</a></li>
            <li><a href="index.php?menu=pengaturan">Pengaturan</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<!--     // empty($nmdepan) && empty($nmblk) && empty($foto) && empty($jk)
    // && empty($tlahir) && empty($tglahir) && empty($alamat) && empty($status)
 -->
    <?php
    if(empty($tlahir)&& ($tglahir))
    {
    echo"
    <section>
      <div class='alert alert-danger'>
        <strong>Perhatian!</strong> Lengkapi Profil Anda Untuk Bisa Mendapatkan Hasil Riset Yang Lebih Baik Dari Kami
        By Cimol! <a href='index.php?menu=profil' class='btn-success'>Klik Disini</a>
      </div>
    </section> 
    ";
    }
    ?>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="panel panel-default post">
              <div class="panel-body">
             <?php
        		if($_GET['menu'] <> '' )
        		{
        			include"".$_GET['menu'].".php";
        		}
        		else
        		{
        			include"members.php";
        		}
    		    ?>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="panel panel-default friends">
              <div class="panel-heading">
                <h3 class="panel-title">Profil Anda</h3>
              </div>
              <div class="panel-body">
                  <li><a href="#" data-toggle="modal" data-target="#foto" class="thumbnail">
                  <?php
                  if($foto != '')
                  {
                    echo"<img src='../img/profil/$foto' alt='foto profil'>";
                  }
                  else
                  {
                    echo"<img src='../img/profil/user.png' alt='foto profil'>";
                  }
                  ?>
                  </a></li>
                <div class="clearfix">
                  Nama : <?php echo $nmdepan ?><br>
                  Username : <?php echo $nama ?><br>
                  Jenis Kelamin : <?php 
                  if($jk == 'L'){
                    echo "Laki Laki";
                  } 
                  else{
                    echo "Perempuan";
                  }
                  ?> <br>
                </div>
                <div class="clearfix">
                <b>Bio</b> : <?php echo $bio ?>
                </div><br>
                  <a class="btn btn-primary" href="index.php?menu=profil">Edit Profil</a>
                  <a class="btn btn-primary" href="chatperson.php">Pesan</a>
                  <a class="btn btn-primary" href="../setting/function/proses_logout.php">Logout</a>
              </div>
            </div>
            <div class="panel panel-default groups">
              <div class="panel-heading">
                <h3 class="panel-title">Cocokologi </h3>
              </div>
              <div class="panel-body">
              <div class="group-item">
              <p align="justify">Jadikan Mereka Teman, Sahabat Atau Bahkan Pasangan Anda! System Akan Mendeteksi User Dengan Kesamaan Minat Anda</p>
              </div>
                <div class="clearfix"></div>
                <?php
                  $cocok = mysqli_query($db, "select * from akun where jeniskelamin != '$jk' AND username != '$nama' and status = '$status' and provinsi ='$provinsi'  
                     order by idakun limit 5");   

                  $cocoka= mysqli_query($db, "select * from akun where jeniskelamin != '$jk' and status = '$status' and provinsi ='$provinsi' AND username != '$nama'
                     ");
                  $jum   = $cocoka->num_rows;
                  while($kologi = mysqli_fetch_array($cocok)):
                ?>
                  <div class="group-item">
                     <?php
                      if($foto != '')
                      {
                        echo"<img src='../img/profil/$kologi[foto]' alt='foto profil'>";
                      }
                      else
                      {
                        echo"<img src='../img/profil/user.png' alt='foto profil'>";
                      }
                      ?>
                    <div class="col-md-4">
                      <a href="index.php?menu=profil&username=<?php echo base64_encode($kologi['username']) ?>" class="btn btn-info btn-block"><i class="fa fa-info-circle"></i> Info</a>
                      <a href="chatperson.php?user=<?php echo base64_encode($kologi['username'])?>" class="btn btn-success btn-block"><i class="fa fa-envelope"></i> Pesan</a>
                    </div>
                      <p><?php echo $kologi['namadepan'] ?>, <?php echo $kologi['status'] ?>, <?php echo $kologi['kota'] ?>, <?php echo $kologi['provinsi'] ?></p>
                  </div>
                <?php
                  endwhile;
                ?>
                <div class="clearfix"></div>
                <?php
                  if($jum > 5){

                  echo"Hasil Kecocokan $jum User";
                ?>
                <a href="#" class="btn btn-primary">Lihat Hasil Cocokologi Selengkapnya</a>
                <?php
                  }
                else
                {
                  echo"Hasil Kecocokan $jum User";
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div class="container">
        <p>Copyright &copy CIMOL 2020</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery-popup.js"></script>
    <script src="../js/bootstrap.js"></script>

    <!-- KUMPULAN MODAL -->
    <!-- Modal Tentang Kami-->
  <div id="foto" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Foto Profil Anda</h4>
        </div>
        
        <div class="modal-body">
        <?php
            if($foto != '')
            {
             echo"<img src='../img/profil/$foto' alt='foto profil' width='100%' height='100%'>";
            }
            else
            {
              echo"<img src='../img/profil/user.png' alt='foto profil' width='100%' height='100%'>";
            }
        ?>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>

    </div>
  </div>
  <div id="akses" class="modal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Akses Dibatasi</h4>
        </div>
        <div class="modal-body">
          <section>
            <div >
              <strong>Perhatian!</strong> Lengkapi Profil Anda Untuk Mengakses Semua Fitur Cimol! <a href='index.php?menu=profil' class='btn-success'>Klik Disini</a>
            </div>
          </section> 
        </div> 
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>

    </div>
  </div>
  </body>
</html>
