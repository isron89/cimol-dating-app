<?php
// Panggil koneksi database
require_once "../koneksi.php";


if (isset($_POST['daftar'])) {

	//variabel tambah tiket
	$namanya		= $_POST['namae'];
	$judul			= $_POST['judul'];
	$jenis			= $_POST['jenis'];
	$isi			= $_POST['isi'];


	//input table tiket 
	$cocok = mysqli_query($db, "insert into tiket 
		(idpengirim, jenis, judul, isi)
		values
		('$namanya', '$jenis', '$judul', '$isi')
		");

	header('location: ../../pages/index.php?menu=tiket&alert=a4wJ47s5');
}					
?>