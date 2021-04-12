<?php
	include"../koneksi.php";
  if(isset($_POST['cari'])){ //Jika terpasang postingan dari "cari" maka
    $cari=$_POST['cari'];
    $cari=preg_replace("#[^a-z0-9]#i"," ", $cari);//fungsi ini untuk menghindari karakter selain dari huruf dan angka dengan mengubahnya menjadi spasi, misalkan karakter ' maka akan berubah menjadi space
    $data_pencarian=$db->query("SELECT * FROM akun WHERE jeniskelamin LIKE '%$search%' ");
  foreach($data_pencarian as $result){
    echo $result['username']."<br />";
    }
    }else{

    }
?>