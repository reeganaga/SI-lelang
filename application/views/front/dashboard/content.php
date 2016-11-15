    <!-- SECTION Judul-->
    <!--===============================================================-->
    <div class="section-heading-page">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="heading-page text-center-xs">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb text-right text-center-xs">
              <li>
                <a href="#">Home</a>
              </li>
              <li class="active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

<!-- SECTION KONTEN -->
    <div class="container">
      <div class="row">
        <!-- SIDE NAV -->
        <!--===============================================================-->
        <?php $this->load->view('front/template/menu_member'); ?>
        <!-- END SIDE NAV -->

        <!-- CONTENT COLUMN -->
        <!--===============================================================-->
        <div class="col-md-9">
          <?php foreach ($arr_user as $user): ?>   
            <div class="row">
              <div class="col-md-12">
                <h3 class="title-v2">Selamat Datang <?php echo $user->nama_lengkap; ?></h3>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Informasi Akun anda</h3>
                  </div>
                  <div class="panel-body">
                    <div class="col-md-12">
                      <h3 class="text-theme title-sm hr-before"><i class="fa fa-user margin-r-10"></i>Username</h3>
                      <p class="text-theme"><?php echo $user->username; ?></p>
                      <h3 class="text-theme title-sm hr-before"><i class="fa fa-envelope margin-r-10"></i>Email</h3>
                      <p class="text-theme">
                          <?php echo $user->email; ?>
                      </p>
                      <h3 class="text-theme title-sm hr-before"><i class="fa fa-home margin-r-10"></i>Alamat</h3>
                      <p class="text-theme">
                        <?php if (empty($user->alamat)): ?>
                          isi Terlebih dahulu di <a href="<?php echo site_url('member/pengaturan'); ?>">Pengaturan</a>
                        <?php else: ?>
                          <?php echo $user->alamat; ?>
                        <?php endif ?>
                      </p>
                      <h3 class="text-theme title-sm hr-before"><i class="fa fa-phone margin-r-10"></i>No Hp</h3>
                      <p class="text-theme">
                        <?php if (empty($user->no_hp)): ?>
                          isi Terlebih dahulu di <a href="<?php echo site_url('member/pengaturan'); ?>">Pengaturan</a>
                        <?php else: ?>
                          <?php echo $user->no_hp; ?>
                        <?php endif ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach ?>
          <hr class="hr-divider-ghost">


        </div>
      </div>
    </div>
<!-- END SECTION KONTEN -->