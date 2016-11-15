      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Admin</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li >
              <a href="<?php echo base_url(); ?>admin/dashboard">
                <i id="dashboard" class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <!-- <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li> -->
            <li id="barang" class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Barang</span>
                <span class="label label-primary pull-right">2</span>
              </a>
              <ul class="treeview-menu">
                <li id="galeri"><a href="<?php echo base_url(); ?>admin/katalog_barang"><i class="fa fa-circle-o"></i>Katalog Lelang</a></li>
                <li id="galeri"><a href="<?php echo base_url(); ?>admin/kategori_barang"><i class="fa fa-circle-o"></i>Kategori</a></li>
              </ul>
            </li>
            <li id="bidding"><a href="<?php echo base_url(); ?>admin/bidding"><i class="fa fa-shopping-cart"></i><span>Bidding</span></a></li>
            <li id="pemesanan"><a href="<?php echo base_url(); ?>admin/pemesanan"><i class="fa fa-shopping-cart"></i><span>Transaksi</span></a></li>
            <li  id="pelanggan"><a href="<?php echo base_url(); ?>admin/pelanggan"><i class="fa fa-users"></i><span>Member</span></a></li>
            <li  id="pengiriman"><a href="<?php echo base_url(); ?>admin/pengiriman"><i class="fa fa-truck"></i><span>pengiriman</span></a></li>
            <li  id="pengaturan"><a href="<?php echo base_url(); ?>admin/pengaturan"><i class="fa fa-gear"></i><span>pengaturan</span></a></li>
            <li  id="laporan"><a href="<?php echo base_url(); ?>admin/laporan"><i class="fa fa-book"></i><span>laporan</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>  

