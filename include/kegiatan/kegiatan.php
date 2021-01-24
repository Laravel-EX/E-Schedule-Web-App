
          <div class="row">
            <div class="col-md-12">
              <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">
                    <i class="fa fa-inbox"></i> Kegiatan
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
                                      <th>Nama Kegiatan</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                      include 'include/koneksi.php';
                                      $sql = "SELECT * FROM kegiatan ";
                                      $query = mysqli_query($db, $sql);
                                      $no = 1;
                                      while ($ambil = mysqli_fetch_array($query)) {
                                        $id_kegiatan = $ambil['id_kegiatan'];
                                        $nama_kegiatan = $ambil['nama_kegiatan'];
                                    ?>
                                    <tr>
                                      <td><?php echo $no++; ?></td>
                                      <td><?php echo $nama_kegiatan; ?></td>
                                      <td>
                                        <a href="?page=kegiatan/edit.php&p=<?php echo $id_kegiatan; ?>" class="btn btn-primary">Edit</a>
                                        <a href="?page=kegiatan/proses.php&p=<?php echo $id_kegiatan; ?>&hapus=hapus" class="btn btn-danger">Delete</a>
                                      </td>
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                  <tfoot>
                                    <tr>
                                      <th>No</th>
                                      <th>Nama Kegiatan</th>
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
                                <form action="?page=kegiatan/proses.php" method="post">
                                  <!-- Input Text -->
                                  <div class="form-group">
                                    <label>Nama Kegiatan</label>
                                    <input type="text" name="nake" class="form-control">
                                  </div><!-- /.form group -->
                                  <div class="form-group">
                                    <div class="input-group">
                                      <input type="submit" name="tombol" class="btn btn-success" value="Simpan">
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