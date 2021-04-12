<?php
	session_start();
  // error_reporting();
    include_once('../koneksi.php');
    $nama = $_SESSION['emuk'];
    $s = mysqli_query($db, "update user set online = 0 where username = '$nama' ");
	
	session_destroy();
	header('location:../../');
		
?>