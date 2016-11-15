      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Daftar Kategori
            <small>Control panel</small>
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
            <section class="col-lg-5">

              <!-- Chat box -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Daftar Barang</h3>
                </div>
                <div class="box-body">
                  <?php echo form_open('admin/Kategori_barang/tambah_proses',array('class'=>'form-horizontal')); ?>
                  <!-- <form class="form-horizontal"> -->
                    <div class="form-group">
                      <label class="control-label col-md-3">Nama Kategori</label>
                      <div class="col-md-9">
                        <input value="<?php echo set_value('nama_kategori'); ?>" name="nama_kategori" type="text" class="form-control" ></input>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">Deskripsi</label>
                      <div class="col-md-9">
                        <input value="<?php echo set_value('deskripsi'); ?>" name="deskripsi" type="text" class="form-control" ></input>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">Slug</label>
                      <div class="col-md-9">
                        <input value="<?php echo set_value('slug'); ?>" name="slug" type="text" class="form-control"></input>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-9 col-md-offset-3">
                        <button name="submit" type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i>Tambah</button>
                      </div>
                    </div>
                  </form>
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->
            </section><!-- /.Left col -->

            <!-- Left col -->
            <section class="col-lg-7">

              <!-- Chat box -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Daftar Barang</h3>
                </div>
                <div class="box-body">
                  <table id="tablePelanggan" class="table table-bordered table-hover" >
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nama Kategori</th>
                      <th>Deskripsi</th>
                      <th>Slug</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($arr_kategori as $kategori): ?>
                        <tr>
                            <td><?php echo $kategori->id_kategori; ?></td>
                            <td><?php echo $kategori->nama_kategori; ?></td>
                            <td><?php echo $kategori->deskripsi_kategori; ?></td>
                            <td><?php echo $kategori->slug; ?></td>
                            <td>
                              <button class="btn btn-primary" data-target="#modalEdit" data-toggle="modal" data-link="<?php echo base_url('admin/kategori/hapus/'.$kategori->id_kategori); ?>"
                              data-deskripsi="<?php echo $kategori->deskripsi_kategori; ?>"
                              data-kategori="<?php echo $kategori->nama_kategori; ?>"
                              data-slug="<?php echo $kategori->slug; ?>"
                              data-idkategori="<?php echo $kategori->id_kategori; ?>"
                              ><i class="fa fa-edit" ></i>Ubah</button>
                              <button class="btn btn-danger" data-target="#deleteUser" data-toggle="modal" data-link="<?php echo base_url('admin/kategori_barang/hapus/'.$kategori->id_kategori); ?>"><i class="fa fa-trash" ></i>Hapus</button>
                            </td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                      
                  </table>
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->
            </section><!-- /.Left col -->          



          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
          
          <div class="modal fade modal-danger" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Hapus Barang</h4>
                  </div>
                  <div class="modal-body">
                    Apakah anda ingin menghapus Barang ini ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a id="linkDeleteOrnamen" class="btn btn-danger">Hapus</a>
                  </div>
                </div>
              </div>
            </div>

          <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Ubah Kategori</h4>
                  </div>
                  <div class="modal-body">
                    <?php echo form_open('admin/Kategori_barang/ubah_proses',array('class'=>'form-horizontal')); ?>
                    <!-- <form class="form-horizontal"> -->
                      <div class="form-group">
                        <label class="control-label col-md-3">Nama Kategori</label>
                        <div class="col-md-9">
                          <input id="kategori" name="nama_kategori" type="text" class="form-control" ></input>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3">Deskripsi</label>
                        <div class="col-md-9">
                          <input id="deskripsi" name="deskripsi" type="text" class="form-control" ></input>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3">Slug</label>
                        <div class="col-md-9">
                          <input id="slug" name="slug" type="text" class="form-control"></input>
                          <input id="idkategori" name="idkategori" type="hidden" class="form-control"></input>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                          <button name="submit" type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i>Ubah</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a id="linkDeleteOrnamen" class="btn btn-danger">Hapus</a>
                  </div> -->
                </div>
              </div>
            </div>            