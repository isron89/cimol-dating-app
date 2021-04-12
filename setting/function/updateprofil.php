<?php
// Panggil koneksi database
 session_start();
require_once "../koneksi.php";
$nama = $_SESSION['emuk'];

if (isset($_POST['perbarui'])) {

	//variabel update user
	$namad		= $_POST['namad'];
	$namab		= $_POST['namab'];
	$jk			= $_POST['jk'];
	$tempatl	= $_POST['tempatl'];
	$tanggall	= $_POST['tanggall'];
	$goldarah	= $_POST['goldarah'];
	$alamat		= $_POST['alamat'];
	$kota		= $_POST['kota'];
	$provinsi	= $_POST['provinsi'];
	$hobi		= $_POST['hobi'];
	$status		= $_POST['status'];
	$pendidikan	= $_POST['pendidikan'];
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

	header('location: ../../pages/index.php?menu=profil');
}					
?>