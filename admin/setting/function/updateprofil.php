<?php
// Panggil koneksi database
 session_start();
require_once "../koneksi.php";
$nama = $_SESSION['username'];

if (isset($_POST['perbarui'])) {

	//variabel update user
	$namad		= $_POST['namadepan'];
	$namab		= $_POST['namabelakang'];
	$jk			= $_POST['jeniskelamin'];
	$tempatl	= $_POST['tempatlahir'];
	$tanggall	= $_POST['tanggallahir'];
	$goldarah	= $_POST['goldarah'];
	$alamat		= $_POST['alamat'];
	$kota		= $_POST['kota'];
	$provinsi	= $_POST['provinsi'];
	$hobi		= $_POST['hobi'];
	$status		= $_POST['status'];
	$pendidikan	= $_POST['pendidikanterakhir'];
	$bio		= $_POST['bio'];

	//menampilkan data user login untuk mencari passwordlama

	$query = mysqli_query($db, "UPDATE akun set
		namadepan    = '$namad',
		namabelakang = '$namab',
		jeniskelamin = '$jk',
		tempatlahir	 = '$tempatl',
		tanggallahir = '$tanggall',
		goldarah	 = '$goldarah',
		alamat		 = '$alamat',
		kota		 = '$kota',
		provinsi	 = '$provinsi',
		hobi 		 = '$hobi',
		status 		 = '$status',
		pendidikanterakhir = '$pendidikan',
		bio 		 = '$bio'
	    where username = '$nama'

	    ");

	header('location: ../../content/index.php?menu=profil');
}					
?>