<?php   
  include_once("../setting/koneksi.php");
  $nama = $_SESSION['username'];
?>
<!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- /.card -->
            <div class="row">
              <div class="col-md-6">
                <!-- DIRECT CHAT -->
                <div class="card direct-chat direct-chat-warning">
                  <div class="card-header">
                    <h3 class="card-title">Pesan Publik</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts"
                              data-widget="chat-pane-toggle">
                        <i class="fa fa-comments"></i></button>
                      <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages">
                      <!-- Message. Default to the left -->

                      <!-- /.direct-chat-msg -->

                      <!-- Message. Default to the left -->
                      <?php
                        $pesan = mysqli_query($db,"select * from pesan a inner join akun b on a.username
                          = b.username where privacy = 'publik' order by id ");
                        while ($msg = mysqli_fetch_array($pesan)):
                        $isip   = $msg['isi'];
                        $dari   = $msg['idpengirim'];
                        $foton  = $msg['foto'];

                       if($msg['idpengirim'] == $_SESSION['username']){
                      ?>
                        <div class="direct-chat-msg right">
                        <div class="direct-chat-info clearfix">
                          <span class="direct-chat-name float-right"><?php echo $dari ?></span>
                        </div>
                        <!-- /.direct-chat-info -->
                        <img class="direct-chat-img" src="../../img/profil/<?php echo $foto ?>" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                          <?php echo $isip ?>
                        </div>
                      </div>

                      <?php 
                        }
                        else
                        {
                      ?>
                         <div class="direct-chat-msg">
                        <div class="direct-chat-info clearfix">
                          <span class="direct-chat-name float-left"><?php echo $dari ?></span>
                        </div>
                        <img class="direct-chat-img" src="../../img/profil/<?php echo $foton ?>" alt="message user image">
                        <div class="direct-chat-text">
                          <?php echo $isip ?>
                        </div>
                      </div>
                      <?php
                        }
                        endwhile;
                      ?>
                    </div>

                    <!-- /.direct-chat-pane -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <form action="../setting/function/pesanpublik.php" method="post">
                      <div class="input-group">
                        <input type="text" name="isi" placeholder="Tulis Pesan Anda..." class="form-control">
                        <span class="input-group-updown">
                          <a href="javascript:location.reload(true)"><i class="fa fa-refresh attachment" aria-hidden="true"></i></a>
                          <input type="submit" name="kirim" value="Kirim" class="btn btn-warning">
                        </span>
                      </div>
                    </form>
                  </div>
                  <!-- /.card-footer-->
                </div>
                <!--/.direct-chat -->
              </div>
              <!-- /.col -->

              <div class="col-md-6">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Member Terbaru</h3>

                    <div class="card-tools">
                      <span class="badge badge-danger">Terakhir Daftar</span>
                      <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                      <?php 
                        $last = mysqli_Query($db,"select * from user a inner join akun b 
                          on a.username = b.username where a.username != '$nama' order by id desc limit 8");
                        while($view = mysqli_Fetch_array($last)):
                      ?>
                      <li>
                        <img src="../../img/profil/<?php echo $view['foto'] ?>" alt="User Image">
                        <a class="users-list-name" href="#"><?php echo $view['namadepan'] ?></a>
                      </li>
                      <?php
                       endwhile;
                      ?>
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Tiket User</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Dari</th>
                      <th>Status</th>
                      <th>Judul</th>
                      <th colspan="2">Aksi</th>
                      <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                      $table = mysqli_query($db,"select * from tiket a inner join akun b
                      on a.idpengirim = b.username  order by id desc");
                      while($liat = mysqli_Fetch_array($table)):
                      $id  = $liat['id'];
                      $id2 = base64_encode($id);
                    ?>
                    <tr>
                      <td><?php echo $liat['id'] ?></td>
                      <td><?php echo $liat['namadepan'] ?></td>
                      <td>
                        <?php
                          $stat = $liat['jenis'];
                          if ($stat = 2){
                            echo "<span class='badge badge-danger'>Tinggi</span>";
                          }else if ($stat = 1){
                            echo "<span class='badge badge-success'>Sedang</span>";
                          } else {
                            echo"<span class='badge badge-normal'>Biasa</span>";
                          }
                        ?>
                      </td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo $liat['judul'] ?></div>
                      </td>
                      <td>
                        <a href="index.php?menu=lihatpesan&id=<?php echo $id2 ?>">
                        <?php 
                        if($liat['jawab'] == ''){echo "<button type='button'
                         class='btn btn-success'><i class='fa fa-comment-o'></i></button>";}else{echo "<button type='button'
                         class='btn btn-success'><i class='fa fa-edit'></i></button>";}
                         ?>
                          
                        </a>
                        <a href="index.php?menu=hapuspesan&id=<?php echo $id2 ?>">
                          <button type="button" class="btn btn-danger"><i class='fa fa-trash'></i></button>
                        </a>
                      </td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20"><?php 
                        if($liat['jawab'] == ''){echo "<button type='button'
                         class='btn btn-danger'>Belum Terjawab</button>";}else{echo "<button type='button'
                         class='btn btn-success'>Terjawab</button>";}
                         ?>
                         </div>
                      </td>
                    </tr>
                    <?php
                      endwhile;
                    ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-4">
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fa fa-heart-o"></i></span>
              <?php
                $jumlov = mysqli_Query($db,"select * from love");
                $love   = $jumlov->num_rows;
              ?>
              <div class="info-box-content">
                <span class="info-box-text">Jumlah Love</span>
                <span class="info-box-number"><?php echo $love ?> Love</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="fa fa-credit-card"></i></span>
              <?php
                $ti  = mysqli_Query($db,"select * from tiket");
                $ket = $ti->num_rows;
              ?>
              <div class="info-box-content">
                <span class="info-box-text">Tiket</span>
                <span class="info-box-number"><?php echo $ket ?> Tiket</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="fa fa-comment-o"></i></span>

              <div class="info-box-content">
              <?php
                $pesan = mysqli_Query($db,"select * from pesan");
                $jpesan= $pesan->num_rows;
              ?>
                <span class="info-box-text">Jumlah Pesan</span>
                <span class="info-box-number"><?php echo $jpesan ?> Pesan</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

            <!-- /.card -->

            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">User Online</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  <?php
                    $populer = mysqli_Query($db,"select * from user a inner join akun b
                      on a.username = b.username where a.online = 1 limit 5");
                    while($pop = mysqli_Fetch_array($populer)):
                      $usernn = $pop['username'];
                  ?>

                  <li class="item">
                    <div class="product-img">
                      <img src="../../img/profil/<?php echo $pop['foto'] ?>" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title"><?php echo $usernn ?>
                        <span class="badge badge-warning float-right"><?php echo $pop['status'] ?></span></a>
                      <span class="product-description">
                       <?php echo $pop['bio'] ?>
                      </span>
                    </div>
                  </li>
                  <!-- /.item -->
                  <?php 
                    endwhile;
                  ?>
                </ul>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->