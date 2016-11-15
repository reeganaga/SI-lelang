      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Sekilas info</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Main row -->
          <div class="row">
            <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12">
              <div class="info-box ">
                <span class="info-box-icon bg-blue"><i class="fa fa-shopping-cart"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Transaksi hari ini</span>
                  <span class="info-box-number"><?php echo $widget['transaksi_today']; ?></span>
                <a href="#">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12">
              <div class="info-box ">
                <span class="info-box-icon bg-orange"><i class="fa fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Jumlah pelanggan</span>
                  <span class="info-box-number"><?php echo $widget['jml_pelanggan']; ?></span>
                <a href="#">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12">
              <div class="info-box ">
                <span class="info-box-icon bg-green"><i class="fa fa-dollar"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">transaksi Bulan Ini</span>
                  <span class="info-box-number">Rp <?php echo number_format($widget['transaksi_per_month'],2,'.',','); ?></span>
                <a href="#">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12">
              <div class="info-box ">
                <span class="info-box-icon bg-aqua"><i class="fa fa-file-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Konfirmasi</span>
                  <span class="info-box-number"><?php echo $widget['total_konfirmasi']; ?></span>
                <a href="#">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row (main row) -->

          <!-- Main row -->
          <div class="row">
            <div class="col-md-12">
              <!-- box chart -->
              <div class="box box-solid">
                <div class="box-header">
                  <!-- tools box -->
                  <!-- <div class="pull-right box-tools">
                    <button class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range"><i class="fa fa-calendar"></i></button>
                    <button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                  </div> --><!-- /. tools -->

                  <i class="fa fa-shopping-cart"></i>
                  <h3 class="box-title">
                    Grafik Pendapatan per Bulan 
                  </h3>
                </div>
                <div class="box-body">
                  <!-- <div id="world-map" style="height: 250px; width: 100%;"></div> -->
                  <div id="chart_month"></div>
                </div><!-- /.box-body-->
              </div>
              <!-- box chart -->
            </div>
          </div><!-- /.row (main row) -->
        </section><!-- /.content -->

      </div><!-- /.content-wrapper -->