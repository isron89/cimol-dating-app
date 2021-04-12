<?php
// Panggil koneksi database
session_start();
require_once "../koneksi.php";
$id = $_POST['id'];

	mysqli_query($db,"delete from tiket where id = '$id' ");

	header('location: ../../pages/index.php?menu=tiket');				
?>