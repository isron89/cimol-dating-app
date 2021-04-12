<?php
// Panggil koneksi database
require_once "../koneksi.php";

if (isset($_POST['daftar'])) {

	//variabel tambah user
	$username 		= $_POST['username'];
	$namadepan		= $_POST['namadepan'];
	//$namabelakang	= $_POST['namabelakang'];
	$tanggallahir	= $_POST['tanggal'];
	$jeniskelamin	= $_POST['jk'];
	$status			= $_POST['status'];
	$password		= $_POST['password'];
	$konfirpassword = $_POST['konfirpassword'];

	//menambahkan ke tabel user
	$sama = mysqli_query($db, "Select * from user where username = '$username'");
	$sama2 = $sama->num_rows;
	
	if($sama2 > 0){
		header('location: ../../index.php?duplicate=71982hkKbnxQ');
	}
	elseif ($password != $konfirpassword) {
		header('location: ../../index.php?error=71982hkKbnxQ');
	}
	else
	{
		$query = mysqli_query($db, "INSERT INTO user(username, password)	
											  VALUES('$username',
													 '$password')");

		$query2 = mysqli_query($db, "INSERT INTO akun(username, namadepan, tanggallahir, foto, jeniskelamin, status)	
											  VALUES('$username','$namadepan','$tanggallahir','user.png', '$jeniskelamin', '$status')");
	
		if ($query && $query2 == true)
		{
		header('location: ../../index.php?alert=71982hkKbnxQ');
		}
		else
		{
		header('location: ../../index.php?false=71982hkKbnxQ');
		}
	}

}					
?>