      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            About
            <small>Menu About</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

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
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12">

              <!-- Chat box -->
              <div class="box box-success">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Data About</h3>
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
                  
                  <form class="form-horizontal" action="<?php echo base_url(); ?>admin/harga/aksi_ubah" method="post"
                  enctype="multipart/form-data">
                    <?php foreach ($data as $row) { ?>
                    <div class="form-group">
                      <label class="control-label col-md-2">Harga</label>
                      <div class="col-md-10">
                        <div class="input-group">
                          <span class="input-group-addon"><b>Rp</b></span>
                          <input name="harga" type="text" value="<?php echo $row->harga; ?>" name="harga" class="form-control"></input>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $row->id_harga; ?>"></input>
                      </div>
                        
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2">Deskripsi</label>
                      <div class="col-md-10">
                        <input type="text" value="<?php echo $row->deskripsi; ?>" name="deskripsi" class="form-control"></input>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-offset-2 col-md-10">
                        <input type="submit" value="Simpan" class="btn btn-primary"></input>                 
                      </div>
                    </div>
                    <?php } ?>
                  </form>
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->


            </section><!-- /.Left col -->

          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->