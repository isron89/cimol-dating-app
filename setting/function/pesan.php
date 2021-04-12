<?php
// Panggil koneksi database
session_start();
require_once "../koneksi.php";
$nama 	= $_SESSION['emuk'];
$isi 	= $_POST['isi'];
$target	= $_GET['user'];
$target2= base64_encode($target);


if (isset($_POST['kirim'])) {

	//variabel tambah user
	$query = mysqli_query($db, "INSERT INTO pesan(username,idpengirim,idpenerima,isi)	
											VALUES('$nama','$nama','$target','$isi')");

	mysqli_query($db, "INSERT INTO tmp_pesan(username,pengirim,tujuan,isi)	
											VALUES('$nama','$nama','$target','$isi')");

	mysqli_query($db, "INSERT INTO tmp_pesan(username,pengirim,tujuan,isi)	
											VALUES('$target','$nama','$target','$isi')");
}
	header("location:../../pages/chatperson.php?user=$target2 ");					
?>