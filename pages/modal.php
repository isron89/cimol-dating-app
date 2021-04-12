<?php
  $nama = $_SESSION['emuk'];
  if(!$nama){
    header('location:index.php');
  }
?>
        <center><img src="../img/aktivitas.gif"></center>
        <center><h1>Tidak Ada Aktivitas!</h1></center>
		  <div class="container">
			  <!-- Modal -->
			  <div class="modal fade" id="myModal" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">User</h4>
			        </div>
			        <div class="modal-body">
			          <?php
			          	$teman = mysqli_query($db, "select * from user a inner join akun b on a.username = b.username where a.username != '$nama'");
			          	while ($tmn = mysqli_fetch_array($teman)) : 
			          ?>
				      	<div class="col-md-5">
		                  <div class="text-left">
		                    <b>Username</b> : <?php echo $tmn['username']; ?>
		                  </div>
		                </div>
			      	  <?php
			          	endwhile;
			          ?>
			        </div>
			        <div class="modal-footer">
			          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        </div>
			      </div>
			      
			    </div>
			  </div>
			</div>