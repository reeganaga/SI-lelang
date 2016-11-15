      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Katalog
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Katalog</li>
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
            <section class="col-md-6">

              <!-- Chat box -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Detail Barang</h3>
                </div>
                <div class="box-body">
                  <?php echo form_open_multipart('admin/katalog_barang/tambah_proses',array('class'=>'form-horizontal')); ?>
                  <!-- <form class="form-horizontal"> -->
                    <div class="form-group">
                      <label class="control-label col-md-3">Nama Barang</label>
                      <div class="col-md-9">
                        <input value="<?php echo set_value('nama_barang') ?>" onkeyup="typeslug()" id="nama_barang" name="nama_barang" type="text" class="form-control" ></input>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-md-3">deskripsi</label>
                      <div class="col-md-9">
                        <input value="<?php echo set_value('deskripsi') ?>" name="deskripsi" type="text" class="form-control"></input>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">kategori</label>
                      <div class="col-md-9">
                        <?php echo form_dropdown('id_kategori',$arr_kategori,'','class="form-control"') ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">Slug</label>
                      <div class="col-md-9">
                        <input value="<?php echo set_value('slug') ?>" name="slug" id="slug_barang" type="text" class="form-control"></input>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">Gambar</label>
                      <div class="col-md-9">
                        <input name="gambar" type="file" class="form-control"></input>
                        <small><i>*maksimal  gambar 1 MB</i></small>
                      </div>
                    </div>
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->
            </section><!-- /.Left col -->

            <!-- Left col -->
            <section class="col-md-6">

              <!-- Chat box -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Isikan Meta</h3>
                </div>
                <div class="box-body">
                  <div class="form-horizontal">
                    <div class="form-group">
                      <label class="control-label col-md-3">Harga</label>
                      <div class="col-md-9">
                        <input value="<?php echo set_value('harga') ?>" type="number" name="harga" class="form-control">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-md-3">Jumlah barang</label>
                      <div class="col-md-9">
                        <input value="<?php echo set_value('jumlah_barang') ?>" name="jumlah_barang" type="number" min=1 class="form-control" ></input>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">Berat</label>
                      <div class="col-md-9">
                        <div class="input-group">
                          <input value="<?php echo set_value('berat') ?>" name="berat" type="text" class="form-control" placeholder="0.5"></input>
                          <div class="input-group-addon">KG</div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">Tinggi</label>
                      <div class="col-md-9">
                        <div class="input-group">
                          <input value="<?php echo set_value('tinggi') ?>" name="tinggi" type="text" class="form-control" placeholder="100"></input>
                          <div class="input-group-addon">
                            CM
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">lebar</label>
                      <div class="col-md-9">
                        <div class="input-group">
                          <input value="<?php echo set_value('lebar') ?>" name="lebar" type="text" class="form-control" placeholder="100"></input>
                          <div class="input-group-addon">
                            CM
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">Panjang</label>
                      <div class="col-md-9">
                        <div class="input-group">
                          <input value="<?php echo set_value('panjang') ?>" name="panjang" type="text" class="form-control" placeholder="100"></input>
                          <div class="input-group-addon">
                            CM
                          </div>
                        </div>
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