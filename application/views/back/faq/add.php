      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            FAQ
            <small>Menu Frequently Ask Question</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">FAQ</li>
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
                  <h3 class="box-title">Data About</h3>
                </div>
                <div class="box-body">                  
                  <form class="form" action="<?php echo base_url(); ?>admin/faq/tambah_proses" method="post"
                  enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="control-label">Deskripsi</label>
                      <textarea name="deskripsi" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Gambar</label>
                      <input type="file" name="gambar" class=""></input>
                    </div>
                    <div class="form-group">
                      <input type="submit" value="Simpan" class="btn btn-primary"></input>
                    </div>
                  </form>
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->


            </section><!-- /.Left col -->

          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->