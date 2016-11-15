      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Pemesanan
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Pemesanan</li>
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
                  <h3 class="box-title">Daftar Pemesanan</h3>
                </div>
                <div class="box-body">
                  <table id="tablePemesanan" class="table table-bordered table-hover" >
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Kota Pengiriman</th>
                      <th>Pelanggan</th>
                      <th>Jumlah</th>
                      <th>Pembayaran</th>
                      <th>Status</th>
                      <th>Tgl Pesan</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($arr_transaksi as $transaksi): ?>
                      <tr>
                          <td>#<?php echo $transaksi->id_transaksi; ?></td>
                          <td><?php echo $transaksi->nama_kota; ?></td>
                          <td><?php echo $transaksi->nama_lengkap; ?></td>
                          <td><div class="label label-success">Rp <?php echo number_format($transaksi->total_bayar,2,',','.'); ?></div></td>
                          <td>Bank <?php echo $transaksi->tranfer_ke; ?></td>
                          <td>
                            <?php if ($transaksi->status=='pending'): ?>
                            <div class="label label-warning">Pending</div>
                            <?php elseif($transaksi->status=='terkonfirmasi'): ?>
                            <div class="label label-info">Terkonfirmasi</div>
                            <?php elseif($transaksi->status=='proses'): ?>
                            <div class="label label-primary">Proses</div>
                            <?php elseif($transaksi->status=='kirim'): ?>
                            <div class="label label-success">Dikirim</div>
                            <?php endif ?>
                          </td>
                          <td><?php echo $transaksi->tgl_pesan; ?></td>
                          <td>
                            <a href="<?php echo base_url('admin/pemesanan/detail/'.$transaksi->id_transaksi); ?>" class="btn btn-default"><i class="fa fa-search-plus"></i>Lihat</a>
                            <button class="btn btn-default" type="button" data-toggle="modal" data-target="#deleteModal" data-link="pemesanan/hapus/<?php echo $transaksi->id_transaksi; ?>"><i class="fa fa-trash"></i>Hapus</button>
                          </td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                      
                  </table>
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->
            </section><!-- /.Left col -->

              <!-- Modal -->


              <div class="modal fade modal-danger" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Hapus Transaksi</h4>
                    </div>
                    <div class="modal-body">
                      Apakah anda ingin menghapus Transaksi ini ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <a id="linkDelete" class="btn btn-danger">Hapus</a>
                    </div>
                  </div>
                </div>
              </div>
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->