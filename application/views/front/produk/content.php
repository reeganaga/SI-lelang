    <!--SECTION -->
    <!--===============================================================-->
    <div class="section-heading-page">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <ol class="breadcrumb text-right text-center-xs">
              <li>
                <a href="#">Home</a>
              </li>
                <?php foreach ($arr_kategori as $kategori): ?>
                  
                <?php endforeach ?>
              <?php foreach ($arr_barang as $row): ?>
                <li class="text-capitalize"><?php echo $kategori->nama_kategori; ?></li>
                <li>Item</li>
                <li class="active text-capitalize"><?php echo $row->nama_barang; ?></li>
              <?php endforeach ?>
              <!-- <li class="active text-capitalize"><?php echo $slug; ?></li> -->
            </ol>
          </div>
        </div>
      </div>
    </div>


    <div class="container" style="margin-bottom: 20px;">
      <div class="row">
        <!-- SIDEBAR -->
        <!--===============================================================-->
        <div class="col-md-3">
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
        </div>
        <!-- MAIN CONTENT -->
        <!--===============================================================-->
        <div class="col-md-9">
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

          <?php foreach ($arr_barang as $barang): ?>
          <div class="row">
            <div class="col-sm-5">
              <div class="row">
                <div class="col-sm-12">
                  <!-- SLIDER -->
                  <div id="container-mixitup">
                    <div class="row text-center">
                      <div class="mix logo allcol-xs-12">
                        <a href="<?php echo base_url('assets/uploads/barang/'.$barang->gambar); ?>" class="img-wrapper">
                          <img class="img-responsive" src="<?php echo base_url('assets/uploads/barang/'.$barang->gambar); ?>" alt="<?php echo $barang->nama_barang; ?>" title="<?php echo $barang->nama_barang; ?>">
                        </a>
                      </div>
                    </div>
                  </div>                  
                  <!-- SLIDER END-->
                </div>
              </div>
            </div>
            <!-- CONTENT -->
            <!--===============================================================-->
            <div class="col-md-7 col-sm-7">
              <div class="shop-item-description">
                <h1 class="title-lg text-theme-sm" title="<?php echo $barang->nama_barang; ?>"><?php echo $barang->nama_barang; ?></h1>
                <p class="text-theme-sm"><small>Kategori : <?php echo $kategori->nama_kategori; ?></small>
                <p class="text-theme-sm"><small>Harga Awal : Rp <?php echo number_format($barang->harga, 0,'.','.'); ?></small>
                </p>
                <div class="wrapper-shop-review text-theme-sm text-theme">
                  <div class="stars-feedback colored">
                    <i class="fa fa-star text-theme-sm"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                </div>
                <hr>
                <p>Penawaran Tertinggi</p>
                <h3 class="title-lg text-theme title-lg-shop-item"> Rp <?php echo number_format($barang->harga_deal, 0,'.','.'); ?></h3>
                <br>
                <p>Tanggal Berakhir</p>
                <h3 class="title-sm text-theme title-sm-shop-item"><?php $date_exp = date_create($barang->tgl_expired); echo date_format($date_exp,'d F Y - H:i:s') ; ?></h3>
                <br>
                <dl>
                  <dd class="text-justify"><?php echo $barang->deskripsi; ?></dd>
                </dl>
                <span class="input-group-btn">
                <button data-idbarang="<?php echo $barang->id_barang; ?>" data-slug="<?php echo $barang->slug_barang; ?>" type="submit" data-toggle="modal" data-target="#modal-bidding" class="btn btn-primary btn-z-index"><i class="fa fa-thumbs-up"></i>Bid Sekarang</button>
                </span>
              </div>
            </div>
          </div>
          <div class="row mt-20 mb-30">
            <div class="col-sm-12">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs nav-tabs-shop" role="tablist">
                <li class="active">
                  <a href="#bidder" role="tab" data-toggle="tab">Bidder</a>
                </li>
                <li>
                  <a href="#specifications" role="tab" data-toggle="tab">Specifications</a>
                </li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content tab-content-shop">
                <div class="tab-pane fade in active tab-shop-item" id="bidder">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Jumlah Bidding</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($arr_bidder as $bidder): ?>
                        <tr>
                          <td><?php echo $bidder->nama_lengkap; ?></td>
                          <td><?php $date_bidding = date_create($bidder->tgl_bidding); echo date_format($date_bidding,'d F Y - H:i'); ?></td>
                          <td>Rp <?php echo number_format($bidder->jml_bidding,0,'','.'); ?></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane fade in tab-shop-item" id="specifications">
                  <table class="table table-striped">
                    <tbody>
                      <tr>
                        <td>Berat</td>
                        <td><?php echo $barang->berat; ?> KG</td>
                      </tr>
                      <tr>
                        <td>Tinggi</td>
                        <td><?php echo $barang->tinggi; ?> CM</td>
                      </tr>
                      <tr>
                        <td>Lebar</td>
                        <td><?php echo $barang->lebar; ?> CM</td>
                      </tr>
                      <tr>
                        <td>Panjang</td>
                        <td><?php echo $barang->panjang; ?> CM</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach ?>
          <div class="row">
            <div class="col-sm-12">
              <h3 class="title-md hr-left">Produk Terkait</h3>
                <!--Katalog barang terkait -->
                <?php foreach ($arr_terkait as $terkait): ?>  
                <div class="col-sm-4 mt-20">
                  <div class="shop-box bordered">
                    <a href="<?php echo site_url('item/'.$terkait->slug); ?>" class="img-box text-theme">
                      <img class="img-responsive" src="<?php echo base_url('assets/uploads/barang/'.$terkait->gambar); ?>" alt="<?php echo $terkait->nama_barang; ?>" title="<?php echo $terkait->nama_barang; ?>">
                    </a>
                    <h2 class="title-sm text-theme text-theme-sm" title="<?php echo $terkait->nama_barang; ?>"><a href="<?php echo site_url('item/'.$terkait->slug); ?>"><?php echo $terkait->nama_barang; ?></a></h2>
                    <p class="text-theme-sm"><small><?php echo substr($terkait->deskripsi,30); ?></small>
                    </p>
                    <h3 class="shop-price text-theme-sm">Rp <?php echo number_format($terkait->harga,0,'.','.'); ?></h3>
                    <a class="btn btn-primary btn-tiny btn-sm text-theme-sm" href="<?php echo site_url('produk/addtocart/'.$terkait->id_barang); ?>"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    <a class="btn btn-primary btn-tiny btn-sm text-theme-sm" href="<?php echo site_url('item/'.$terkait->slug); ?>"><i class="fa fa-angle-right"></i>Details</a>
                  </div>
                </div>                         
                <?php endforeach ?>

            </div>
          </div>

        </div>
      </div>
    </div>

 <!-- Modal -->
<div class="modal fade" id="modal-bidding" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="form" action="<?php echo site_url(); ?>produk/bidding" method="post" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Bidding</h4>
        </div>
        <div class="modal-body">
            <div class="input-group">
              <input type="text" name="jml_bidding" class="form-control" placeholder="Jumlah Nomimal Bidding">
              <input type="text" name="id_barang" id="modal_id_barang">
              <input type="text" name="slug_barang" id="modal_slug_barang">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="send_bidding">Bid Sekarang</button>
        </div>
      </div>
    </form>
  </div>
</div>