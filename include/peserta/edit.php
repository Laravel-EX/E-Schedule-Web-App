
          <div class="row">
            <div class="col-md-12">
              <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">
                    <i class="fa fa-inbox"></i> Pserta
                  </h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                  <div class="nav-tabs-custom">
                    <!-- Tabs within a box -->
                    <ul class="nav nav-tabs pull-left">
                      <li class="active">
                        <a href="#revenue-chart" data-toggle="tab">Edit Data</a>
                      </li>
                    </ul>
                    <div class="tab-content no-padding">
                      <!-- Morris chart - Sales -->
                      <div class="chart tab-pane active" id="revenue-chart" style="position: relative;">
                        <section class="content">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="box-body">
		                          <div class="col-md-4">
		                          	<?php 
		                          		include 'include/koneksi.php';
		                          		$id = $_REQUEST['p'];
	                                    $sql = "SELECT * FROM user INNER JOIN peserta ON user.id_peserta = peserta.id_peserta WHERE user.id_peserta='$id'";
	                                    $query = mysqli_query($db, $sql);
	                                    $no = 1;
                                      	while ($ambil = mysqli_fetch_array($query)) {
	                                        $id_peserta = $ambil['id_peserta'];
	                                        $nama_peserta = $ambil['nama_peserta'];
	                                        $jabatan = $ambil['jabatan'];
                                          $username = $ambil['username'];
                                          $password = $ambil['password'];
		                          	?>
		                            <form action="?page=peserta/proses.php" method="post">
		                              <!-- Input Text -->
		                              <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
	                                  <!-- Input Text -->
	                                  <div class="form-group">
	                                    <label>Nama Lokasi</label>
	                                    <input type="text" name="nama" class="form-control" value="<?php echo $nama_peserta ?>">
	                                  </div><!-- /.form group -->
	                                  <div class="form-group">
	                                    <label>Jabatan</label>
	                                    <input type="text" name="jbt" class="form-control" value="<?php echo $jabatan ?>">
	                                  </div><!-- /.form group -->
                                    <div class="form-group">
                                      <label>Username</label>
                                      <input type="text" name="user" class="form-control" value="<?php echo $username ?>">
                                    </div><!-- /.form group -->
                                    <div class="form-group">
                                      <label>Password Lama</label>
                                      <input type="text" name="pass1" class="form-control" readonly="" value="<?php echo $password ?>">
                                    </div><!-- /.form group -->
                                    <div class="form-group">
                                      <label>Password Baru</label>
                                      <input type="text" name="pass" class="form-control" value="<?php echo $password ?>">
                                    </div><!-- /.form group -->
                                    <div class="form-group">
                                      <h2 id="captcha" align="center"></h2>
                                      <input type="text" name="captcha" id="captcha-compare" class="form-control" placeholder="CAPTCHA.." required="">
                                      <label id="cap1"></label>
                                    </div><!-- /.form group -->
  		                              <div class="form-group">
		                                <div class="input-group">
		                                  <input type="submit" name="tombol" class="btn btn-success tombol" value="Simpan Edit">
                                      <button class="btn btn-primary" onclick="history.back();">
                                        Kembali
                                      </button>
		                                </div><!-- /.input group -->
		                              </div><!-- /.form group -->
		                            </form>
		                            <?php } ?>
		                          </div>
                              </div><!-- /.box-body -->
                            </div>
                          </div>
                        </section>
                      </div>
                    </div>
                  </div><!-- /.nav-tabs-custom -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div><!-- /.row (main row) -->