          <div class="row">
            <div class="col-md-12">
              <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">
                    <i class="fa fa-inbox"></i> User
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
                                      <th>Username</th>
                                      <th>Password</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                      include 'include/koneksi.php';
                                      $sql = "SELECT * FROM user ";
                                      $query = mysqli_query($db, $sql);
                                      $no = 1;
                                      while ($ambil = mysqli_fetch_array($query)) {
                                        $id_user = $ambil['id_user'];
                                        $username = $ambil['username'];
                                        $password = $ambil['password'];
                                        $status = $ambil['status'];
                                    ?>
                                    <tr>
                                      <td><?php echo $no++; ?></td>
                                      <td><?php echo $username; ?></td>
                                      <td><?php echo $password; ?></td>
                                      <td><?php echo $status; ?></td>
                                      <td>
                                        <a href="?page=user/edit.php&p=<?php echo $id_user; ?>" class="btn btn-primary">Edit</a>
                                        <!-- <a href="?page=lokasi/proses.php&p=<?php echo $id_user; ?>&hapus=hapus" class="btn btn-danger">Delete</a> -->
                                      </td>
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                  <tfoot>
                                    <tr>
                                      <th>No</th>
                                      <th>Username</th>
                                      <th>Password</th>
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
                                <form action="?page=user/proses.php" method="post">
                                  <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="user" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" name="pass" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Status</label>
                                    <div class="input-group">
                                      <select class="form-control" name="status">
                                        <option>Pilih Status</option>
                                        <option value="sa">Super Admin</option>
                                        <option value="admin">Admin</option>
                                        <option value="peserta">Peserta</option>
                                      </select>
                                    </div>
                                  </div><!-- /.form-group -->
                                  <div class="form-group">
                                    <div class="input-group">
                                      <input type="submit" name="tombol" class="btn btn-success" value="Simpan">
                                    </div>
                                  </div>
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