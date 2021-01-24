
          <div class="row">
            <div class="col-md-12">
              <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">
                    <i class="fa fa-inbox"></i> Lokasi
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
	                                    $sql = "SELECT * FROM lokasi WHERE id_lokasi='$id'";
	                                    $query = mysqli_query($db, $sql);
	                                    $no = 1;
	                                    while ($ambil = mysqli_fetch_array($query)) {
	                                        $id_lokasi = $ambil['id_lokasi'];
	                                        $nama_lokasi = $ambil['nama_lokasi'];
	                                        $lat = $ambil['lat'];
	                                        $long = $ambil['lang'];
		                          	?>
		                            <form action="?page=lokasi/proses.php" method="post">
		                              <!-- Input Text -->
		                              <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
	                                  <!-- Input Text -->
	                                  <div class="form-group">
	                                    <label>Nama Lokasi</label>
	                                    <input type="text" name="nama" class="form-control" value="<?php echo $nama_lokasi ?>">
	                                  </div><!-- /.form group -->
		                              <div class="form-group">
		                                <div class="input-group">
		                                  <input type="submit" name="tombol" class="btn btn-success" value="Simpan Edit">
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