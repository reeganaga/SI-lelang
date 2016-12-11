
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Katalog
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Katalog</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        <a style="margin-bottom: 10px" href="<?php echo site_url('admin/bidding'); ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i>Kembali</a>


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
            <section class="col-md-12">

              <!-- Chat box -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Isikan ata barang</h3>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="form-horizontal">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-md-3">Nama Barang</label>
                          <div class="col-md-9">
                            <p class="form-control"><?php echo $barang->nama_barang; ?></p>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">deskripsi</label>
                          <div class="col-md-9">
                            <p class="form-control"><?php echo $barang->deskripsi; ?></p>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">kategori</label>
                          <div class="col-md-9">
                            <?php echo form_dropdown('id_kategori',$arr_kategori,$barang->id_kategori,'class="form-control" disabled') ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Gambar</label>
                          <div class="col-md-9">
                          <img class="img-responsive" src="<?php echo base_url('assets/uploads/barang/'.$barang->gambar); ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Berakhir</label>
                          <div class="col-md-9">
                            <p class="form-control bg-red">
                              <?php $date = date_create($barang->tgl_expired); echo date_format($date,'d F Y - H:i:s'); ?>                            
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-md-3">Jumlah barang</label>
                          <div class="col-md-9">
                            <p class="form-control"><?php echo $barang->jumlah_barang; ?></p>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Berat</label>
                          <div class="col-md-9">
                            <p class="form-control"><?php echo $barang->berat; ?></p>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Tinggi</label>
                          <div class="col-md-9">
                            <p class="form-control"><?php echo $barang->tinggi; ?></p>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">lebar</label>
                          <div class="col-md-9">
                            <p class="form-control"><?php echo $barang->lebar; ?></p>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Panjang</label>
                          <div class="col-md-9">
                            <p class="form-control"><?php echo $barang->panjang; ?></p>
                          </div>
                        </div>  
                        <div class="form-group">
                          <label class="control-label col-md-3">Harga Awal</label>
                          <div class="col-md-9">
                            <p class="form-control bg-yellow">Rp <?php echo number_format($barang->harga,0,'.','.'); ?></p>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Harga Tertinggi</label>
                          <div class="col-md-9">
                            <p class="form-control bg-green">Rp <?php echo number_format($barang->harga_deal,0,'.','.'); ?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->
            </section><!-- /.Left col -->

            <!-- Left col -->
            <section class="col-md-12">

              <!-- Chat box -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Daftar Bidder</h3>
                  <?php if ($barang->status=='open' || $barang->status=='bidding'): ?>
                    <button class="btn btn-danger pull-right" data-target="#deleteUser" data-toggle="modal" data-link="<?php echo base_url('admin/bidding/status/'.$barang->id_barang.'/closed'); ?>"><i class="fa fa-exclamation" ></i> Close</button>
                  <?php endif ?>
                </div>
                <div class="box-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Tanggal Bidding</th>
                        <th>Jumlah Bidding</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($arr_bidder as $bidder): ?>
                        <tr>
                          <td><?php echo $bidder->nama_lengkap; ?></td>
                          <td><?php $date = date_create($bidder->tgl_bidding); echo date_format($date,'d F Y - H:i:s'); ?></td>
                          <td>Rp <?php echo number_format($bidder->jml_bidding,0,'.','.'); ?></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->
            </section><!-- /.Left col -->

            


          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<!-- modal close bidding -->
<!-- <div class="modal fade modal-success" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tutup Bidding</h4>
      </div>
      <div class="modal-body">
        Jika anda menutup bidding ini, maka <b>member</b> dengan nilai <b>bid tertinggi</b> akan menjadi <b>pemenang</b>.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a id="linkDeleteOrnamen" class="btn btn-success">Proses</a>
      </div>
    </div>
  </div>
</div> -->

<div class="modal fade modal-warning" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tutup Bidding</h4>
      </div>
      <div class="modal-body">
        Jika anda menutup bidding ini, maka <b>member</b> dengan nilai <b>bid tertinggi</b> akan menjadi <b>pemenang</b>.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a id="linkDeleteOrnamen" class="btn btn-warning">Tutup Bidding</a>
      </div>
    </div>
  </div>
</div>