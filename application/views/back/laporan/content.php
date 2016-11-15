      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Laporan
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">laporan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Main row -->
          <div class="row">
            <div class="col-md-12">
              <?php if ($this->session->flashdata('msg_success')): ?>
                <!-- alert jika sukses simpan -->
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $this->session->flashdata('msg_success'); ?>
                </div>
              <?php endif ?>

              <?php if ($this->session->flashdata('msg_error')): ?>
                <!-- alert jika ada error ketika upload -->
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $this->session->flashdata('msg_error'); ?>
                </div>
              <?php endif ?>

              <!-- alert jika ada form error -->
              <?php echo validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>'); ?>              
            </div>
          </div>             
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12">

              <!-- Chat box -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Laporan Penjualan</h3>
                </div>
                <div class="box-body">
                  <?php echo form_open('admin/laporan/view') ?>
                  <!-- <form class="form-horizontal"> -->
                    <div class="form-group">
                      <label class="control-label col-md-2">Bulan</label>
                      <div class="col-md-3">
                        <select name="bulan" class="form-control">
                        <?php 
                            // $date = new DateTime($pelanggan->tgl_lahir);
                        for($i = 1 ; $i <= 12; $i++) {
                          if (date('m')==$i) {
                              $select='selected';
                            }else{$select='';}

                          $month = date("F",mktime(0,0,0,$i,1,date("Y")));
                                echo "<option value='$i' ".$select.">" .   $month . "</option>";
                        }
                        ?>
                        </select>
                      </div>
                      <label class="control-label col-md-2">Tahun</label>
                      <div class="col-md-3">
                        <select name="tahun" class="form-control">
                        <?php 
                            // $date = new DateTime($pelanggan->tgl_lahir);
                        for($i = 2010 ; $i <= date('Y'); $i++) {
                          if (date('Y')==$i) {
                              $select='selected';
                            }else{$select='';}
                          
                          echo "<option value='$i' ".$select.">" .   $i . "</option>";
                        }
                        ?>
                        </select>
                      </div>
                      <div class="col-md-2">
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i>Lihat</button>
                      </div>
                    </div>
                    <div class="form-group">
                      
                    </div>
                  </form>
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->

              <?php 
              $i=1;
              if (isset($arr_laporan)): ?>  
                <!-- Chat box -->
                <div class="box box-info">
                  <div class="box-header">
                    <i class="fa fa-comments-o"></i>
                    <h3 class="box-title">Laporan Penjualan</h3>
                    <button data-bulan="Juni" data-tahun="2016" class="btn btn-success pull-right" onclick="Popup('#mydiv',this.getAttribute('data-bulan'), this.getAttribute('data-tahun'))"><i class="margin-r-10 fa fa-print"></i>Cetak</button>
                    <button class="btn btn-default pull-right margin-r-10 " id="btnExport" onclick="fnExcelReport();"><i class="margin-r-10 fa fa-file-excel-o"></i>Export xls</button>
                  </div>
                  <div class="box-body">
                    <div id="mydiv">
                      <table align="center" class="table table-bordered" cellpadding="5" border="1" style="border-spacing: 0;border-collapse: collapse;"  id="tableLaporan">
                        <thead>
                        <tr>
                          <th>ID</th>
                          <th>Pelanggan</th>
                          <th>Kota Pengiriman</th>
                          <!-- <th style="width: 135px;">Alamat</th> -->
                          <th>No Resi</th>
                          <th>Jml</th>
                          <th>Pembayaran</th>
                          <th>Status</th>
                          <th>Tgl Pesan</th>
                          <th>Jumlah</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($arr_laporan as $laporan): ?> 
                            <tr>
                                <td>#<?php echo $laporan->id_transaksi; ?></td>
                                <td><?php echo $laporan->nama_lengkap; ?></td>
                                <td><?php echo $laporan->nama_kota; ?></td>
                                <td><?php echo $laporan->no_resi; ?></td>
                                <!-- <td>jl. Kaliurang no 147 rt 12 rw 12 ngaglik sleman yogyakarta 55162 rumah bapak saya</td> -->
                                <td><div class="label label-warning"><?php echo $jml_merch[$i]; ?></div></td>
                                <td>Bank <?php echo $laporan->tranfer_ke; ?></td>
                                <td><div class="label label-success"><?php echo $laporan->status; ?></div></td>
                                <td><?php echo $laporan->tgl_pesan; ?></td>
                                <td><h3 class="title-md pull-right">Rp <?php echo number_format($laporan->total_bayar,2,',','.'); ?></h3></td>
                            </tr>
                          <?php 
                          $i++;
                          endforeach ?>
                          <tr>
                            <td colspan="7"></td>
                            <td>Total</td>
                            <td><h3 class="title-md pull-right">Rp <?php echo number_format($total,2,',','.'); ?></h3></td>
                          </tr>
                        </tbody>
                          
                      </table>
                      <iframe id="txtArea1" style="display:none"></iframe>
                    </div>
                  </div><!-- /.chat -->
                </div><!-- /.box (chat box) -->
              <?php endif ?>


            </section><!-- /.Left col -->

          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->