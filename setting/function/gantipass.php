<?php
// Panggil koneksi database
require_once "../koneksi.php";


if (isset($_POST['daftar'])) {

	//variabel update user
	$namanya		= $_POST['namae'];
	$passlama		= $_POST['passlama'];
	$passbaru		= $_POST['password'];
	$konfirpassbaru	= $_POST['konfirpassword'];


	//menampilkan data user login untuk mencari passwordlama
	$cocok = mysqli_query($db, "Select * from user where username = '$namanya'");
	while($cari = mysqli_fetch_assoc($cocok)):
		$pass = $cari['password'];
	endwhile;

	if($pass == $passlama){
		if($passbaru == $konfirpassbaru)
		{
			$query = mysqli_query($db, "UPDATE user set password = '$passbaru' where username = '$namanya'");
			header('location: ../../pages/index.php?menu=pengaturan&alert=a4wJ47s5');
		}
		else
		{
			header('location: ../../pages/index.php?menu=pengaturan&eror=a4wJ47s5');
		}
	}
	else
	{
		header('location: ../../pages/index.php?menu=pengaturan&error=a4wJ47s5');
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