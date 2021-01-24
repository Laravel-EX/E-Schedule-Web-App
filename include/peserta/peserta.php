
          <div class="row">
            <div class="col-md-12">
              <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">
                    <i class="fa fa-inbox"></i> Peserta
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
                                      <th>Nama Peserta</th>
                                      <th>Jabatan</th>
                                      <th>Username</th>
                                      <th>Password</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      include 'include/koneksi.php';
                                      $sql = "SELECT * FROM peserta";
                                      $query = mysqli_query($db, $sql);
                                      $no = 1;
                                      while ($ambil = mysqli_fetch_array($query)) {
                                        $id_peserta = $ambil['id_peserta'];
                                        $nama_peserta = $ambil['nama_peserta'];
                                        $jabatan = $ambil['jabatan'];
                                    ?>
                                    <tr>
                                      <td><?php echo $no++; ?></td>
                                      <td><?php echo $nama_peserta; ?></td>
                                      <td><?php echo $jabatan; ?></td>
                                      <td><?php echo $username; ?></td>
                                      <td>******</td>
                                      <td>
                                        <a href="?page=peserta/edit.php&p=<?php echo $id_peserta; ?>" class="btn btn-primary">Edit</a>
                                        <a href="?page=peserta/proses.php&p=<?php echo $id_peserta; ?>&hapus=hapus" class="btn btn-danger">Delete</a>
                                      </td>
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                  <tfoot>
                                    <tr>
                                      <th>No</th>
                                      <th>Nama Peserta</th>
                                      <th>Jabatan</th>
                                      <th>Username</th>
                                      <th>Password</th>
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
                                <form action="?page=peserta/proses.php" method="post" id="cek-form">
                                  <!-- Input Text -->
                                  <div class="form-group">
                                    <label>Nama Peserta</label>
                                    <input type="text" name="nama" class="form-control">
                                  </div><!-- /.form group -->
                                  <div class="form-group">
                                    <label>Jabatan</label>
                                    <input type="text" name="jbt" class="form-control">
                                  </div><!-- /.form group -->
                                  <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="user" class="form-control">
                                  </div><!-- /.form group -->
                                  <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="pass" class="form-control">
                                  </div><!-- /.form group -->
                                  <div class="form-group">
                                    <h2 id="captcha" align="center"></h2>
                                    <input type="text" name="captcha" id="captcha-compare" class="form-control" placeholder="CAPTCHA.." required="">
                                    <label id="cap1"></label>
                                  </div><!-- /.form group -->
                                  <div class="form-group">
                                    <div class="input-group">
                                      <input type="submit" name="tombol" class="btn btn-success tombol" value="Simpan">
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
