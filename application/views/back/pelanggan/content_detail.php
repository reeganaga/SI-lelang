<?php foreach ($arr_pelanggan as $pelanggan): ?>
  
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Pelanggan
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- row nofitikasi -->
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
          <!-- row nofitikasi -->

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-6 col-md-6">

              <!-- Chat box -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Pelanggan</h3>
                </div>
                <div class="box-body">
                  <div class="form-horizontal">
                    <div class="row">
                      <label class="control-label col-lg-3 col-md-3 col-sm-3">Nama Lengkap</label>
                      <div class="col-lg-9 col-md-9 col-sm-9"><?php echo $pelanggan->nama_lengkap; ?></div>
                    </div>
                    <div class="row">
                      <label class="control-label col-lg-3 col-md-3 col-sm-3">Username</label>
                      <div class="col-lg-9 col-md-9 col-sm-9"><?php echo $pelanggan->username; ?></div>
                    </div>
                    <div class="row">
                      <label class="control-label col-lg-3 col-md-3 col-sm-3">Email</label>
                      <div class="col-lg-9 col-md-9 col-sm-9"><?php echo $pelanggan->email; ?></div>
                    </div>
                    <div class="row">
                      <label class="control-label col-lg-3 col-md-3 col-sm-3">Alamat</label>
                      <div class="col-lg-9 col-md-9 col-sm-9"><?php echo $pelanggan->alamat; ?></div>
                    </div>
                    <div class="row">
                      <label class="control-label col-lg-3 col-md-3 col-sm-3">No Hp</label>
                      <div class="col-lg-9 col-md-9 col-sm-9"><?php echo $pelanggan->no_hp; ?></div>
                    </div>
                    <div class="row">
                      <label class="control-label col-lg-3 col-md-3 col-sm-3">Jenis Kelamin</label>
                      <div class="col-lg-9 col-md-9 col-sm-9"><?php echo $pelanggan->jenis_kelamin; ?></div>
                    </div>
                    <div class="row">
                      <label class="control-label col-lg-3 col-md-3 col-sm-3">Tanggal Lahir</label>
                      <div class="col-lg-9 col-md-9 col-sm-9"><?php echo $pelanggan->tgl_lahir; ?></div>
                    </div>
                  </div>
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->

              <!-- Chat box -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Pelanggan</h3>
                </div>
                <div class="box-body">
                  <!-- <form class="form-horizontal"> -->
                  <?php echo form_open('admin/pelanggan/ubah_password',array('class'=>'form-horizontal')); ?>
                    <div class="form-group">
                      <label class="control-label col-lg-3">Password Baru</label>
                      <div class="col-lg-9">
                        <input name="password_baru" type="password" id="pass1" class="form-control"></input>  
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-lg-3">Ulangi Password</label>
                      <div class="col-lg-9">
                        <input name="password2" type="password" id="pass2" onkeyup="checkPass(); return false;" class="form-control"></input>  
                        <span id="confirmMessage" class="confirmMessage"></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-12">
                        <input name="id_user" type="hidden" class="form-control" value="<?php echo $pelanggan->id_user; ?>"></input>
                        <input type="submit" class="form-control btn btn-success" value="Ubah Password"></input>                        
                      </div>
                    </div>
                  </form>
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->

            </section><!-- /.Left col -->

            <section class="col-lg-6 col-md-6">

              <!-- Chat box -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Pelanggan</h3>
                </div>
                <div class="box-body">
                    <?php echo form_open('admin/pelanggan/ubah',array('class'=>'form-horizontal')); ?>
                  <!-- <form class="form-horizontal"> -->
                    <div class="form-group">
                      <label class="control-label col-lg-3">Nama Lengkap</label>
                      <div class="col-lg-9">
                        <input required="" name="nama_lengkap" type="text" class="form-control" value="<?php echo $pelanggan->nama_lengkap; ?>"></input>  
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-lg-3">Username</label>
                      <div class="col-lg-9">
                        <input required="" name="username" type="text" class="form-control" value="<?php echo $pelanggan->username; ?>"></input>  
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-lg-3">Email</label>
                      <div class="col-lg-9">
                        <input required="" name="email" type="email" class="form-control" value="<?php echo $pelanggan->email; ?>"></input>  
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-lg-3">Alamat</label>
                      <div class="col-lg-9">
                        <textarea name="alamat" class="form-control"><?php echo $pelanggan->alamat; ?></textarea>  
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-lg-3">No Hp</label>
                      <div class="col-lg-9">
                        <input required="" name="no_hp" type="text" class="form-control" value="<?php echo $pelanggan->no_hp; ?>"></input>  
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-lg-3">Jenis Kelamin</label>
                      <div class="col-lg-9">
                        <?php if ($pelanggan->jenis_kelamin=='laki-laki'): ?>
                          <input required="" name="jenis_kelamin" type="radio" value="laki-laki" checked=""> laki - laki</input>  
                          <input required="" name="jenis_kelamin" type="radio" value="perempuan"> perempuan</input>  
                        <?php else: ?>
                          <input required="" name="jenis_kelamin" type="radio" value="laki-laki"> laki - laki</input>  
                          <input required="" name="jenis_kelamin" type="radio" value="perempuan" checked=""> perempuan</input>  
                        <?php endif ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-lg-3">Tanggal Lahir</label>
                      <div class="col-lg-9">
                        <select name="tanggal">
                          <?php for ($i=1; $i <= 31; $i++) { 
                            $date = new DateTime($pelanggan->tgl_lahir);

                            if ($date->format('d')==$i) {
                              $select='selected';
                            }else{$select='';}
                            echo '<option value="'.$i.'" '.$select.'>'.$i.'</option>';
                           } ?>
                        </select>
                        <select name="bulan">
                        <?php 
                        for($i = 1 ; $i <= 12; $i++) {
                          if ($date->format('m')==$i) {
                              $select='selected';
                            }else{$select='';}

                          $month = date("F",mktime(0,0,0,$i,1,date("Y")));
                                echo "<option value='$i' ".$select.">" .   $month . "</option>";
                        }
                        ?>
                        </select> 
                        <select name="tahun">
                          <?php 
                            $year = date('Y');
                            for ($i=1981; $i <= $year; $i++) { 
                            $date = new DateTime($pelanggan->tgl_lahir);

                            if ($date->format('Y')==$i) {
                              $select='selected';
                            }else{$select='';}
                            echo '<option value="'.$i.'" '.$select.'>'.$i.'</option>';
                           } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-12">
                        <input required="" name="id_user" type="hidden" class="form-control" value="<?php echo $pelanggan->id_user; ?>"></input>  
                        <input type="submit" class="form-control btn btn-success" value="Ubah"></input>                        
                      </div>
                    </div>
                  </form>
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->
            </section><!-- /.Left col -->

          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php endforeach ?>
