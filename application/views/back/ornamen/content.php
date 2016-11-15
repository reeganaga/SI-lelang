      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Ornamen
            <small>Control Panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Ornamen</li>
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
            <section class="col-lg-4 col-md-6 col-sm-12">

              <!-- Chat box -->
              <div class="box box-success">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Ornamen Atas</h3>
                  <button class="btn btn-success btn-sm pull-right" data-type="ornamen_atas" data-toggle="modal" data-target="#addOrnamen"><i class="fa fa-plus"></i></button>
                </div>
                <div class="box-body">
                  <table id="tableOrnamenAtas" class="table table-bordered table-hover" >
                    <thead>
                    <tr>
                      <th width="50px">Kode</th>
                      <th style="max-width:80px;">Gambar</th>
                      <th style="max-width:80px;">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($arr_ornamen_atas as $ornamen_atas): ?>
                        <tr>
                            <td><?php echo $ornamen_atas->kode; ?></td>
                            <?php $link_gambar = base_url('assets/ornamen/atas/'.$ornamen_atas->gambar); ?>
                            <td><img src="<?php echo $link_gambar; ?>" style="max-width: 100px;" class="img-responsive img-thumbnail"></td>
                            <td>
                              <button class="btn btn-primary btn-flat " data-gambartemp="<?php echo $ornamen_atas->gambar; ?>" data-image="<?php echo $link_gambar ?>" data-id="<?php echo $ornamen_atas->id_ornamen_atas; ?>" data-toggle="modal" data-target="#editOrnamen" data-type="ornamen_atas" data-kode="<?php echo $ornamen_atas->kode; ?>"><i class="fa fa-edit"></i></button>

                              <button class="btn btn-danger btn-flat " data-link="<?php echo base_url('admin/ornamen/hapus_ornamen_atas/'.$ornamen_atas->id_ornamen_atas); ?>" data-toggle="modal" data-target="#deleteOrnamen"><i class="fa fa-trash"></i></button>
                              
                            </td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                      
                  </table>
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->
            </section><!-- /.Left col -->

            <!-- Middle col -->
            <section class="col-lg-4 col-md-6 col-sm-12">

              <!-- Chat box -->
              <div class="box box-success">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Ornamen Konten</h3>
                  <button class="btn btn-success btn-sm pull-right" data-type="ornamen_konten" data-toggle="modal" data-target="#addOrnamen"><i class="fa fa-plus"></i></button>
                </div>
                <div class="box-body">
                  <table id="tableOrnamenKonten" class="table table-bordered table-hover" >
                    <thead>
                    <tr>
                      <th>Kode</th>
                      <th>Gambar</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($arr_ornamen_konten as $ornamen_konten): ?>
                        <tr>
                            <td><?php echo $ornamen_konten->kode; ?></td>
                            <?php $link_gambar = base_url('assets/ornamen/konten/'.$ornamen_konten->gambar); ?>
                            <td><img src="<?php echo $link_gambar; ?>" class="img-responsive img-thumbnail thumb_foto"></td>
                            <td>
                              <button class="btn btn-primary btn-flat " data-gambartemp="<?php echo $ornamen_konten->gambar; ?>" data-image="<?php echo $link_gambar ?>" data-id="<?php echo $ornamen_konten->id_ornamen_konten; ?>" data-toggle="modal" data-target="#editOrnamen" data-type="ornamen_konten" data-kode="<?php echo $ornamen_konten->kode; ?>"><i class="fa fa-edit"></i></button>

                              <button class="btn btn-danger btn-flat " data-link="<?php echo base_url('admin/ornamen/hapus_ornamen_konten/'.$ornamen_konten->id_ornamen_konten); ?>" data-toggle="modal" data-target="#deleteOrnamen"><i class="fa fa-trash"></i></button>

                              
                              
                            </td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                      
                  </table>
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->
            </section><!-- /.Middle col -->

            <!-- Right col -->
            <section class="col-lg-4 col-md-6 col-sm-12">

              <!-- Chat box -->
              <div class="box box-success">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Ornamen Bawah</h3>
                  <button class="btn btn-success btn-sm pull-right" data-type="ornamen_bawah" data-toggle="modal" data-target="#addOrnamen"><i class="fa fa-plus"></i></button>
                </div>
                <div class="box-body">
                  <table id="tableOrnamenBawah" class="table table-bordered table-hover" >
                    <thead>
                    <tr>
                      <th>Kode</th>
                      <th>Gambar</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($arr_ornamen_bawah as $ornamen_bawah): ?>
                        <tr>
                            <td><?php echo $ornamen_bawah->kode; ?></td>
                            <?php $link_gambar = base_url('assets/ornamen/bawah/'.$ornamen_bawah->gambar); ?>
                            <td><img src="<?php echo $link_gambar; ?>" class="img-responsive img-thumbnail thumb_foto"></td>
                            <td>
                              <button class="btn btn-primary btn-flat " data-gambartemp="<?php echo $ornamen_bawah->gambar; ?>" data-image="<?php echo $link_gambar ?>" data-id="<?php echo $ornamen_bawah->id_ornamen_bawah; ?>" data-toggle="modal" data-target="#editOrnamen" data-type="ornamen_bawah" data-kode="<?php echo $ornamen_bawah->kode; ?>"><i class="fa fa-edit"></i></button>

                              <button class="btn btn-danger btn-flat " data-link="<?php echo base_url('admin/ornamen/hapus_ornamen_bawah/'.$ornamen_bawah->id_ornamen_bawah); ?>" data-toggle="modal" data-target="#deleteOrnamen"><i class="fa fa-trash"></i></button>

                              
                              
                            </td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                      
                  </table>
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->
            </section><!-- /.Right col -->



            <!-- Modal -->
            <div class="modal fade" id="addOrnamen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Ornamen</h4>
                  </div>
                  <div class="modal-body">
                    <?php echo form_open_multipart('admin/ornamen/tambah',array('class'=>'form')); ?>
                    <!-- <form class="form-horizontal"> -->
                      <div class="form-group">
                        <label class="control-label">Kode</label>
                          <input name="kode" type="text" class="form-control"></input>
                      </div>
                      <div class="form-group">
                        <label class="control-label">Gambar</label>
                          <input type="hidden" name="type" id="typeAdd"></input>
                          <input  name="gambar" type="file" class="form-control"></input>
                          <small><i>*maksimal file <b>500kb</b></i></small>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i>Tambah</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade" id="editOrnamen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Ubah Ornamen</h4>
                  </div>
                  <div class="modal-body">
                    <?php echo form_open_multipart('admin/ornamen/ubah',array('class'=>'form')); ?>
                    <!-- <form class="form-horizontal"> -->
                      <div class="form-group">
                          <img id="gambarTemp" src="" class="center-block img-responsive">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Kode</label>
                          <input name="kode" type="text" class="form-control" id="kodeUpdate"></input>
                      </div>
                      <div class="form-group">
                        <label class="control-label">Gambar</label>
                          <input type="hidden" name="id" type="text" id="idUpdate"></input>
                          <input type="hidden" name="type" type="text" id="typeUpdate"></input>
                          <input type="hidden" name="gambar_temp" type="text" id="gambarTempUpdate"></input>
                          <input name="gambar" type="file" class="form-control"></input>
                          <small><i>*maksimal file <b>500kb</b></i></small>
                          
                      </div>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i>Ubah</button>

                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade modal-danger" id="deleteOrnamen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Hapus Ornamen</h4>
                  </div>
                  <div class="modal-body">
                    Apakah anda ingin menghapus ornamen ini ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a id="linkDeleteOrnamen" class="btn btn-danger">Hapus</a>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->