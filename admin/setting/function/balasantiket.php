<?php
// Panggil koneksi database
session_start();
require_once "../koneksi.php";
$nama = $_SESSION['username'];

if (isset($_POST['perbarui'])) {

	//variabel update user
	$jawab	= $_POST['jawab'];
	$ida  	= $_POST['id'];

	//menampilkan data user login untuk mencari passwordlama

	$query = mysqli_query($db, "UPDATE tiket set
		jawab = '$jawab'
	    where id = '$ida'
	    ");

	header('location: ../../content/index.php');
}					
?>