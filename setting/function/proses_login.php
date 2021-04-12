<?php
	session_start();
	include_once('../koneksi.php');
    include_once('../system.php');
    $a=new koneksi();
    $db=$a->hubungkan();
    $sistem=new kontrols($db);
	
	$user=$_POST['username'];
	$ps=$_POST['password'];
	$tampilData=$sistem->login($user,$ps);
	foreach ($tampilData as $key => $tData) {}
	if(($user==$tData['username'])and($ps==$tData['password'])){
		$_SESSION['emuk']=$tData['username'];
		header('location:../../pages/?eCouple=selamat datang');
		
	}else{
		header('location:../../');
	}
?>