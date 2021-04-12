<?php
  error_reporting(0);
  session_start();

  $nama = $_SESSION['emuk'];

  if($nama){
    header('location:pages/?eCouple=selamat');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cimol</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="icon" type="favicon" href="img/status.png">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <script type="text/javascript" src="js/prmajax.js"></script>
  </head>

  <body>
  <!-- Form Login -->
  <header >
    <div class="container">
      <img src="img/logow.png" height="50px" weight="50px" class="logo" alt="">
      <form class="form-inline" action="setting/function/proses_login.php" method="post" >
        <div class="form-group">
          <label class="sr-only" for="exampleInputEmail3">Username</label>
          <input type="text" class="form-control" id="exampleInputEmail3" name="username" placeholder="Masukan Nama Pengguna" required>
        </div>
        <div class="form-group">
          <label class="sr-only" for="exampleInputEmail3">Nama Belakang</label>
          <input type="password" class="form-control" id="exampleInputEmail3" name="password" placeholder="Masukan Password">
        </div>
        <button type="submit" class="btn btn-default">Masuk</button><br>
        <div class="checkbox">
        </div>
      </form>
    </div>
  </header>

    <nav class="navbar navbar-default">
      <div class="container">
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
            <li><a href="#" data-toggle="modal" data-target="#myModal">Syarat & Ketentuan</a></li>
            <li><a href="#" data-toggle="modal" data-target="#tentang">Tentang Kami</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <section>
    <?php
    if($_GET['menu'] <> '' )
    {
      include"".$_GET['menu'].".php";
    }
    else
    {
      include_once"section.php";
    }
   ?>
    </section>
    <header>
      <div class="container">
        <p>Copyright &copy CIMOL 2020</p>
      </div>
    </header>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-popup.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>

<!-- Modal Syarat Dan Ketentuan-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Syarat Dan Ketentuan</h4>
      </div>
      <div class="modal-body">
        <p>
          <li>Foto yang anda upload akan diketahui oleh semua user</li>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal Tentang Kami-->
<div id="tentang" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tentang Kami</h4>
      </div>
      <div class="modal-body">
        <p>
          Developed by Cimol
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>