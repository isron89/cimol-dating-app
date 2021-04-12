<?php
//buat dulu skrip koneksi kedatabase
require_once "../koneksi.php";
	$jk 	= $_GET['jk'];
	$query 	= "select * from akun a inner join user b on a.username = b.username where a.namadepan like '%".$jk."%' limit 10";
	$ekse 	= mysqli_query($db,$query);
	while($row = mysqli_fetch_array($ekse)):
	$total_kata_kunci = count($jk);
	$t = $jk;

	if ($t < 0) {
	     echo "Data Tidak Tersedia!";
	}

?>
	
	<div class="item">
		<div class="title">
			<?php echo $row['namadepan'];?>
		</div>
		<div class="description">
		<?php echo $row['namabelakang']; ?>
		</div>
		<div class="link">
		<?php echo $row['jeniskelamin']; ?>
		</div>

	</div> 
<?php

	endwhile;
?>


