<?php foreach ($arr_transaksi as $transaksi): ?>
  
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Pemesanan Detail
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Pemesanan</li>
            <li class="active">Detail Pemesanan</li>
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
            <section class="col-lg-6 col-md-6">

              <!-- Chat box -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">informasi</h3>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-6">
                      <h3>Tanggal Pesan</h3>
                      <?php echo $transaksi->tgl_pesan; ?>
                      <h3>Kode Pos</h3>
                      <?php echo $transaksi->kode_pos; ?>
                    </div>
                    <div class="col-md-6">
                      <h3>Kota Pengiriman</h3>
                      <?php echo $transaksi->nama_kota; ?> <span class="badge bg-green">Rp <?php echo $transaksi->tarif; ?></span>
                      <H3>Alamat</H3>
                      <?php echo $transaksi->alamat; ?>
                    </div>
                  </div>
                </div><!-- /.chat -->
              </div>
              <!-- Chat box -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Status dan Pengiriman</h3>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                      
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr>
                            <td>Status</td>
                            <td>
                              <?php if ($transaksi->status=='pending'): ?>
                              <h3 class="title-sm bg-orange text-center big-label">Pending</h3>
                              <?php elseif($transaksi->status=='terkonfirmasi'): ?>
                              <h3 class="title-sm bg-aqua text-center big-label">Terkonfirmasi</h3>
                              <?php elseif($transaksi->status=='proses'): ?>
                              <h3 class="title-sm bg-blue text-center big-label">Proses</h3>
                              <?php elseif($transaksi->status=='kirim'): ?>
                              <h3 class="title-sm bg-green text-center big-label">Dikirim</h3>
                              <?php endif ?>
                            </td>

                          </tr>
                          <tr>
                            <td>No Resi</td>
                            <td><?php echo $transaksi->no_resi; ?></td>
                          </tr>
                          <?php foreach ($arr_konfirmasi as $konfirmasi): ?>
                          <tr>
                            <td>Tgl Tranfer</td>
                            <td><?php echo $konfirmasi->tgl." ".$konfirmasi->jam; ?></td>
                          </tr>
                          <tr>
                            <td>Metode</td>
                            <td><?php echo $konfirmasi->metode; ?></td>
                          </tr>
                          <tr>
                            <td>Transfer ke</td>
                            <td><?php echo $konfirmasi->tranfer_ke ?></td>
                          </tr>
                          <tr>
                            <td>Jumlah Pengiriman</td>
                            <td><strong>Rp <?php echo number_format($konfirmasi->jml,0,'.','.'); ?></strong></td>
                          </tr>
                          <tr>
                            <td>Bukti Pembayaran</td>
                            <td>
                              <a href="<?php echo base_url('assets/uploads/konfirmasi/'.$konfirmasi->bukti); ?>" target="_blank"><img src="<?php echo base_url('assets/uploads/konfirmasi/'.$konfirmasi->bukti); ?>" class="img-thumbnail thumb_foto"></a></td>
                          </tr>
                          <tr>
                            <td class="bg-navy">Catatan</td>
                            <td class="bg-navy"><?php echo $konfirmasi->catatan; ?></td>
                          </tr>
                          <?php endforeach ?>

                        </tbody>
                      </table>
                      <?php echo form_open('admin/pemesanan/ubah_status',array('class'=>'form')); ?>
                      <!-- <form class="form"> -->
                        <div class="form-group">
                          <label class="control-label">Ubah Status</label>
                          <select name="status" class="form-control">
                            <option value="pending">Pending</option>
                            <option value="terkonfirmasi">terkonfirmasi</option>
                            <option value="proses">proses</option>
                            <option value="kirim">kirim</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <input name="id_transaksi" type="hidden" value="<?php echo $transaksi->id_transaksi; ?>"></input>
                          <input type="submit" class="btn btn-default form-control btn-flat" value="Ubah Status"></input>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <?php echo form_open('admin/pemesanan/ubah_resi',array('class'=>'form')); ?>
                      <!-- <form class="form"> -->
                        <div class="form-group">
                          <label class="control-label">No Resi</label>
                          <input name="no_resi" type="text" class="form-control"></input>
                        </div>
                        <div class="form-group">
                          <input name="id_transaksi" type="hidden" value="<?php echo $transaksi->id_transaksi; ?>"></input>
                          <input type="submit" class="btn btn-default form-control btn-flat" value="Ubah No Resi"></input>
                        </div>
                      </form>
                    </div>
                  </div>
                </div><!-- /.chat -->
              </div>
              
              
              <!-- /.box (chat box) -->
            </section><!-- /.Left col -->

            <!-- Right col -->
            <section class="col-lg-6 col-md-6">

              <!-- box merchandise -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Barang Dipesan</h3>
                </div>
                <div class="box-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Harga Awal</th>
                        <th>harga Jadi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach ($arr_transaksi_detail as $transaksi_detail): ?>  
                        <?php $link_gambar = base_url('assets/uploads/orders/'.$transaksi_detail->gambar); ?>
                      <tr>
                        <td><?php echo $i; $i++; ?></td>
                        <td>BRG<?php echo $transaksi_detail->id_barang; ?></td>
                        <td><?php echo $transaksi_detail->nama_barang; ?></td>
                        <td><?php echo $transaksi_detail->jumlah_barang; ?></td>
                        <td class="text-right">Rp <?php echo number_format($transaksi_detail->harga,2,',','.'); ?></td>
                        <td class="text-right">Rp <?php echo number_format($transaksi_detail->harga_deal,2,',','.'); ?></td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div><!-- /.chat -->
              </div>
              <!-- box merchandise -->
              <!-- Chat box -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Biaya</h3>
                </div>
                <div class="table-responsive no-padding">               
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Total</td>
                        <td><h3 class="pull-right title-md">RP <?php echo number_format($total['sub_total'],2,',','.'); ?></h3></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td >Ongkir</td>
                        <td><h3 class="pull-right title-md">(+)Rp <?php echo number_format($transaksi->tarif,2,',','.'); ?></h3></td>
                      </tr>
                      <tr>
                        <td colspan="2" class="bg-light-blue">Total Bayar</td>
                        <td class="bg-blue"><h3 class="pull-right title-md">Rp <?php echo number_format($total['grand_total'],2,',','.'); ?></h3></td>
                      </tr>
                    </tbody>
                  </table>
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->
              <!-- Chat box -->
            </section><!-- /.Right col -->




          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php endforeach ?>
