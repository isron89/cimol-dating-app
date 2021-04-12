<?php
	session_start();
	include_once('../koneksi.php');
	$ssuser = $_GET['user'];

		if($ssuser) {
		$nama 	= $_SESSION['emuk'];
		$querys = mysqli_query($db,"select * from love where username ='$ssuser' and likers = '$nama' ");
		$stat	= mysqli_fetch_array($querys);
		$insert	= $querys->num_rows;
		if($insert == 0)
		{
			//aksi like status
			$likestatus = mysqli_query($db, "insert into love(username, likers)	
												  VALUES('$ssuser',
														 '$nama')");
			// $likestatus = mysqli_query($db, "update love set love(username, password)	
			// 									  VALUES('$username',
			// 											 '$password')");
		}
		else
		{
			$likestatus = mysqli_query($db, "delete from love where username = '$ssuser' and likers = '$nama' ");
		}
	}
	else
	{
		echo "Terdapat Kesalahan";
	}
	header('location: ../../index.php');
?>