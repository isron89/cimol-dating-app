<?php
  include("../setting/koneksi.php");
  $nama = $_SESSION['username'];
?>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data User</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Status</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Kota</th>
                  <th>Provinsi</th>
                  <th>Pendidikan</th>
                  <th>Login</th>
                  <th colspan="2">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  $data = mysqli_query($db,"select * from user a inner join akun b
                    on a.username = b.username where a.username != '$nama' ");
                  while($show = mysqli_fetch_Array($data)):
                ?>
                <tr>
                  <td><?php echo $show['username']?></td>
                  <td><?php echo $show['namadepan']?> <?php echo ' '.$show['namabelakang']?></td>
                  <td><?php echo $show['status']?></td>
                  <td><?php echo $show['jeniskelamin']?></td>
                  <td><?php echo $show['alamat']?></td>
                  <td><?php echo $show['kota']?></td>
                  <td><?php echo $show['provinsi']?></td>
                  <td><?php echo $show['pendidikanterakhir']?></td>
                  <td><?php 
                  if($show['online'] == '0')
                    { echo "<button class='btn btn-default'>Offline</button>";} else {echo"<button class='btn btn-success'>Online</button>";}

                  ?>
                    
                  </td>
                  <td><a href="index.php?menu=edituser&name=<?php echo $show['username'] ?>"><button class="btn btn-default"><i class="fa fa-edit"></i></button></a></td>
                  <td><a href="index.php?menu=hapususer&name=<?php echo $show['username'] ?>">
                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a></td>
                </tr>
              <?php endwhile;?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Status</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Kota</th>
                  <th>Provinsi</th>
                  <th>Pendidikan</th>
                  <th>Login</th>
                  <th colspan="2">Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
    </div>
  </div>
</section>
