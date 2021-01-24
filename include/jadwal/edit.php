
          <div class="row">
            <div class="col-md-12">
              <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">
                    <i class="fa fa-inbox"></i> Jadwal
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
		                          		$dql = "SELECT * FROM jadwal INNER JOIN kegiatan ON jadwal.id_kegiatan = kegiatan.id_kegiatan INNER JOIN lokasi ON jadwal.id_lokasi = lokasi.id_lokasi WHERE jadwal.id_jadwal='$id' ";
		                          		$rek = mysqli_query($db, $dql);
		                          		while ($cek = mysqli_fetch_array($rek)) {
                                        $id = $cek['id_jadwal'];
                                        $nama = $cek['nama_jadwal'];
                                        $nama_kegiatan = $cek['nama_kegiatan'];
                                        $nama_lokasi = $cek['nama_lokasi'];
                                        $tgl1 = $cek['tgl_mulai'];
                                        $jam1 = $cek['jam_mulai'];
                                        $jam2 = $cek['jam_selesai'];
                                        $pembicara = $cek['pembicara'];
                                        $status = $cek['status'];
		                          	?>
		                            <form action="?page=jadwal/pro_edit.php" method="post">
		                              <!-- Input Text -->
		                              <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
 									  <!-- Input Text -->
	                                  <div class="form-group">
	                                    <label>Nama Jadwal</label>
	                                    <input type="text" name="nama" class="form-control" value="<?php echo $nama ?>">
	                                  </div><!-- /.form group -->
                                    <div class="form-group">
                                      <label>Peserta</label>
                                      <div class="input-group">
                                        <select class="form-control" name="peserta">
                                          <option>Pilih Peserta</option>
                                          <?php
                                            include 'include/koneksi.php';
                                            $peserta1 = "SELECT * FROM peserta";
                                            $pes = mysqli_query($db, $peserta1);
                                            while ($erta = mysqli_fetch_array($pes)) {
                                              $id_peserta = $erta['id_peserta'];
                                              $nama_peserta = $erta['nama_peserta'];
                                          ?>
                                          <option value="<?php echo $id_peserta ?>"><?php echo $nama_peserta ?></option>
                                          <?php } ?>
                                        </select>
                                      </div>
                                    </div><!-- /.form-group -->
	                                  <!-- Date Picker -->
	                                  <div class="form-group">
	                                    <label>Jenis Kegiatan</label>
	                                    <div class="input-group">
	                                      <?php
	                                        include 'include/koneksi.php';
	                                        $giat = "SELECT * FROM kegiatan";
	                                        $tan = mysqli_query($db, $giat);
	                                        while ($ke = mysqli_fetch_array($tan)) {
	                                          $id_kegiatan = $ke['id_kegiatan'];
	                                          $nama_kegiatan = $ke['nama_kegiatan'];
	                                      ?>
	                                        <input type="radio" name="jk" checked="" value="<?php echo $id_kegiatan; ?>"> <?php echo $nama_kegiatan; ?>
	                                      <?php } ?>
	                                    </div>
	                                  </div><!-- /.form-group -->
	                                  <div class="form-group">
	                                    <label>Lokasi Kegiatan</label>
	                                    <div class="input-group">
	                                      <select class="form-control" name="lokasi">
	                                        <option>Pilih Lokasi Kegiatan</option>
	                                        <?php
	                                          include 'include/koneksi.php';
	                                          $lokasi = "SELECT * FROM lokasi";
	                                          $dek = mysqli_query($db, $lokasi);
	                                          while ($ket = mysqli_fetch_array($dek)) {
	                                            $id_lokasi = $ket['id_lokasi'];
	                                            $nama_lokasi = $ket['nama_lokasi'];
	                                        ?>
	                                        <option value="<?php echo $id_lokasi ?>"><?php echo $nama_lokasi ?></option>
	                                        <?php } ?>
	                                      </select>
	                                    </div>
	                                  </div><!-- /.form-group -->
	                                  <div class="form-group">
	                                    <label>Tanggal Mulai</label>
	                                    <div class="input-group">
	                                      <div class="input-group-addon">
	                                        <i class="fa fa-calendar"></i>
	                                      </div>
	                                      <input type="date" name="tgl1" value="<?php echo $tgl1; ?>" class="form-control pull-right">
	                                    </div><!-- /.input group -->
	                                  </div><!-- /.form group -->
	                                  <div class="form-group">
	                                    <label>Jam Mulai</label>
	                                    <div class="input-group">
	                                      <div class="input-group-addon">
	                                        <i class="fa fa-calendar"></i>
	                                      </div>
	                                      <input type="time" name="jam1" value="<?php echo $jam1; ?>" class="form-control pull-right">
	                                    </div><!-- /.input group -->
	                                  </div><!-- /.form group -->
	                                  <div class="form-group">
	                                    <label>Jam Selesai</label>
	                                    <div class="input-group">
	                                      <div class="input-group-addon">
	                                        <i class="fa fa-calendar"></i>
	                                      </div>
	                                      <input type="time" name="jam2" value="<?php echo $jam2; ?>" class="form-control pull-right">
	                                    </div><!-- /.input group -->
	                                  </div><!-- /.form group -->
	                                  <div class="form-group">
	                                    <label>Pembicara / Pejabat yang di undang</label>
	                                    <input type="text" name="pembicara" value="<?php echo $pembicara; ?>" class="form-control">
	                                  </div><!-- /.form group -->
	                                  <div class="form-group">
	                                    <div class="input-group">
	                                      <input type="submit" name="tombol" class="btn btn-primary" value="Draft" style="margin-right: 10px;">
	                                      <input type="submit" name="tombol" class="btn btn-success" value="Publish">
	                                    </div><!-- /.input group -->
	                                  </div><!-- /.form group -->
		                            </form>
                                      <button class="btn btn-warning" onclick="history.back()" >
                                      	Kembali
                                      </button>
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
