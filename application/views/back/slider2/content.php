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
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Daftar Pelanggan</h3>
                </div>
                <div class="box-body">
                  <table id="tablePelanggan" class="table table-bordered table-hover" >
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nama Lengkap</th>
                      <th>Username</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat Email</th>
                      <th>No Hp</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($arr_pelanggan as $pelanggan): ?>
                        <tr>
                            <td><?php echo $pelanggan->id_user; ?></td>
                            <td><?php echo $pelanggan->nama_lengkap; ?></td>
                            <td><?php echo $pelanggan->username; ?></td>
                            <td><?php echo $pelanggan->jenis_kelamin; ?></td>
                            <td><?php echo $pelanggan->email; ?></td>
                            <td><?php echo $pelanggan->no_hp; ?></td>
                            <td>
                              <a href="<?php echo base_url('admin/pelanggan/detail/'.$pelanggan->id_user); ?>" class="btn btn-primary"><i class="fa fa-search-plus"></i>Lihat</a>
                              <button class="btn btn-danger" data-target="#deleteUser" data-toggle="modal" data-link="<?php echo base_url('admin/pelanggan/hapus/'.$pelanggan->id_user); ?>"><i class="fa fa-trash" ></i>Hapus</button>
                            </td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                      
                  </table>
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->
            </section><!-- /.Left col -->



            <div class="modal fade modal-danger" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Hapus Pelanggan</h4>
                  </div>
                  <div class="modal-body">
                    Apakah anda ingin menghapus Pelanggan ini ?
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