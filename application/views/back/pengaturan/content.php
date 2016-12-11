      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Pengaturan
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">pengaturan</li>
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
            <section class="col-lg-6 col-md-6">

              <!-- Chat box -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Ubah Info Admin</h3>
                </div>
                <div class="box-body">
                  <?php foreach ($arr_user as $user): ?> 
                    <?php echo form_open('admin/pengaturan/ubah',array('class'=>'form-horizontal')); ?>                   
                    <!-- <form class="form-horizontal"> -->
                      <div class="form-group">
                        <label class="control-label col-md-3">nama Lengkap</label>
                        <div class="col-md-9">
                          <input name="nama_lengkap" value="<?php echo $user->nama_lengkap; ?>" type="text" class="form-control" placeholder="Yogyakarta"></input>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3">Username</label>
                        <div class="col-md-9">
                          <input name="username" value="<?php echo $user->username; ?>" type="text" class="form-control" disabled="disabled"></input>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3">email</label>
                        <div class="col-md-9">
                          <input name="email" value="<?php echo $user->email; ?>" type="email" class="form-control" ></input>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3">alamat</label>
                        <div class="col-md-9">
                          <input name="alamat" value="<?php echo $user->alamat; ?>" type="text" class="form-control" ></input>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3">no_hp</label>
                        <div class="col-md-9">
                          <input name="no_hp" value="<?php echo $user->no_hp; ?>" type="text" class="form-control" ></input>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i>Simpan</button>
                        </div>
                      </div>
                    </form>
                  <?php endforeach ?>
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->
            </section><!-- /.Left col -->

            <!-- Left col -->
            <section class="col-lg-6 col-md-6">

              <!-- Chat box -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Ubah Password</h3>
                </div>
                <div class="box-body">
                  <?php echo form_open('admin/pengaturan/ubah_password',array('class'=>'form-horizontal')); ?>
                  <!-- <form class="form-horizontal"> -->
                    <div class="form-group">
                      <label class="control-label col-md-3">Password Lama</label>
                      <div class="col-md-9">
                        <input name="password_lama" type="password" class="form-control" ></input>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">Password Baru</label>
                      <div class="col-md-9">
                        <input name="password_baru" id="pass1" type="password" class="form-control" ></input>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">Ulangi password</label>
                      <div class="col-md-9">
                        <input name="password2" id="pass2" type="password" class="form-control" onkeyup="checkPass();return false;" ></input>
                        <span id="confirmMessage" class="confirmMessage"></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i>Simpan</button>
                      </div>
                    </div>
                  </form>
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->

              

            </section><!-- /.Left col -->


          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->