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