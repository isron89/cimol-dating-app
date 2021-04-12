<?php
// Panggil koneksi database
session_start();
require_once "../koneksi.php";


if (isset($_POST['perbarui'])) {

	//variabel update user
	$username	= $_POST['username'];
	$name 		= $_POST['name'];

	//menampilkan data user login untuk mencari passwordlama

	$querys = mysqli_query($db, "UPDATE user set
		username 	 = '$username'
	    where username = '$name'

	    ");
	$query = mysqli_query($db, "UPDATE akun set
		username 	 = '$username'
	    where username = '$name'

	    ");

	header("location:../../content/index.php?menu=user ");
}					
?>