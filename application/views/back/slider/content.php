      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Slider
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
            <div class="col-lg-3 margin-b-10">
              <button class="btn bg-orange" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i>Tambah</button>
            </div>
          </div>
          <div class="row">
            <?php foreach ($arr_slider as $slider): ?>
              <div class="col-lg-2 col-md-3 ">
                <div class="box-custom">
                  <div class="box-body">
                    <img src="<?php echo base_url('assets/uploads/slider/'.$slider->gambar); ?>" width="100%" height="auto" class="img-responsive img-thumbnail">
                    <p class="no-margin"><small><strong><?php echo $slider->alt_gambar; ?></strong></small></p>
                    <p><small><i><?php echo $slider->deskripsi; ?></i></small></p>
                  </div>
                  <div class="box-footer no-padding">
                    <div class="row">
                        <div class="col-md-6 no-padding-right text-center">
                            <button data-toggle="modal" data-target="#editModal" class="btn-full" data-deskripsi="<?php echo $slider->deskripsi; ?>" data-judul="<?php echo $slider->alt_gambar; ?>" data-gambar="<?php echo $slider->gambar; ?>" data-id="<?php echo $slider->id_master_slider; ?>">Edit</button>
                        </div>
                        <div class="col-md-6 no-padding-left text-center">
                          <button data-toggle="modal" data-target="#deleteModal" data-link="<?php echo base_url('admin/slider/deleteGaleri/'.$slider->id_master_slider); ?>" class="btn-full">Hapus</button>
                            <!-- <button class="btn btn-default center-block"><i class="fa fa-trash"></i></button> -->
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach ?>

          </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

           <!-- Modal -->


            <div class="modal fade " id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Gambar</h4>
                  </div>
                  <div class="modal-body">
                    <?php echo form_open_multipart('admin/slider/editSliderProses',array('class'=>'form-horizontal')) ?>
                    <!-- <form class="form-horizontal"> -->
                      <div class="form-group">
                        <label class="col-md-3 control-label">Id</label>
                        <div class="col-md-9">
                          <input id="idUpdate" name="id" readonly="" type="text" class="form-control"></input>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label">Deskripsi</label>
                        <div class="col-md-9">
                          <input id="deskripsiUpdate" name="deskripsi" type="text" class="form-control"></input>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label">Alt Gambar</label>
                        <div class="col-md-9">
                          <input id="judulUpdate" name="alt_gambar" type="text" class="form-control"></input>
                          <small><i>Digunakan ketika gambar tidak muncul maka alternatif gambar yang muncul</i></small>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label">Gambar</label>
                        <div class="col-md-9">
                          <input name="gambar" type="file" class="form-control"></input>
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <input id="gambarTempUpdate" name="gambar_temp" type="hidden" class="form-control"></input>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Ubah</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade " id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-sm" role="document">
                    <?php echo form_open_multipart('admin/slider/tambah_proses',array('class'=>'form-horizontal')); ?>
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Slider</h4>
                  </div>
                  <div class="modal-body"> 
                    <!-- <form class="form-horizontal"> -->
                      <div class="form-group">
                        <label class="col-md-3 control-label">Alt Gambar</label>
                        <div class="col-md-9">
                          <input id="judulUpdate" name="alt_gambar" type="text" class="form-control"></input>
                          <small><i>Digunakan ketika gambar tidak muncul</i></small>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label">Deskripsi</label>
                        <div class="col-md-9">
                          <input id="deskripsiUpdate" name="deskripsi" type="text" class="form-control"></input>

                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label">Gambar</label>
                        <div class="col-md-9">
                          <input name="gambar" type="file" class="form-control"></input>
                          <small><i>maksimal gambar 500KB</i></small>
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <input id="gambarTempUpdate" name="gambar_temp" type="hidden" class="form-control"></input>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" >Tambah</button>
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
                    <h4 class="modal-title" id="myModalLabel">Hapus Galeri</h4>
                  </div>
                  <div class="modal-body">
                    Apakah anda ingin menghapus Gambar ini ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a id="linkDelete" class="btn btn-danger">Hapus</a>
                  </div>
                </div>
              </div>
            </div>