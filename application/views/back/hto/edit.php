      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Cara Pesan
            <small>Menu Cara Pesan</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Cara Pesan</li>
          </ol>
        </section>

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
        <!-- Main content -->
        <section class="content">

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12">

              <!-- Chat box -->
              <div class="box box-success">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Data Cara Pesan</h3>
                </div>
                <div class="box-body">
                  <?php if (isset($status)): ?>
                    <div class="alert alert-warning alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <?php echo $status; ?>
                    </div>
                    <div class="alert alert-success alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <?php echo $status_query; ?>
                    </div>  
                  <?php endif ?>
                  
                  <form class="form" action="<?php echo base_url(); ?>admin/howtoorder/editHtoProses" method="post"
                  enctype="multipart/form-data">
                    <?php foreach ($arr_hto as $hto) { ?>
                    <div class="form-group">
                      <label class="control-label">Deskripsi</label>
                      <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="deskripsi"><?php echo $hto->deskripsi; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Gambar</label>
                      <img src="<?php echo base_url(); ?>assets/uploads/images/<?php echo $hto->gambar; ?>" class="img-responsive img-thumbnail" style="width: 100px;">
                      <input type="file" name="gambar" class=""></input>
                      <input type="hidden" name="id" value="<?php echo $hto->id_how_to_order; ?>"></input>
                      <input type="hidden" name="gambar_temp" value="<?php echo $hto->gambar; ?>"></input>
                    </div>
                    <div class="form-group">
                      <input type="submit" value="Simpan" class="btn btn-primary"></input>
                    </div>
                    <?php } ?>
                  </form>
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->


            </section><!-- /.Left col -->

          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->