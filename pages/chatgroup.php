<?php
  session_start();
  include('../setting/koneksi.php');
  error_reporting(0);
  $nama = $_SESSION['emuk'];
  // $tampildata = 
  if(!$nama){
    header('location:index.php');
  }
   $tampilkan = mysqli_query($db, "select * from user a inner join akun b on
   a.username = b.username where a.username = '$nama' ");
   while($row = mysqli_fetch_assoc($tampilkan)):
    $nmdepan = $row['namadepan'];
    $nmblk   = $row['namabelakang'];
    $foto    = $row['foto'];
    $jk      = $row['jeniskelamin'];
    $tlahir  = $row['tempatlahir'];
    $tglahir = $row['tanggallahir'];
    $goldarah= $row['goldarah'];
    $alamat  = $row['alamat'];
    $kota    = $row['kota'];
    $provinsi= $row['provinsi'];
    $hobi    = $row['hobi'];
    $status  = $row['status'];
    $pndidik = $row['pendidikanterakhir'];
    $bio     = $row['bio'];
    endwhile;

?>
<link href="../css/boostrap.min.css" rel="stylesheet" id="bootstrap-css">

<!DOCTYPE html><html class=''>
<head><meta charset='UTF-8'><meta name="robots" content="noindex">
<link rel="shortcut icon" type="image/x-icon" href="../img/status.png" />
<link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" />
<link rel="canonical" href="https://codepen.io/emilcarlsson/pen/ZOQZaV?limit=all&page=74&q=contact+" />
<link href='../css/font.css' rel='stylesheet' type='text/css'>
<title>E-Couple</title>
<link rel="stylesheet" href="../css/popup.css">
<script src="../js/popup.js"></script>
<script src="../js/jquery-latest.js"></script>
<script src="../js/popup2.js"></script>
<script src="../js/hoy3lrg.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<!-- testing autocomple -->
<style>
	.autocomplete-suggestions {
	    border: 1px solid #999;
	    background: #FFF;
	    overflow: auto;
	}
	.autocomplete-suggestion {
	    padding: 2px 5px;
	    white-space: nowrap;
	    overflow: hidden;
	}
	.autocomplete-selected {
	    background: #F0F0F0;
	}
	.autocomplete-suggestions strong {
	    font-weight: normal;
	    color: #3399FF;
	}
	.autocomplete-group {
	    padding: 2px 5px;
	}
	.autocomplete-group strong {
	    display: block;
	    border-bottom: 1px solid #000;
	}
        </style>
		<script src="../js/jquery-latest.js"></script> 
		<script>
		var refreshId = setInterval(function()
		{
			 $('#responsecontainer').load('chatg.php');
		}, 1000);
		</script>
<link rel='stylesheet prefetch' href='../css/reset.css'><link rel='stylesheet prefetch' href='../css/awesome.css'>
<link rel='stylesheet prefetch' href='../css/utama.css'>		
</head>
	<body>
<div id="frame">
	<div id="sidepanel">
		<div id="profile">
			<div class="wrap">
				<a href="index.php?menu=profil"></ABBR><img id="profile-img" src="../img/profil/<?php echo $foto ?>" class="online" alt="" /></a>
				<p><?php echo $nmdepan.' '.$nmblk ?></p>
				<i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>
				<!-- <div id="status-options">
					<ul>
					</ul>
				</div> -->
				<div id="expanded">
					<label><?php echo $bio ?></label>
				</div>
			</div>
		</div>
		<div id="search">
			<label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
			<input type="text" id="buah" name="buah" placeholder="Cari User..." />
			
        	<!-- Memanggil Autocomplete.js -->
        	<script src="../js/query-3.2.1.min.js"></script>
        	<script src="../js/jquery.autocomplete.min.js"></script>

	        <script type="text/javascript">
		$(document).ready(function() {

		    // Selector input yang akan menampilkan autocomplete.
		    $( "#buah" ).autocomplete({
		        serviceUrl: "../setting/function/source.php",   // Kode php untuk prosesing data.
		        dataType: "JSON",           // Tipe data JSON.
		        onSelect: function (suggestion) {
		$( "#buah" ).val("" + suggestion.buah);
		        }
		    });
		})
	        </script>
		</div>
		<div id="contacts">
			<ul>
			<?php $caripesan = mysqli_query($db,"select * from user a inner join akun b on 
				a.username = b.username  where a.username != '$nama' and a.username != 'admin' ");
  			$userrr = $caripesan->num_rows;
  			while($uuss = mysqli_fetch_array($caripesan)):
  				$ol = $uuss['online'];
  			?>
  			<li class="contact">
				<div class="wrap" >
					<?php
						if( $ol == 1){
							$d ="online";
						}
						else
						{
							$d ="offline";
						}

						$aksi 	 = $uuss['username'];
						$aksinya = base64_encode($aksi); 
					?>
					<span class="contact-status <?php echo $d ?>"></span>
					<a style="text-decoration:none" href="chatperson.php?user=<?php echo $aksinya ?>">
						<img src="../img/profil/<?php echo $uuss['foto']?>" alt="" />
					</a>
					<div class="meta">
						<p class="name">
							<?php
								echo $uuss['namadepan'];
							?>
						</p>
						<a style="text-decoration:none" href="chatperson.php?user=<?php echo $aksinya ?>">
						<p class="preview"><?php echo "$d"; ?></p>
						</a>
					</div>
				</div>
			</li>

  			<?php
  			endwhile;
  			?>

<!-- 				
				<li class="contact active">
					<div class="wrap">
						<span class="contact-status busy"></span>
						<img src="#" alt="" />
						<div class="meta">
							<p class="name">Harvey Specter</p>
							<p class="preview">Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do any one of a hundred and forty six other things.</p>
						</div>
					</div>
				</li>
				<li class="contact">
					<div class="wrap">
						<span class="contact-status"></span>
						<img src="http://emilcarlsson.se/assets/haroldgunderson.png" alt="" />
						<div class="meta">
							<p class="name">Harold Gunderson</p>
							<p class="preview">Thanks Mike! :)</p>
						</div>
					</div>
				</li> -->
			</ul>
		</div>
		<div id="bottom-bar">
			<a href="index.php"><button id="addcontact"><i class="fa fa-home fa-fw" aria-hidden="true"></i> <span>Beranda</span></button></a>
			<a href="index.php?menu=profil"><button id="settings"><i class="fa fa-user fa-fw" aria-hidden="true"></i> <span>Profil</span></button></a>
			<a href="index.php?menu=pengaturan"><button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Pengaturan</span></button></a>
			<a href="../setting/function/proses_logout.php"><button id="settings"><i class="fa fa-sign-out  fa-fw" aria-hidden="true"></i> <span>LogOut</span></button></a>
		</div>
	</div>
	<div class="content">
	<div class="contact-profile">
      <img src="../img/group.png ?>" alt="" />
      <p>Chat Publik</p>
      <div class="social-media"><!-- 
        <i class="fa fa-facebook" aria-hidden="true"></i>
        <i class="fa fa-twitter" aria-hidden="true"></i>
         <i class="fa fa-instagram" aria-hidden="true"></i> -->
      </div>
    </div>
    <div class="messages">
      <ul>
		<?php
		$pesan = mysqli_query($db,"select * from pesan where privacy = 'publik' ");
		$jumpes= $pesan->num_rows;
        if($jumpes > 0)
        {
        	echo"
        	<div id='responsecontainer'></div>	
        	";
        }
        else
        {
        	include"modal.php";
        }
    	?>
    	<div class="message-input">
      <form method="post" action="../setting/function/pesanpublik.php">
        <div class="wrap">
          <input type="text" name="isi" placeholder="Tuliskan Pesan Disini..." required/>
	        <a href="javascript:location.reload(true)"><i class="fa fa-refresh attachment" aria-hidden="true"></i></a>
          <button class="submit" name="kirim"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
        </div>
      </form>
	</div>
	</div>
</div>
<script src='//'></script><script src='../js/kquery-min'></script>
<script >$(".messages").animate({ scrollTop: $(document).height() }, "fast");

$("#profile-img").click(function() {
	$("#status-options").toggleClass("active");
});

$(".expand-button").click(function() {
  $("#profile").toggleClass("expanded");
	$("#contacts").toggleClass("expanded");
});

$("#status-options ul li").click(function() {
	$("#profile-img").removeClass();
	$("#status-online").removeClass("active");
	$("#status-away").removeClass("active");
	$("#status-busy").removeClass("active");
	$("#status-offline").removeClass("active");
	$(this).addClass("active");
	
	if($("#status-online").hasClass("active")) {
		$("#profile-img").addClass("online");
	} else if ($("#status-away").hasClass("active")) {
		$("#profile-img").addClass("away");
	} else if ($("#status-busy").hasClass("active")) {
		$("#profile-img").addClass("busy");
	} else if ($("#status-offline").hasClass("active")) {
		$("#profile-img").addClass("offline");
	} else {
		$("#profile-img").removeClass();
	};
	
	$("#status-options").removeClass("active");
});



$(window).on('keydown', function(e) {
  if (e.which == 13) {
    newMessage();
    return false;
  }
});
//# sourceURL=pen.js
</script>		
	
	</body>
</html>