<?php
include "../koneksi.php";

$username = $_POST['username'];
$pass     = $_POST['password'];

$login = mysqli_query($db, "SELECT * FROM user WHERE username = '$username' AND password='$pass' and level='admin'");
$row=mysqli_fetch_array($login);
if ($row['username'] == $username AND $row['password'] == $pass)
{
  session_start();
  $_SESSION['username'] = $row['username'];
  $_SESSION['password'] = $row['password'];
  header('location:../../content/index.php');
}
else
{
	header('location:../../index.php');
}
?>