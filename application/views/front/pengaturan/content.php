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
        <?php foreach ($arr_user as $user): ?>
          
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-12">
              <h3 class="title-v2">Data Identitas</h3>
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

              <?php echo form_open_multipart('member/pengaturan/simpan',array('class'=>'form-horizontal')); ?>
              <!-- <form class="form-horizontal"> -->
                  <div class="form-group">
                      <label for="inputEmail" class="control-label col-sm-2">Username</label>
                      <div class="col-sm-10">
                        <input name="username" type="text" class="form-control" value="<?php echo $user->username; ?>"></input>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2">Email</label>
                    <div class="col-sm-10">
                      <input name="email" class="form-control" placeholder="xxx@xxx.xxx" type="email" value="<?php echo $user->email; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2">Nama Lengkap</label>
                    <div class="col-sm-10">
                      <input name="nama_lengkap" class="form-control" type="text" value="<?php echo $user->nama_lengkap; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2">Alamat</label>
                    <div class="col-sm-10">
                      <textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo $user->alamat; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2">No HP</label>
                    <div class="col-sm-10">
                      <input name="no_hp" type="text" class="form-control" placeholder="999999999" value="<?php echo $user->no_hp; ?>"></input>
                    </div>
                  </div>
                  <!-- <div class="form-group">
                      <label for="inputEmail" class="control-label col-sm-2">Foto</label>
                      <div class="col-sm-10">
                        <?php if (empty($user->gambar)): ?>
                          <img src="https://placehold.it/100x100" class="img-responsive img-thumbnail margin-b-10" style="max-width: 100px;overflow: hidden;">
                        <?php else: ?>
                          <img src="<?php echo base_url().'assets/uploads/users/'.$user->gambar; ?>" class="img-responsive img-thumbnail margin-b-10" style="max-width: 100px;overflow: hidden;">
                        <?php endif ?>
                        <input name="gambar" type="file" class="form-control"></input>
                        <small><i>foto maksimal <b>500kb</b></i></small>
                        <input name="gambar_temp" type="hidden" class="form-control" value="<?php echo $user->gambar; ?>"></input>
                      </div>
                  </div> -->
                  <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-gear"></i>Ubah Data Diri</button>
                      </div>
                  </div>
              </form>
            </div>
          </div>
          <hr class="hr-divider-ghost">
        </div>

        <?php endforeach ?>

      </div>
    </div>
<!-- END SECTION KONTEN -->