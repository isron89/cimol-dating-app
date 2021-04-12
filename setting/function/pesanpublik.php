<?php
// Panggil koneksi database
session_start();
require_once "../koneksi.php";
$nama 	= $_SESSION['emuk'];
$isi 	= $_POST['isi'];


if (isset($_POST['kirim'])) {

	//variabel tambah user
	$query = mysqli_query($db, "INSERT INTO pesan(username,privacy,idpengirim,isi)	
											VALUES('$nama','publik','$nama','$isi')");
}
	header("location:../../pages/chatgroup.php");					
?>