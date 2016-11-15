    <!-- NAVBAR -->
    <!--===============================================================-->
    <div id="header">
      <nav id="nav" class="navbar navbar-default navbar-static-top">
        <div class="menu-top menu-top-inverse">
          <div class="container">
            <div class="row">
              <div class="col-sm-12 col-xs-12">
                  <div class="dropdown dropdown-cart pull-right">
                    <button class="btn-menu-top hidden-xs" id="dShop" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-cart"></i> Cart (<?php echo count($this->cart->contents()); ?>)</button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-cart stop-prop" role="menu" aria-labelledby="dShop">
                      <div class="panel-shopping-cart">
                        <table class="table">
                          <thead>
                            <tr>
                              <th class="text-center"><i class="fa fa-shopping-cart"></i></th>
                              <th>Product Name</th>
                              <th>Quantity</th>
                              <th>Total</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                          <form action="<?php echo site_url('produk/updatecart'); ?>" method="post">
                            <?php foreach ($this->cart->contents() as $cart): ?>
                            <tr>
                              <td class="table-first"><img class="img-responsive" src="<?php echo base_url(); ?>assets/uploads/barang/<?php echo $cart['gambar']; ?>" alt="theme-img"></td>
                              <td><span class="title"><?php echo $cart['name']; ?></span></td>
                              <td><input type="number" name="qty[]" class="form-control" maxlength="3" style="width: 70px;"  max="<?php echo $cart['jumlah_barang']; ?>" value="<?php echo $cart['qty']; ?>"></td>
                              <td><span>Rp <?php echo number_format($cart['subtotal'], 2); ?></span></td>
                              <td class="close-cart"><a href="<?php echo site_url('produk/removecart/'.$cart['rowid']); ?>" class="btn btn-primary btn-sm"><i class="fa fa-times"></i></a></td>

                              <input type="hidden" name="rowid[]" value="<?php echo $cart['rowid']; ?>"></input>
                            </tr>
                            <?php endforeach ?>
                          </tbody>
                        </table>
                        <div class="panel-footer">
                          <div class="row">
                            <div class="col-sm-3">
                              <!-- <a href="#" class="btn btn-default btn-sm">Continue Shopping</a> -->
                            </div>
                            <div class="col-sm-9 text-right">
                              <button type="submit" class="btn btn-default btn-sm">Update Cart</button>
                              <?php if ($this->session->userdata('level') == 'member'): ?>
                                <a href="<?php echo site_url('member/keranjang'); ?>" class="btn btn-primary btn-sm">Procceed to checkout</a>
                              <?php else: ?>  
                                <a href="<?php echo site_url('auth'); ?>" class="btn btn-primary btn-sm">Procceed to checkout</a>
                              <?php endif ?>
                            </div>
                          </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
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
