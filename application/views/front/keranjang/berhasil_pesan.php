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
              <h3 class="title-v2">Ringkasan transaksi</h3>
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

            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <p class="text-theme">
                Berikut adalah Ringkasan Pemesanan anda
              </p>
              <?php if ($transaksi): ?>
                  <p class="text-theme">
                    <h3 class="text-theme title-xs hr-before">Kode Pemesanan</h3>
                    <p class="text-theme">#<?php echo $transaksi->id_transaksi; ?></p>
                    <h3 class="text-theme title-xs hr-before">Alamat Pengiriman</h3>
                    <p class="text-theme"><?php echo $transaksi->alamat_kirim; ?></p>
                    <h3 class="text-theme title-xs hr-before">Kota Pengiriman</h3>
                    <p class="text-theme"><?php echo $transaksi->nama_kota." ( Rp ".$transaksi->tarif.",- ) "; ?></p>
                    <h3 class="text-theme title-xs hr-before">Total bayar</h3>
                    <p class="text-theme"><a href="#grand_total">Rp <?php echo $transaksi->total_bayar; ?></a></p>
                    <h3 class="text-theme title-xs hr-before">Tranfer ke</h3>
                    <p class="text-theme">
                      <strong style="text-transform: uppercase;"><?php echo $transaksi->tranfer_ke; ?></strong>
                    </p>
                    <h3 class="text-theme title-xs hr-before">Status</h3>
                    <p class="tex-theme"><b class="label label-warning"><?php echo $transaksi->status; ?></b></p>
                  </p>
                  <?php 
                    $ongkir = $transaksi->tarif; 
                    $grand_total = $transaksi->total_bayar+$ongkir;
                  ?>
              <?php endif ?>
            </div>
            <div class="col-md-6">
              <div class="panel panel-success">
                <div class="panel-heading">
                  <h3 class="panel-title">Info Pembayaran</h3>
                </div>
                <div class="panel-body">Segera lakukan Tranfer ke salah satu rekening berikut sesuai dengan <strong>Total bayar</strong> dibawah:
                  <ol>
                    <li>BNI (2214522) a.n Budi Prakoso</li>
                    <li>Mandiri (1000000541275) a.n Budi Prakoso</li>
                  </ol>
                  Lalu segera lakukan <a href="<?php echo site_url('member/konfirmasi') ?>" target="_blank">konfirmasi</a> agar pemesanan cepat diproses. Terimakasih
                </div>
              </div>              
            </div>
          </div>
          <div class="row">
            <?php if ($arr_transaksi_detail): ?>
                <div class="col-md-12">
                  <h3 class="title-sm text-theme hr-before">Daftar Barang</h3>
                  <table class="table table-bordered">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Kode</th>
                              <th>Nama</th>
                              <th>Jumlah</th>
                              <th>Harga Jadi</th>
                              <th>Total</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; ?>
                        <?php foreach ($arr_transaksi_detail as $transaksi_detail): ?>
                          <tr>
                              <td><?php echo $no;$no++; ?></td>
                              <td>BRG<?php echo $transaksi_detail->id_barang; ?></td>
                              <td><?php echo $transaksi_detail->nama_barang; ?></td>
                              <td><?php echo $transaksi_detail->jumlah_barang; ?></td>
                              <td><?php echo $transaksi_detail->harga_deal; ?></td>
                              <td class="text-right"><h3 class="text-theme title-md"><strong>Rp <?php echo number_format($transaksi_detail->harga_deal,2,'.',','); ?></strong></h3></td>
                          </tr>
                        <?php endforeach ?>

                          
                          <tr>
                            <td colspan="4"></td>
                            <td class="btn-sea">Total</td>
                            <td class="btn-sea text-right"><h3 class=" text-theme title-md">
                              <strong>Rp <?php echo number_format($transaksi->total_bayar,2,'.',','); ?></strong></h3>
                            </td>
                          </tr>
                          <tr>
                            <td colspan="4"></td>
                            <td>Ongkir</td>
                            <td class="text-right"><h3 class="text-theme title-md"><strong>(+) Rp <?php echo number_format($ongkir,2,'.',','); ?></strong></h3></td>
                          </tr>
                          <tr>
                            <td colspan="4"></td>
                            <td class="btn-green">Total Bayar</td>
                            <td class="btn-green text-right" ><h3 class="text-theme title-md">
                                <strong>Rp <?php echo number_format($grand_total,2,'.',',') ?></strong>
                            </h3></td>
                          </tr>
                      </tbody>
                  </table>
                </div>
            <?php endif ?>
                
          </div>
          <hr class="hr-divider-ghost">
        </div>


      </div>
    </div>
<!-- END SECTION KONTEN -->

 