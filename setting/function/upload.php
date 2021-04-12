 <?php
session_start();
$nama = $_SESSION['emuk'];
include_once("../koneksi.php");
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
// Tentukan folder untuk menyimpan file
$folder = "../../img/profil/$nama_file";
// tanggal sekarang
$tgl_upload = date("Ymd");
// Apabila file berhasil di upload
if (move_uploaded_file($lokasi_file,"$folder")){
  echo "Nama File : <b>$nama_file</b> sukses di upload";
  
  // Masukkan informasi file ke database

  $query = mysqli_query($db,"UPDATE akun set foto='$nama_file' where username = '$nama' ");
}
else{
  echo "File gagal di upload";
}
header('location: ../../pages/index.php?menu=profil');
?>



