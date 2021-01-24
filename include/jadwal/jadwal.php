<?php 
  $idevent = $_REQUEST['id'];
  if (!isset($idevent)) {
?>
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
                <a href="#revenue-chart" data-toggle="tab">Lihat Data</a>
              </li>
              <li>
                <a href="#sales-chart" data-toggle="tab">Tambah Data</a>
              </li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative;">
                <section class="content">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Jadwal</th>
                              <th>Janis Kegiatan</th>
                              <th>Lokasi Kegiatan</th>
                              <th>Tanggal Mulai</th>
                              <th>Jam Mulai</th>
                              <th>Jam Selesai</th>
                              <th>Pembicara</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              include 'include/koneksi.php';
                              $publish = $_REQUEST['j'];
                              if ($publish == 'publish') {
                                $publish = $_REQUEST['j'];
                              } elseif ($publish == 'draft') {
                                $publish = $_REQUEST['j'];
                              }
                              $sql = "SELECT * FROM jadwal INNER JOIN kegiatan ON jadwal.id_kegiatan = kegiatan.id_kegiatan INNER JOIN lokasi ON jadwal.id_lokasi = lokasi.id_lokasi WHERE status = '$publish' ORDER BY id_jadwal DESC";
                              $query = mysqli_query($db, $sql);
                              $no = 1;
                              while ($ambil = mysqli_fetch_array($query)) {
                                $id = $ambil['id_jadwal'];
                                $nama = $ambil['nama_jadwal'];
                                $nama_kegiatan = $ambil['nama_kegiatan'];
                                $nama_lokasi = $ambil['nama_lokasi'];
                                $tgl1 = $ambil['tgl_mulai'];
                                $jam1 = $ambil['jam_mulai'];
                                $jam2 = $ambil['jam_selesai'];
                                $pembicara = $ambil['pembicara'];
                                $status = $ambil['status'];

                                $tgl = date('d-m-Y');
                            ?>
                            <tr>
                              <td><?php echo $no++; ?></td>
                              <td><?php echo $nama; ?></td>
                              <td><?php echo $nama_kegiatan; ?></td>
                              <td><?php echo $nama_lokasi; ?></td>
                              <td><?php echo $tgl1; ?></td>
                              <td><?php echo $jam1; ?></td>
                              <td><?php echo $jam2; ?></td>
                              <td><?php echo $pembicara; ?></td>
                              <td>
                                <?php
                                  if ($status == 'publish') {
                                    echo "<a class='btn btn-success'>Publish</a>";
                                  } elseif ($status == 'draft') {
                                    echo "<a class='btn btn-warning'>Draft</a>";
                                  }
                                ?>
                              </td>
                              <td>
                                <a href="?page=jadwal/edit.php&p=<?php echo $id; ?>" class="btn btn-primary">Edit</a>
                                <a href="?page=jadwal/del.php&p=<?php echo $id; ?>&j=<?php echo $publish; ?>" class="btn btn-danger">Delete</a>
                              </td>
                            </tr>
                            <?php } ?>
                          </tbody>
                          <tfoot>
                            <tr>
                              <th>No</th>
                              <th>Nama Jadwal</th>
                              <th>Janis Kegiatan</th>
                              <th>Lokasi Kegiatan</th>
                              <th>Tanggal Mulai</th>
                              <th>Jam Mulai</th>
                              <th>Jam Selesai</th>
                              <th>Pembicara</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </tfoot>
                        </table>
                      </div><!-- /.box-body -->
                    </div>
                  </div>
                </section>
              </div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative;">
                <section class="content">
                  <div class="row">
                    <div class="">
                      <div class="col-md-4">
                        <form action="?page=jadwal/proses.php&j=<?php echo $publish; ?>" method="post">
                          <!-- Input Text -->
                          <div class="form-group">
                            <label>Nama Jadwal</label>
                            <input type="text" name="nama" class="form-control">
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
                                <input type="radio" name="jk" value="<?php echo $id_kegiatan; ?>"> <?php echo $nama_kegiatan; ?>
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
                              <input type="date" id="tgl1" name="tgl1" class="form-control pull-right">
                            </div><!-- /.input group -->
                          </div><!-- /.form group -->
                          <div class="form-group">
                            <label>Jam Mulai</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="time" id="time1" name="jam1" class="form-control pull-right">
                            </div><!-- /.input group -->
                            <div id="isi1" style="margin-top: 10px;"></div>
                          </div><!-- /.form group -->
                          <div class="form-group">
                            <label>Jam Selesai</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="time" id="time2" name="jam2" class="form-control pull-right">
                            </div><!-- /.input group -->
                            <div id="isi2" style="margin-top: 10px;"></div>
                          </div><!-- /.form group -->
                          <div class="form-group">
                            <label>Pembicara / Pejabat yang di undang</label>
                            <input type="text" name="pembicara" class="form-control">
                          </div><!-- /.form group -->
                          <div class="form-group">
                            <div class="input-group">
                              <input type="submit" name="tombol" class="btn btn-primary" value="Draft" style="margin-right: 10px;">
                              <input type="submit" name="tombol" class="btn btn-success" value="Publish">
                            </div><!-- /.input group -->
                          </div><!-- /.form group -->
                        </form>
                      </div>
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
<?php } else { ?>
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
                <a href="#revenue-chart" data-toggle="tab">Lihat Data</a>
              </li>
              <li>
                <a href="#sales-chart" data-toggle="tab">Tambah Data</a>
              </li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative;">
                <section class="content">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Jadwal</th>
                              <th>Janis Kegiatan</th>
                              <th>Lokasi Kegiatan</th>
                              <th>Tanggal Mulai</th>
                              <th>Jam Mulai</th>
                              <th>Jam Selesai</th>
                              <th>Pembicara</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              include 'include/koneksi.php';
                              $publish = $_REQUEST['j'];
                              if ($publish == 'publish') {
                                $publish = $_REQUEST['j'];
                              } elseif ($publish == 'draft') {
                                $publish = $_REQUEST['j'];
                              }
                              $sql = "SELECT * FROM jadwal INNER JOIN kegiatan ON jadwal.id_kegiatan = kegiatan.id_kegiatan INNER JOIN lokasi ON jadwal.id_lokasi = lokasi.id_lokasi WHERE status = '$publish' AND id_jadwal = '$idevent' ORDER BY id_jadwal DESC";
                              $query = mysqli_query($db, $sql);
                              $no = 1;
                              while ($ambil = mysqli_fetch_array($query)) {
                                $id = $ambil['id_jadwal'];
                                $nama = $ambil['nama_jadwal'];
                                $nama_kegiatan = $ambil['nama_kegiatan'];
                                $nama_lokasi = $ambil['nama_lokasi'];
                                $tgl1 = $ambil['tgl_mulai'];
                                $jam1 = $ambil['jam_mulai'];
                                $jam2 = $ambil['jam_selesai'];
                                $pembicara = $ambil['pembicara'];
                                $status = $ambil['status'];

                                $tgl = date('d-m-Y');
                            ?>
                            <tr>
                              <td><?php echo $no++; ?></td>
                              <td><?php echo $nama; ?></td>
                              <td><?php echo $nama_kegiatan; ?></td>
                              <td><?php echo $nama_lokasi; ?></td>
                              <td><?php echo $tgl1; ?></td>
                              <td><?php echo $jam1; ?></td>
                              <td><?php echo $jam2; ?></td>
                              <td><?php echo $pembicara; ?></td>
                              <td>
                                <?php
                                  if ($status == 'publish') {
                                    echo "<a class='btn btn-success'>Publish</a>";
                                  } elseif ($status == 'draft') {
                                    echo "<a class='btn btn-warning'>Draft</a>";
                                  }
                                ?>
                              </td>
                              <td>
                                <a href="?page=jadwal/edit.php&p=<?php echo $id; ?>" class="btn btn-primary">Edit</a>
                                <a href="?page=jadwal/del.php&p=<?php echo $id; ?>&j=<?php echo $publish; ?>" class="btn btn-danger">Delete</a>
                              </td>
                            </tr>
                            <?php } ?>
                          </tbody>
                          <tfoot>
                            <tr>
                              <th>No</th>
                              <th>Nama Jadwal</th>
                              <th>Janis Kegiatan</th>
                              <th>Lokasi Kegiatan</th>
                              <th>Tanggal Mulai</th>
                              <th>Jam Mulai</th>
                              <th>Jam Selesai</th>
                              <th>Pembicara</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </tfoot>
                        </table>
                      </div><!-- /.box-body -->
                    </div>
                  </div>
                </section>
              </div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative;">
                <section class="content">
                  <div class="row">
                    <div class="">
                      <div class="col-md-4">
                        <form action="?page=jadwal/proses.php&j=<?php echo $publish; ?>" method="post">
                          <!-- Input Text -->
                          <div class="form-group">
                            <label>Nama Jadwal</label>
                            <input type="text" name="nama" class="form-control">
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
                                <input type="radio" name="jk" value="<?php echo $id_kegiatan; ?>"> <?php echo $nama_kegiatan; ?>
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
                              <input type="date" id="tgl1" name="tgl1" class="form-control pull-right">
                            </div><!-- /.input group -->
                          </div><!-- /.form group -->
                          <div class="form-group">
                            <label>Jam Mulai</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="time" id="time1" name="jam1" class="form-control pull-right">
                            </div><!-- /.input group -->
                            <div id="isi1" style="margin-top: 10px;"></div>
                          </div><!-- /.form group -->
                          <div class="form-group">
                            <label>Jam Selesai</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="time" id="time2" name="jam2" class="form-control pull-right">
                            </div><!-- /.input group -->
                            <div id="isi2" style="margin-top: 10px;"></div>
                          </div><!-- /.form group -->
                          <div class="form-group">
                            <label>Pembicara / Pejabat yang di undang</label>
                            <input type="text" name="pembicara" class="form-control">
                          </div><!-- /.form group -->
                          <div class="form-group">
                            <div class="input-group">
                              <input type="submit" name="tombol" class="btn btn-primary" value="Draft" style="margin-right: 10px;">
                              <input type="submit" name="tombol" class="btn btn-success" value="Publish">
                            </div><!-- /.input group -->
                          </div><!-- /.form group -->
                        </form>
                      </div>
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
<?php } ?>

