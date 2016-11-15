      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Pengiriman
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">pengiriman</li>
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
                  <h3 class="box-title">Tambah Kota</h3>
                </div>
                <div class="box-body">
                    <?php echo form_open('admin/pengiriman/tambah',array('class'=>'form-horizontal')) ?>
                  <!-- <form class="form-horizontal"> -->
                    <div class="form-group">
                      <label class="control-label col-md-3">nama Kota</label>
                      <div class="col-md-9">
                        <input name="nama_kota" type="text" class="form-control" placeholder="Yogyakarta"></input>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">Tarif</label>
                      <div class="col-md-9">
                        <input name="tarif" type="text" class="form-control" placeholder="15000"></input>
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

            <!-- Left col -->
            <section class="col-lg-6 col-md-6">

              <!-- Chat box -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Daftar Kota</h3>
                </div>
                <div class="box-body">
                  <table id="tablePengiriman" class="table table-bordered table-hover" >
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nama Kota</th>
                      <th>Tarif</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($arr_pengiriman as $pengiriman): ?>
                        <tr>
                            <td><?php echo $pengiriman->id_kota; ?></td>
                            <td><?php echo $pengiriman->nama_kota; ?></td>
                            <td><?php echo $pengiriman->tarif; ?></td>
                            <td>
                              <button class="btn btn-primary" data-target="#editModal" data-toggle="modal" data-id="<?php echo $pengiriman->id_kota; ?>" data-namakota="<?php echo $pengiriman->nama_kota; ?>" data-tarif="<?php echo $pengiriman->tarif; ?>"><i class="fa fa-edit" ></i>Edit</button>
                              <button class="btn btn-danger" data-target="#deleteModal" data-toggle="modal" data-link="pengiriman/hapus/<?php echo $pengiriman->id_kota; ?>"><i class="fa fa-trash" ></i>Hapus</button>
                            </td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                      
                  </table>
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->
            </section><!-- /.Left col -->

            <!-- Modal -->


            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Ubah Kota</h4>
                  </div>
                  <div class="modal-body">
                    <!-- <form class="form-horizontal"> -->
                    <?php echo form_open('admin/pengiriman/ubah',array('class'=>'form-horizontal')); ?>
                      <div class="form-group">
                        <label class="control-label col-md-2">Nama Kota</label>
                        <div class="col-md-10">
                          <input name="nama_kota" id="input_nama_kota" type="text" class="form-control"></input>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2">Tarif</label>
                        <div class="col-md-10">
                          <input name="tarif" id="input_tarif" type="text" class="form-control"></input>
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <input name="id" type="hidden" id="idUpdate"></input>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i>Ubah</button>

                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade modal-danger" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Hapus Kota</h4>
                  </div>
                  <div class="modal-body">
                    Apakah anda ingin menghapus Kota ini ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a id="linkDeleteModal" class="btn btn-danger">Hapus</a>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->