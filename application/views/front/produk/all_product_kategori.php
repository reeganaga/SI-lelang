    <!-- SECTION HEADING -->
    <!--===============================================================-->
    <div class="section-heading-page">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="heading-page text-center-xs text-capitalize" >Kategori <?php echo $slug; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb text-right text-center-xs">
              <li>
                <a href="#">Home</a>
              </li>
              <li>Kategori</li>
              <li class="active text-capitalize"><?php echo $slug; ?></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="container mt">
      <div class="row">
        <!-- MAIN CONTENT -->
        <!--===============================================================-->
        <div class="col-sm-9 col-sm-push-3">
          <div class="row mt-20">
                <?php foreach ($arr_barang as $barang): ?>
              <?php if ($barang->status=="aktif"): ?>
                <div class="col-sm-4 mt-20">
                  <!--Katalog barang -->
                    <div class="shop-box bordered">
                      <a href="<?php echo site_url('item/'.$barang->slug_barang); ?>" class="img-box text-theme">
                        <img class="img-responsive" src="<?php echo base_url('assets/uploads/barang/'.$barang->gambar); ?>" alt="<?php echo $barang->nama_barang; ?>" title="<?php echo $barang->nama_barang; ?>">
                      </a>
                      <h3 class="title-sm text-theme text-theme-sm" title="<?php echo $barang->nama_barang; ?>"><a href="<?php echo site_url('item/'.$barang->slug_barang); ?>"><?php echo $barang->nama_barang; ?></a></h3>
                      <p class="text-theme-sm"><?php echo substr($barang->deskripsi, 0,30); ?></p>
                      <h3 class="shop-price text-theme-sm">Rp <?php echo $barang->harga; ?></h3>
                      <a class="btn btn-primary btn-tiny btn-sm text-theme-sm" href="<?php echo site_url('produk/addtocart/'.$barang->id_barang); ?>"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      <a class="btn btn-primary btn-tiny btn-sm text-theme-sm" href="<?php echo site_url('item/'.$barang->slug_barang); ?>"><i class="fa fa-angle-right"></i>Details</a>
                    </div>              
                </div>
              <?php endif ?>
                <?php endforeach ?>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <ul class="pagination pagination-lg mt-50">
                <?php echo $pagination; ?>
                <!-- <li class="active">
                  <a href="#">1</a>
                </li>
                <li>
                  <a href="#">2</a>
                </li>
                <li>
                  <a href="#">3</a>
                </li>
                <li>
                  <a href="#">4</a>
                </li>
                <li>
                  <a href="#">Next Page »</a>
                </li> -->
              </ul>
            </div>
          </div>
        </div>
        <!-- SIDEBAR -->
        <!--===============================================================-->
        <div class="col-sm-3 col-sm-pull-9">
          <div class="row-heading">
            <div class="col-sm-12">
              <h3 class="title-sm hr-left text-uppercase">Produk Kita</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <ul class="list-group">
                <?php foreach ($arr_kategori as $kategori): ?>                  
                <li class="list-group-item"><a href="<?php echo site_url('kategori/'.$kategori->slug) ?>"><?php echo $kategori->nama_kategori; ?></a></li>
                <?php endforeach ?>
              </ul>
            </div>
          </div>
          <div class="row-heading">
            <div class="col-sm-12">
              <h3 class="title-sm hr-left text-uppercase">Keunggulan</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="icon-box bordered">
                <i class="fa fa-truck fa-3x text-theme"></i>
                <h3 class="title-sm text-theme">Pengiriman Cepat</h3>
                <p class="text-theme">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div>
              <div class="icon-box bordered mt-20">
                <i class="fa fa-certificate fa-3x text-theme"></i>
                <h3 class="title-sm text-theme">Garansi</h3>
                <p class="text-theme">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div>
            </div>
          </div>
          <!-- <div class="row-heading">
            <div class="col-sm-12">
              <h3 class="title-sm hr-left text-uppercase">Tags</h3>
            </div>
          </div> -->
          <!-- <div class="row">
            <div class="col-sm-12 col-tags">
              <a class="btn btn-xs btn-default" href="#"><i class="fa fa-tags"></i>Laptops</a>
              <a class="btn btn-xs btn-default" href="#"><i class="fa fa-tags"></i>Acer</a>
              <a class="btn btn-xs btn-default" href="#"><i class="fa fa-tags"></i>Sony</a>
              <a class="btn btn-xs btn-default" href="#"><i class="fa fa-tags"></i>Intel</a>
              <a class="btn btn-xs btn-default" href="#"><i class="fa fa-tags"></i>Lenovo</a>
              <a class="btn btn-xs btn-default" href="#"><i class="fa fa-tags"></i>Pc Case</a>
              <a class="btn btn-xs btn-default" href="#"><i class="fa fa-tags"></i>Laptops</a>
              <a class="btn btn-xs btn-default" href="#"><i class="fa fa-tags"></i>Acer</a>
              <a class="btn btn-xs btn-default" href="#"><i class="fa fa-tags"></i>Sony</a>
              <a class="btn btn-xs btn-default" href="#"><i class="fa fa-tags"></i>Intel</a>
              <a class="btn btn-xs btn-default" href="#"><i class="fa fa-tags"></i>Lenovo</a>
              <a class="btn btn-xs btn-default" href="#"><i class="fa fa-tags"></i>Pc Case</a>
            </div>
          </div> -->
        </div>
      </div>
    </div>