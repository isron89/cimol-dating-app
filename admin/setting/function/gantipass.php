<?php
// Panggil koneksi database
require_once "../koneksi.php";
session_start();
$nama = $_SESSION['username'];


if (isset($_POST['daftar'])) {

	//variabel update user
	$passlama		= $_POST['passlama'];
	$passbaru		= $_POST['passbaru'];
	$konfirpassbaru	= $_POST['konfirpassbaru'];


	//menampilkan data user login untuk mencari passwordlama
	$cocok = mysqli_query($db, "Select * from user where username = '$nama'");
	while($cari = mysqli_fetch_assoc($cocok)):
		$pass = $cari['password'];
	endwhile;

	if($pass == $passlama){
		if($passbaru == $konfirpassbaru)
		{
			$query = mysqli_query($db, "UPDATE user set password = '$passbaru' where username = '$nama'");
			header('location: ../../content/index.php?menu=pengaturan&alert=a4wJ47s5');
		}
		else
		{
			header('location: ../../content/index.php?menu=pengaturan&eror=a4wJ47s5');
		}
	}
	else
	{
		header('location: ../../content/index.php?menu=pengaturan&error=a4wJ47s5');
	}

	
	// if($passbaru != $pass){
	// 	header('location: ../../index.php?menu=pengaturan');
	// }
	// else
	// {
			
		// if ($passbaru == $konfirpassbaru)
		// {
			
// 		}
// 		else
// 		{
// 			header('location: ../../index.php?menu=pengaturan&false=71982hkKbnxQ');
// 		}
	// }
}					
?>