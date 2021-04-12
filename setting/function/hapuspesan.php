<?php
// Panggil koneksi database
session_start();
require_once "../koneksi.php";
$id = $_GET['id'];
$user = $_GET['user'];

  mysqli_query($db,"delete from pesan where id = '$id' ");

  header("location: ../../pages/chatperson.php?user='$user'");       
?>