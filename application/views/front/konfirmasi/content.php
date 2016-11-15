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
              <h3 class="title-v2">Form Konfirmasi</h3>
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
            <div class="col-md-12">

              <!-- alert jika ada form error -->
              <?php echo validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>'); ?>
              <?php echo form_open_multipart('member/konfirmasi/proses_konfirmasi',array('class'=>'form-horizontal')); ?>
              <!-- <form class="form-horizontal"> -->
                  <div class="form-group">
                      <label for="inputEmail" class="control-label col-sm-2">Kode Pemesanan</label>
                      <div class="col-sm-10">
                        <select name="id_transaksi" class="form-control">
                          <?php if ($arr_transaksi): ?>
                            <?php foreach ($arr_transaksi as $transaksi): ?>
                              <option value="<?php echo $transaksi->id_transaksi; ?>">#<?php echo $transaksi->id_transaksi; ?></option>
                            <?php endforeach ?>
                          <?php endif ?>
                        </select>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2">Jumlah</label>
                    <div class="col-sm-10">
                      <input name="jumlah" class="form-control" placeholder="999999" type="text" value="<?php echo set_value('jumlah'); ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2">Tanggal</label>
                    <div class="col-sm-10">
                      <input name="tgl" class="form-control" placeholder="yyyy-mm-dd" type="date" value="<?php echo set_value('tgl'); ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2">Jam</label>
                    <div class="col-sm-10">
                      <input name="jam" class="form-control" placeholder="jj:mm" type="time"  value="<?php echo set_value('jam'); ?>">
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="inputEmail" class="control-label col-sm-2">Tranfer ke</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="tranfer_ke">
                          <option value="bni">BNI</option>
                          <option value="mandiri">Mandiri</option>
                        </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="inputEmail" class="control-label col-sm-2">Metode Pembayaran</label>
                      <div class="col-sm-10">
                        <select name="metode" class="form-control">
                          <option value="atm">ATM</option>
                          <option value="internet">Internet Banking</option>
                          <option value="mobile">Mobile Banking</option>
                          <option value="tranfer">Tranfer</option>
                        </select>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2">Bukti Pengiriman</label>
                    <div class="col-sm-10">
                      <input name="gambar" type="file" class="form-control"></input>
                      <small><i>*foto maksimal <b>500 kb</b> dan tipe jpg atau png</i></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2">Catatan</label>
                    <div class="col-sm-10">
                      <textarea name="catatan" class="form-control"><?php echo set_value('catatan'); ?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Konfirmasi</button>
                      </div>
                  </div>
              </form>
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