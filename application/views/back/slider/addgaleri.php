      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Galeri
            <small>Control Panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

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
                  <h3 class="box-title">Daftar Galeri</h3>
                  <a href="<?php echo base_url(); ?>admin/galeri" class="btn btn-success btn-flat pull-right">kembali</a>
                </div>
                <div class="box-body">
                  <?php if (isset($status)): ?>
                    <div class="alert alert-warning alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <?php echo $status; ?>
                    </div>            
                  <?php endif ?>                
                  <div class="row">
                    <div class="col-md-12">
                      <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>admin/galeri/addgaleriproses" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Judul</label>
                          <div class="col-sm-10">
                            <input name="judul" type="text" class="form-control" placeholder="Judul">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi</label>
                          <div class="col-sm-10">
                            <textarea name="deskripsi" class="form-control" placeholder="Deskripsi"></textarea>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Gambar</label>
                          <div class="col-sm-10">
                            <input type="file" id="fileselect" name="gambar" />
                            <small>*maksimal ukuran foro 200kb</small>
                            <div id="progress"></div>
                            <div id="messages">
                            
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-sm-10 col-md-offset-2">
                            <input type="submit" class="btn btn-primary btn-flat" value="Upload"></input>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                    
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->


            </section><!-- /.Left col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<script src="<?php echo base_url(); ?>assets/customs/js/filedrag.js"></script>