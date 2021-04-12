<?php
  session_start();
  include_once("../setting/koneksi.php");
  $nama = $_SESSION['username'];
  error_reporting(0);
  if(!$nama){
    header("location:../index.php");
  }
  else
  {
  //info admin
  $admin = mysqli_query($db,"select * from user a inner join
    akun b on a.username = b.username where a.username = '$nama'");
  $tmp   = mysqli_fetch_assoc($admin);
  //menampilkan field
  $namadepan    = $tmp['namadepan'];
  $namabelakang = $tmp['namabelakang'];
  $foto         = $tmp['foto'];
  //info user
  $query = mysqli_query($db,"select * from user a inner join
    akun b on a.username = b.username where a.username != '$nama'");
  $jumlah = $query->num_rows;
  while($tampil = mysqli_fetch_array($query)):

  endwhile;
  //cekuser online
  $query2 = mysqli_query($db,"select * from user a inner join
    akun b on a.username = b.username where a.username != '$nama' and a.online = 1 and a.username != '$nama'");
  $ol = $query2->num_rows;

  //cekuserpria & wanita
  $user_pria  = mysqli_query($db, "select * from user a inner join akun b on a.username = b.username where jeniskelamin = 'L' and a.username != '$nama'");
  $user_wanita= mysqli_query($db, "select * from user a inner join akun b on a.username = b.username where jeniskelamin = 'P' and a.username != '$nama' ");
  $userp = $user_pria->num_rows;
  $userw = $user_wanita->num_rows;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>ADMIN | Beranda </title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-success navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Beranda</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php?menu=pengaturan" class="nav-link">Pengaturan</a>
      </li>
    </ul>

    <!-- Right navbar links -->
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="../../img/status.png" alt="E-Couple" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">E-Couple</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <a href="index.php?menu=profil" class="d-block"><img src="../../img/profil/<?php echo $foto ?>" class="img-circle elevation-2" alt="User Image"></a>
        </div>
        <div class="info">
          <a href="index.php?menu=profil" class="d-block"><?php echo $namadepan.' '.$namabelakang ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Menu Utama</li>
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Beranda
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?menu=user" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Data User
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>
          
          <li class="nav-header">Pengaturan</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Akun
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?menu=profil" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Profil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?menu=pengaturan" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Ganti Password</p>
                </a>
              </li>
            </ul>
            <li class="nav-item">
            <a href="../setting/function/logout.php" class="nav-link">
              <i class="nav-icon fa fa-sign-out"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">E-Couple</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active"><a href="../setting/function/logout.php">Logout</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Semua User</span>
                <span class="info-box-number">
                  <?php echo $jumlah .' User'?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-male"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">User Pria</span>
                <span class="info-box-number"><?php echo $userp.' User' ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-female"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">User Wanita</span>
                <span class="info-box-number"><?php echo $userw.' User'?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">User Online</span>
                <span class="info-box-number"><?php echo $ol.' User' ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

         <?php
              if($_GET['menu'] <> '' )
              {
                include"".$_GET['menu'].".php";
              }
              else
              {
                include"konten.php";
              }
        ?>

        
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-sm-none d-md-block">
      <a href="#">Ke Atas</a>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 E-Couple.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jVectorMap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.2 -->
<script src="../plugins/chartjs-old/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="../dist/js/pages/dashboard2.js"></script>
</body>
</html>
<?php

  }
?>