<?php
    include_once('../setting/koneksi.php');
    $nama = $_SESSION['username'];

    $id3  = $_GET['id'];
    $id4  = base64_decode($id3);
    $chat = mysqli_query($db, "select * from tiket a inner join akun b
      on a.idpengirim = b.username where a.id = '$id4' ");
    while($look = mysqli_fetch_assoc($chat)):
?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Detail Pengirim</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                       <a href="#" class="nav-link">
                      <i class="fa "></i> <?php echo $look['namadepan']; echo ' '. $look['namabelakang'];?>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="fa">Jenis Pesan</i> <?php if ($look['jenis'] = 2){
                            echo "<span class='badge badge-danger'>Tinggi</span>";
                          }else if ($look['jenis'] = 1){
                            echo "<span class='badge badge-success'>Sedang</span>";
                          } else {
                            echo"<span class='badge badge-normal'>Biasa</span>";
                          }
                      ?>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <a href="index.php" class="btn btn-primary btn-block mb-3">Kembali</a>
                    </a>
                  </li>
                  </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h5>Judul : <b><?php echo $look['judul'] ?></b></h5>
                <h6>Dari : <b><?php echo $look['username'] ?></b>
                  <span class="mailbox-read-time float-right"><?php
                  echo date("d/m/Y h:i:s");
                  ?></span></h6>
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p><?php echo $look['isi'] ?></p>
                <p>Terimakasih,<br><?php echo $look['namadepan'] ?></p>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-footer -->
            <div class="card-header">
              <!-- tools box -->
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            
            <div class="card-body">
            <form method="POST" action="../setting/function/balasantiket.php">
              <div class="mb-3">
                <textarea class="textarea" name="jawab"  placeholder="Tulis Balasan Disini"
                 style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $look['jawab'] ?></textarea>
                <input type="hidden" name="id" value="<?php $de= $_GET['id']; echo base64_decode($de); ?>">
              </div>
                <input type="submit" name="perbarui" value="Balas Pesan" class="btn btn-default">
              </form>
            </div>
            
            </div>
          </div>
            <!-- /.card-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
    endwhile;
  ?>