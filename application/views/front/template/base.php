<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from mamoot-themes.com/theme-preview/z-theme-1-2/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 29 May 2016 05:04:42 GMT -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php if ($this->uri->segment(1)=='member' or $this->uri->segment(1)=='admin'): ?>
  <meta name="robots" content="noindex, follow, noodp, noydir" />
  <?php else: ?>
  <meta name="robots" content="index, follow, noodp, noydir" />
  <?php endif ?>

  <!-- custom stylesheet -->
  <?php if (isset($title)): ?>
    <title ><?php echo $title; ?> | CV Mandiri</title>
  <?php elseif($this->uri->segment(1)=='item' or $this->uri->segment(1)=='kategori'): ?>
    <title ><?php echo $title_new; ?> | CV Mandiri</title>
  <?php elseif($this->uri->segment(1)==''): ?>
    <title ><?php echo $meta->meta_title; ?></title>
  <?php else: ?>
    <title>CV Mandiri</title>
  <?php endif ?>
  <!-- end custom stylesheet -->
  <link rel="icon" href="<?php echo base_url(); ?>assets/front/assets/images/favicon.ico">
  <!-- <script src="<?php echo base_url(); ?>assets/front/assets/js/page/carousel-preload.js"></script> -->

  <!--[if IE 8]><html class="ie8"><![endif]-->
  <!-- Bootstrap -->
  <link href="<?php echo base_url(); ?>assets/front/css/bootstrap.min.css" rel="stylesheet">
  <!-- Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700,800,300' rel='stylesheet' type='text/css'>
  <link href="<?php echo base_url(); ?>assets/dist/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Plugins -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/assets/css/magnific-popup.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/assets/css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/assets/css/owl.theme.css">
  <!-- Theme -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/assets/css/carousel-animate.css">
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/assets/css/theme.css" id="color-style"> -->


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- custom stylesheet -->
  <?php 
  if (isset($_stylesheet)) {
    echo $_stylesheet;
  }
   ?>
  <!-- end custom stylesheet -->

  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/assets/css/theme-blue-2.css" id="color-style">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/assets/css/custom.css" id="color-style">
</head>

<body class="">
  <div class="wrapper-body">

<!-- BAGIAN HEADER -->
<?php echo $_header; ?>
<!-- END BAGIAN HEADER -->

<!-- BAGIAN KONTEN -->
<?php echo $_content; ?>
<!-- END BAGIAN KONTEN -->

<!-- BAGIAN FOOTER -->
<?php echo $_footer; ?>
<!-- END BAGIAN FOOTER -->

  </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
  <script src="<?php echo base_url(); ?>assets/front/js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?php echo base_url(); ?>assets/front/js/bootstrap.min.js"></script>

  <!-- <script src="<?php echo base_url(); ?>assets/front/assets/js/owl.carousel.js"></script> -->
  <script src="<?php echo base_url(); ?>assets/front/assets/js/jquery.magnific-popup.js"></script>
  <script src="<?php echo base_url(); ?>assets/front/assets/js/jquery.waypoints.js"></script>
  <script src="<?php echo base_url(); ?>assets/front/assets/js/jquery.countTo.js"></script>
  <script src="<?php echo base_url(); ?>assets/front/assets/js/page/theme.js"></script>
  <!--<script src="<?php echo base_url(); ?>assets/front/assets/js/page/page.home.js"></script>-->
  <script src="style-switcher/style-switcher.js"></script>


<!-- BAGIAN CUSTOM JAVASCRIPT -->
<?php 
if (isset($_javascript)) {
  echo $_javascript;
} 
?>
<!-- END BAGIAN CUSTOM JAVASCRIPT -->
  <!-- <script id="shrink" src="<?php echo base_url(); ?>assets/front/assets/js/page/page.navbar-fixed-shrinked.js"></script> -->


</body>


<!-- Mirrored from mamoot-themes.com/theme-preview/z-theme-1-2/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 29 May 2016 05:05:45 GMT -->
</html>
