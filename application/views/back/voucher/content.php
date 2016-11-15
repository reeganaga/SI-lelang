      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Voucher
            <small>Diskon Merchandise</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">voucher</li>
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
                  <h3 class="box-title">Data Voucher</h3>
                  <button type="button" data-target="#addModal" data-toggle="modal" class="btn btn-success btn-flat pull-right" >Tambah Voucher</button>
                </div>
                <div class="box-body">
                  <table class="table table-hover">
                    <tr>
                      <th>ID</th>
                      <th>Kode Voucher</th>
                      <th>Status</th>
                      <th>Persentase</th>
                      <th>Aksi</th>
                    </tr>
                    <?php foreach ($arr_voucher as $voucher) { ?>
                      <tr>
                        <td><?php echo $voucher->id_voucher; ?></td>
                        <td><?php echo $voucher->kode; ?></td>
                        <td>
                          <?php 
                          if ($voucher->status_voucher=='aktif') {
                            echo '<a href="'.base_url().'admin/voucher/ubahstatus/'.$voucher->id_voucher.'/non-aktif" class="btn btn-success btn-flat">'.$voucher->status_voucher.'</a>';
                          }else{
                            echo '<a href="'.base_url().'admin/voucher/ubahstatus/'.$voucher->id_voucher.'/aktif" class="btn btn-danger btn-flat">'.$voucher->status_voucher.'</a>';
                          }
                          ?>
                        </td>
                        <td><?php echo $voucher->persen; ?></td>
                        <td>
                          <button type="button" data-toggle="modal" data-target="#deleteModal" class="btn btn-flat btn-warning" data-link="<?php echo base_url().'admin/voucher/deletevoucher/'.$voucher->id_voucher; ?>"><i class="fa fa-trash"></i> Hapus</button>

                          <button type="button" data-toggle="modal" data-target="#updateModal" class="btn btn-flat btn-info" data-id="<?php echo $voucher->id_voucher; ?>" data-kode="<?php echo $voucher->kode; ?>" data-persen="<?php echo $voucher->persen; ?>"><i class="fa fa-edit"></i> Ubah</button>
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

            <div class="modal fade modal-danger" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Hapus Voucher</h4>
                  </div>
                  <div class="modal-body">
                    Apakah anda ingin menghapus Voucher ini ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a id="linkDeleteModal" class="btn btn-danger">Hapus</a>
                  </div>
                </div>
              </div>
            </div>      
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Voucher</h4>
                  </div>
                  <div class="modal-body">
                    <!-- <form class="form-horizontal"> -->
                    <?php echo form_open('admin/voucher/addvoucherproses',array('class'=>'form-horizontal')); ?>
                      <div class="form-group">
                        <label class="control-label col-md-2">Kode Voucher</label>
                        <div class="col-md-10">
                          <input name="kode" id="input_kode" type="text" class="form-control"></input>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2">Status</label>
                        <div class="col-md-10">
                          <select name="status" class="form-control">
                            <option value="aktif">aktif</option>
                            <option value="non-aktif">non-aktif</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2">Persen</label>
                        <div class="col-md-10">
                          <input name="persen" type="number" class="form-control"></input>
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
            <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Ubah Voucher</h4>
                  </div>
                  <div class="modal-body">
                    <!-- <form class="form-horizontal"> -->
                    <?php echo form_open('admin/voucher/ubah_voucher',array('class'=>'form-horizontal')); ?>
                      <div class="form-group">
                        <label class="control-label col-md-2">Kode Voucher</label>
                        <div class="col-md-10">
                          <input required="required" name="kode" id="input_kode" type="text" class="form-control"></input>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2">Status</label>
                        <div class="col-md-10">
                          <select required="required" name="status" class="form-control">
                            <option value="aktif">aktif</option>
                            <option value="non-aktif">non-aktif</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2">Persen</label>
                        <div class="col-md-10">
                          <input id="input_persen" required="required" name="persen" type="number" class="form-control"></input>
                          <input id="input_id" name="id_voucher" type="hidden" class="form-control"></input>
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