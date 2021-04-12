<?php 
// koneksi database
include '../koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['iduser'];


// menghapus data dari database
mysqli_query($db,"delete from user where username='$id'");
mysqli_query($db,"delete from akun where username='$id'");

// mengalihkan halaman kembali ke index.php
header("location:../index.php");

?>