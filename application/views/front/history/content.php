    <!-- SECTION Judul-->
    <!--===============================================================-->
    <div class="section-heading-page">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="heading-page text-center-xs">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb text-right text-center-xs">
              <li>
                <a href="#">Home</a>
              </li>
              <li class="active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

<!-- SECTION KONTEN -->
    <div class="container">
      <div class="row">
        <!-- SIDE NAV -->
        <!--===============================================================-->
        <?php $this->load->view('front/template/menu_member'); ?>
        <!-- END SIDE NAV -->

        <!-- CONTENT COLUMN -->
        <!--===============================================================-->
          
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-12">
              <h3 class="title-v2">Seluruh Transaksi anda</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">

              <?php if ($this->session->flashdata('msg_success')): ?>
              <!-- alert jika sukses simpan -->
              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('msg_success'); ?>
              </div>
              <?php endif ?>

              <?php if ($this->session->flashdata('msg_error_upload')): ?>
              <!-- alert jika ada error ketika upload -->
              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('msg_error_upload'); ?>
              </div>
              <?php endif ?>

              <!-- alert jika ada form error -->
              <?php echo validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>'); ?>

            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-success">
                  <div class="panel-heading">
                      <h3 class="panel-title">Info Pembayaran</h3>
                  </div>
                  <div class="panel-body">Segera lakukan Tranfer ke salah satu rekening berikut sesuai dengan <strong>Total bayar</strong> dibawah:
                      <ol>
                          <li>BNI (2214522) a.n Budi Prakoso</li>
                          <li>Mandiri (1000000541275) a.n Budi Prakoso</li>
                      </ol>
                      Lalu segera lakukan <a href="<?php echo site_url('member/konfirmasi'); ?>" target="_blank">konfirmasi</a> agar pemesanan cepat diproses. Terimakasih
                  </div>
              </div>              
            </div>
          </div>          
          <div class="row">
            <div class="col-md-12">
              <table class="table table-striped" id="table-history">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Tgl Pesan</th>
                          <th>Status</th>
                          <th>Total Bayar</th>
                          <th>Resi</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php if ($arr_transaksi): ?>
                      <?php foreach ($arr_transaksi as $transaksi): ?>
                        <tr>
                            <td>#<?php echo $transaksi->id_transaksi; ?></td>
                            <td><?php 
                              $date = new DateTime($transaksi->tgl_pesan);
                              echo $date->format('d F Y H:i'); ?>
                            </td>
                            <td>
                              <?php if ($transaksi->status == 'pending'): ?>
                                <div class="label label-warning">Pending</div>
                              <?php elseif ($transaksi->status == 'terkonfirmasi'): ?>
                                <div class="label label-info">Terkonfirmasi</div>
                              <?php elseif ($transaksi->status == 'proses'): ?>
                                <div class="label label-primary">Sedang Diproses</div>
                              <?php elseif ($transaksi->status == 'kirim'): ?>
                                <div class="label label-success">Dikirim</div>
                              <?php endif ?>
                            </td>
                            <td>Rp <?php echo number_format($transaksi->total_bayar,2,'.',','); ?></td>
                            <td><?php echo $transaksi->no_resi; ?></td>
                            <td>
                              <?php if ($transaksi->status == 'pending'): ?>
                              <a href="<?php echo site_url('member/konfirmasi'); ?>" class="btn btn-rounded btn-red" title="Hapus"><i class="fa fa-pencil-square-o "></i>Konfirmasi</a>
                              <?php endif ?>
                              <a href="<?php echo site_url('member/history/detail/'.$transaksi->id_transaksi); ?>" class="btn btn-rounded btn-green" title="Lihat"><i class="fa fa-eye"></i>Lihat</a>
                            </td>
                        </tr>
                      <?php endforeach ?>
                    <?php endif ?>
                        
                      <!-- <tr>
                          <td>1</td>
                          <td>2 Juli 2016</td>
                          <td><div class="label label-info">Dikonfirmasi</div></td>
                          <td>100000</td>
                          <td>HHAA7UJ2SJJ</td>
                          <td>
                            <a href="konfirmasi" class="btn btn-rounded btn-red" title="Hapus"><i class="fa fa-pencil-square-o "></i>Konfirmasi</a>
                            <a href="detail-pesan.html" class="btn btn-rounded btn-green" title="Lihat"><i class="fa fa-eye"></i>Lihat</a>
                          </td>
                      </tr>
                      <tr>
                          <td>1</td>
                          <td>2 Juli 2016</td>
                          <td><div class="label label-primary">Proses</div></td>
                          <td>100000</td>
                          <td>HHAA7UJ2SJJ</td>
                          <td>
                            <a href="konfirmasi" class="btn btn-rounded btn-red" title="Hapus"><i class="fa fa-pencil-square-o "></i>Konfirmasi</a>
                            <a href="detail-pesan.html" class="btn btn-rounded btn-green" title="Lihat"><i class="fa fa-eye"></i>Lihat</a>
                          </td>
                      </tr>
                      <tr>
                          <td>1</td>
                          <td>2 Juli 2016</td>
                          <td><div class="label label-success">Dikirim</div></td>
                          <td>100000</td>
                          <td>HHAA7UJ2SJJ</td>
                          <td>
                            <a href="konfirmasi" class="btn btn-rounded btn-red" title="Hapus"><i class="fa fa-pencil-square-o "></i>Konfirmasi</a>
                            <a href="detail-pesan.html" class="btn btn-rounded btn-green" title="Lihat"><i class="fa fa-eye"></i>Lihat</a>
                          </td> -->
                      </tr>
                  </tbody>
              </table>

            </div>
          </div>
          <hr class="hr-divider-ghost">
        </div>


      </div>
    </div>



<!-- modal konfirmasi hapus -->
<div class="modal fade" id="deleteKeranjang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h4>
      </div>
      <div class="modal-body">
        Apa Anda yakin akan menghapus Pesanan ini ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <a class="btn btn-primary">Hapus</a>
        
      </div>
    </div>
  </div>
</div>  