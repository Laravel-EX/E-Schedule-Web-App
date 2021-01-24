
          <div class="row">
            <div class="col-md-12">
              <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">
                    <i class="fa fa-inbox"></i> Rekapitulasi Data Laporan
                  </h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                      <div class="col-md-12">
                          <form action="include/laporan/phpfpdf/index.php" method="post" class="form-inline">
                            <!-- Input Text -->
                            <div class="form-group">
                              <label>Start Date</label>
                              <input type="date" name="tgl1" class="form-control" required="">
                            </div><!-- /.form group -->
                              <!-- Input Text -->
                            <div class="form-group">
                              <label>End Date</label>
                              <input type="date" name="tgl2" class="form-control" required="">
                            </div><!-- /.form group -->
                            <div class="form-group">
                              <div class="input-group">
                                <input type="submit" name="tombol" class="btn btn-primary" value="Lihat Laporan">
                              </div><!-- /.input group -->
                            </div><!-- /.form group -->
                            <div class="form-group">
                              <div class="input-group">
                                <input type="submit" name="tombol" class="btn btn-warning" value="Laporan Instansi">
                              </div><!-- /.input group -->
                            </div><!-- /.form group -->
                          </form>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
