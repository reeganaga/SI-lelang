      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Testimoni
            <small>Ditampilkan di home</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">testimoni</li>
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
                  <h3 class="box-title">Data Testimoni</h3>
                </div>
                <div class="box-body">
                  <table class="table table-hover" id="tableTestimoni">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Isi Testimoni</th>
                        <th>Pelanggan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($arr_testimoni as $testimoni) { ?>
                        <tr>
                          <td><?php echo $testimoni->id_testimoni; ?></td>
                          <td><?php echo $testimoni->isi_testimoni; ?></td>
                          <td><?php echo $testimoni->nama_lengkap; ?></td>
                          <td>
                            <?php 
                            if ($testimoni->status=='aktif') {
                              echo '<a href="'.base_url().'admin/testimoni/ubahstatus/'.$testimoni->id_testimoni.'/non-aktif" class="btn btn-success btn-flat">'.$testimoni->status.'</a>';
                            }else{
                              echo '<a href="'.base_url().'admin/testimoni/ubahstatus/'.$testimoni->id_testimoni.'/aktif" class="btn btn-danger btn-flat">'.$testimoni->status.'</a>';
                            }
                            ?>
                          </td>
                          <td>
                            <button type="button" data-toggle="modal" data-target="#deleteModal" class="btn btn-flat btn-warning" data-link="<?php echo base_url().'admin/testimoni/deletetestimoni/'.$testimoni->id_testimoni; ?>"><i class="fa fa-trash"></i> Hapus</button>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                    
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
                    <h4 class="modal-title" id="myModalLabel">Hapus testimoni</h4>
                  </div>
                  <div class="modal-body">
                    Apakah anda ingin menghapus Testimoni ini ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a id="linkDelete" class="btn btn-danger">Hapus</a>
                  </div>
                </div>
              </div>
            </div>      
                   