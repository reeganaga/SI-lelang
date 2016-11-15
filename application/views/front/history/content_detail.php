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
              <h3 class="title-v2">Transaksi anda</h3>
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
              <?php foreach ($arr_transaksi as $transaksi): ?>
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Informasi Pemesanan</h3>
                  </div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-md-6">
                        <h3 class="text-theme title-sm hr-before">Tanggal Pesan</h3>
                        <p class="text-theme">
                          <?php 
                          $date = new DateTime($transaksi->tgl_pesan);
                          echo $date->format('d F Y H:i'); ?>
                        </p>
                        <h3 class="text-theme title-md hr-left">Biaya</h3>
                        <table class="table table-bordered">
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
                              <td><h3 class="text-right text-theme title-md">Rp <?php echo number_format($total['sub_total'],2,'.',','); ?></h3></td>
                            </tr>
                            <tr>
                              <td colspan="2" class="btn-sea text-right">Sub Total</td>
                              <td class="btn-sea"><h3 class=" text-right text-theme title-md">
                                Rp <?php echo number_format($total['sub_total'],2,'.',','); ?>
                              </h3></td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>Ongkir</td>
                              <td><h3 class="text-right text-theme title-md">
                                Rp <?php echo number_format($transaksi->tarif,2,'.',','); ?>
                                </h3>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2" class="btn-green text-right">Total Bayar</td>
                              <td class="btn-green"><h3 class=" text-right text-theme title-md">Rp <?php echo number_format($total['grand_total'],2,'.',','); ?></h3></td>
                            </tr>
                          </tbody>
                        </table>                      
                      </div>
                      <div class="col-md-6">
                        <h3 class="text-theme title-sm hr-before">Status</h3>
                        <p class="text-theme">
                          <?php if ($transaksi->status=='pending'): ?>
                            <div class="label label-warning">Pending</div>
                            <small><a href="<?php echo site_url('member/konfirmasi') ?>">Silahkan Konfirmasi</a></small>
                          <?php elseif($transaksi->status=='terkonfirmasi'): ?>
                            <div class="label label-info">Terkonfirmasi</div>
                          <?php elseif($transaksi->status=='proses'): ?>
                            <div class="label label-primary">Sedang Diproses</div>
                          <?php elseif($transaksi->status=='kirim'): ?>
                            <div class="label label-success">Dikirim</div>
                          <?php endif ?>
                        </p>
                        <h3 class="text-theme title-sm hr-before">No Resi</h3>
                        <p class="text-theme">
                          <?php if (empty($transaksi->no_resi)): ?>
                            -
                           <?php else: ?> 
                            <?php echo $transaksi->no_resi; ?>
                          <?php endif ?>
                        </p>
                        <h3 class="text-theme title-sm hr-before">Dikirim ke</h3>
                        <p class="text-theme"><?php echo $transaksi->alamat_kirim; ?></p>
                        <h3 class="text-theme title-sm hr-before">Kota Tujuan</h3>
                        <p class="text-theme"><?php echo $transaksi->nama_kota; ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach ?>
                
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">Informasi barang yang dipesan</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                      <div class="col-md-12">
                        <table class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Kode</th>
                              <th>Nama</th>
                              <th>Jumlah</th>
                              <th>Harga</th>
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
                              <td><?php echo $transaksi_detail->jumlah; ?></td>
                              <td>Rp <?php echo number_format($transaksi_detail->harga,2,'.',','); ?></td>
                              <td>Rp <?php echo number_format($transaksi_detail->sub_total,2,'.',','); ?></td>
                            </tr>
                            <?php endforeach ?>
                          </tbody> 
                        </table>
                      </div>
                    </div>
                    <hr class="hr-divider-ghost">
                    
                </div>
              </div>
            </div>
          </div>
          <hr class="hr-divider-ghost">
        </div>


      </div>
    </div>
<!-- END SECTION KONTEN -->

<script type="text/javascript">
window.pilih_alamat = function() {
  if(document.getElementById("alamat_baru1").checked) {
    document.getElementById("input_alamat").readOnly = false;
    document.getElementById("input_alamat").value = '';
  } else {
    document.getElementById("input_alamat").readOnly = true;
    document.getElementById("input_alamat").value = '<?php echo $alamat_user; ?>';
  }
}  
window.onload = pilih_alamat();
</script>


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