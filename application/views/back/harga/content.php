      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Harga
            <small>Harga Merchandise</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Harga</li>
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
            <section class="col-lg-12">

              <!-- Chat box -->
              <div class="box box-success">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Data Harga</h3>
                </div>
                <div class="box-body">
                  <table class="table table-hover">
                    <tr>
                      <th>ID</th>
                      <th>Harga (Rp)</th>
                      <th>Deskripsi</th>
                      <th>Aksi</th>
                    </tr>
                    <?php foreach ($arr_harga as $harga) { ?>
                      <tr>
                        <td><?php echo $harga->id_harga; ?></td>
                        <td><?php echo $harga->harga; ?></td>
                        <td><?php echo $harga->deskripsi; ?></td>
                        <td>
                          <button type="button" data-toggle="modal" data-target="#editModal" class="btn btn-flat btn-primary" data-id="<?php echo $harga->id_harga; ?>" data-harga="<?php echo $harga->harga; ?>" data-deskripsi="<?php echo $harga->deskripsi; ?>"><i class="fa fa-edit"></i> Edit</button>
                        </td>
                      </tr>
                    <?php } ?>
                    
                  </table>
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->
            </section><!-- /.Left col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Ubah Harga</h4>
                  </div>
                  <div class="modal-body">
                    <!-- <form class="form-horizontal"> -->
                    <?php echo form_open('admin/harga/aksi_ubah',array('class'=>'form-horizontal')); ?>
                      <div class="form-group">
                        <label class="control-label col-md-2">Harga</label>
                        <div class="col-md-10">
                          <input required="required" name="harga" id="input_harga" type="text" class="form-control"></input>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2">Desksipsi</label>
                        <div class="col-md-10">
                          <input required="required" name="deskripsi" id="input_deskripsi" type="text" class="form-control"></input>
                          <input name="id" id="input_id" type="hidden" class="form-control"></input>
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <!-- <input name="id" type="hidden" id="idUpdate"></input> -->
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i>Ubah</button>

                    </form>
                  </div>
                </div>
              </div>
            </div>        