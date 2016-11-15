      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Katalog Barang
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <a style="margin-bottom: 10px" href="<?php echo base_url('admin/katalog_barang/tambah'); ?>" class="btn btn-default"><i class="fa fa-plus"></i>Tambah</a>
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
                  <h3 class="box-title">Daftar Barang</h3>
                </div>
                <div class="box-body">
                  <table id="tablePelanggan" class="table table-bordered table-hover" >
                    <thead>
                    <tr>
                      <th>KODE</th>
                      <th>Nama Barang</th>
                      <th>Update</th>
                      <th>jumlah</th>
                      <th>harga</th>
                      <th>Kategori</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($arr_barang as $barang): ?>
                        <tr>
                            <td>BRG<?php echo $barang->id_barang; ?></td>
                            <td><?php echo $barang->nama_barang; ?></td>
                            <td><?php echo $barang->tgl_expired; ?></td>
                            <td><?php echo $barang->jumlah_barang; ?></td>
                            <td><?php echo $barang->harga; ?></td>
                            <td><?php echo $barang->nama_kategori; ?></td>
                            <td>
                              <?php if ($barang->status=='open'): ?>
                                <a class="btn btn-primary">
                                  <?php echo $barang->status; ?>
                                </a>
                              <?php elseif($barang->status=='bidding'): ?>
                                <a class="btn btn-info">
                                  <?php echo $barang->status; ?>
                                </a>
                              <?php else: ?>
                                <a class="btn btn-success">
                                  <?php echo $barang->status; ?>
                                </a>
                              <?php endif ?>
                            </td>
                            <td>
                              <a href="<?php echo base_url('admin/katalog_barang/detail/'.$barang->id_barang); ?>" class="btn btn-primary"><i class="fa fa-search-plus"></i>Lihat</a>
                              <button class="btn btn-danger" data-target="#deleteUser" data-toggle="modal" data-link="<?php echo base_url('admin/katalog_barang/hapus/'.$barang->id_barang); ?>"><i class="fa fa-trash" ></i>Hapus</button>
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
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->