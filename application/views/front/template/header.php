    <!-- NAVBAR -->
    <!--===============================================================-->
    <div id="header">
      <nav id="nav" class="navbar navbar-default navbar-static-top">
        <div class="menu-top menu-top-inverse">
          <div class="container">
            <div class="row">
              <div class="col-sm-12 col-xs-12">
                <div class="pull-right">
                  <?php if ($this->session->userdata('level') == 'member'): ?>
                    <a class="btn-menu-top" href="<?php echo site_url('member/dashboard'); ?>"><i class="fa fa-dashboard margin-r-10"></i>Dashboard</a>
                    <a class="btn-menu-top" href="<?php echo site_url('member/pengaturan'); ?>"><i class="fa fa-gear margin-r-10"></i>Pengaturan</a>
                    <a class="btn-menu-top" href="<?php echo site_url('auth/logout'); ?>"><i class="fa fa-sign-out margin-r-10"></i>Keluar</a>
                  <?php else: ?>
                    <a class="btn-menu-top" href="<?php echo site_url('daftar'); ?>"><i class="fa fa-users margin-r-10"></i>Daftar</a>
                    <a class="btn-menu-top" href="<?php echo site_url('auth'); ?>"><i class="fa fa-sign-in margin-r-10"></i>Masuk</a>
                  <?php endif ?>
                </div>
                <div class="list-inline social-icons-menu-top pull-right">
                  <a href="#" class="social-hover-v1 a-facebook"></a>
                  <a href="#" class="social-hover-v1 a-google"></a>
                </div>
                
                  
              </div>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url(); ?>">
              <img class="img-responsive logo-top" src="<?php echo base_url(); ?>assets/front/assets/images/logo/logo-kecil.png" alt="theme-img">
              <h3 class="text-theme title-xl font-logo">SUPER POP UP</h3>
            </a>
          </div>

          <div id="navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav navbar-right">
              <li>
                <a href="<?php echo site_url(); ?>">Home</a>
              </li>
              <li>
                <a href="<?php echo site_url('produk'); ?>">Semua Produk</a>
              </li>
              <li>
                <a href="<?php echo site_url('cara-pesan'); ?>">Cara Pemesanan</a>
              </li>

              <li class="li-search">
                <form class="nav-search" action="<?php echo site_url(); ?>produk/search/">
                  <label for="focus-input"><i class="fa fa-search"></i></label>
                  <input id="focus-input" class="container" type="search" name="s" placeholder="To Search, Type and Hit Enter">
                </form>
              </li>

            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
    </div>
    <!-- NAVBAR END -->    
