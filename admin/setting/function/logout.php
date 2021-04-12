<?php
	session_start();
    include_once('../koneksi.php');
    $nama = $_SESSION['username'];
    $s = mysqli_query($db, "update user set online = 0 where username = '$nama' ");
	session_destroy();
	header('location:../../index.php');
		
?>