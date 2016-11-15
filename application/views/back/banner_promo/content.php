      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Banner Promo
            <small>Menu Banner Promo</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Banner Promo</li>
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
              <div class="box box-success">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Data Banner Promo</h3>
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

                  <?php foreach ($arr_banner_promo as $banner_promo) {
                    $id_banner=$banner_promo->id_banner_promo;
                    $alt_image=$banner_promo->alt_image;
                   ?>
                  <div class="banner">
                    <img src="<?php echo base_url()."assets/uploads/images/".$banner_promo->gambar; ?>" class="img-responsive img-rhumbnail">
                  </div>
                  <?php } ?>
                  </hr>
                  <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>admin/banner_promo/editBannerPromoProses" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="col-md-2 label-control">Gambar</label>
                      <div class="col-md-10">
                        <input type="file" name="gambar" class="form-control"></input>
                        <small>*maksimal lebar gambar adalah 1170px dan tinggi 150px</small>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2 label-control">Alt gambar</label>
                      <div class="col-md-10">
                        <input value="<?php echo $alt_image; ?>" type="text" name="alt_image" class="form-control" placeholder="alternatif gambar berupa text apabila gambar tidak muncul"></input>
                        <small>alternatif gambar berupa text ketika gambar tidak muncul</small>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-10 col-md-offset-2">
                        <input type="hidden" name="id" value="<?php echo $id_banner; ?>"></input>
                        <input type="hidden" name="gambar_temp" value="<?php echo $banner_promo->gambar; ?>"></input>
                        <input type="submit" name="simpanbanner" class="btn btn-success" value="Simpan Banner"></input>
                      </div>
                    </div>
                  </form>
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->


            </section><!-- /.Left col -->

          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->