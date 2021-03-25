<!doctype html>
<html lang="in">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- font -->
  <script src="https://kit.fontawesome.com/bb8acd6922.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,500;0,700;1,300;1,700&family=Rubik:ital,wght@0,300;0,500;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
  <!-- owlcarousel -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/owl.carousel.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/owl.theme.default.css">
  <!-- css custom -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style_f.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/media.css">
  <link rel="icon" href="<?php echo base_url(); ?>assets/images/home/favicon.png">

  <title>Cart</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta property="og:locale" content="id_ID" />
  <meta property="og:type" content="website" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:description" content="" />
  <meta name="twitter:title" content="" />
  <meta name="twitter:site" content="@hairil_sp" />
  <meta itemprop="description" content=">">
  <meta name="twitter:description" content=">">
  <meta property="og:description" itemprop="description" content="">
  <!-- <?php echo $contacts->google_script ?> -->
  <!-- <?php echo $contacts->fb_script ?> -->
</head>
<body>
  <!-- dekstop navbar -->
  <div id="flipkart-navbar">
    <div class="container">
      <div class="row row2 ml-auto mr-auto">
        <div class="col-sm-2">
          <h1 style="margin:0px;"><span class="largenav">
            <img class="img-fluid" src="<?php echo base_url().'assets/images/home/'.$contact['contact_logo_header']; ?>" alt="logo-prinneo">
          </span></h1>
        </div>
        <form class="flipkart-navbar-search smallsearch col-lg-6 col-md-5 col-sm-6 col-xs-11" action="<?php echo base_url()?>search/products" method="GET">
            <div class="row">
              <div class="input-group">
                <input type="text" class="form-control flipkart" name="keyword" id="" placeholder="Apa yang Anda Cari?">
                <div class="input-group-append">
                  <button class="btn btn-secondary flipkart" type="submit"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </div>
        </form>
        <div class="cart largenav col-lg-4 col-md-5 col-sm-5">
          <div class="row">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="img-nav" src="<?php echo base_url(); ?>assets/images/home/bahasa-indonesia.jpg" alt="bahasa-indonesia"> Indonesia
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">
                  <img class="img-nav" src="<?php echo base_url(); ?>assets/images/home/bahasa-inggris.jpg" alt="bahasa-inggris">
                  English
                </a>
              </div>
            </li>
            <div class="garispembatas"></div>
            <li class="nav-item dropdown">
              <a class="nav-link" href="<?php echo base_url().'design/cart.php' ?>">
                <i class="fas fa-shopping-cart"></i> Keranjang
              </a>
            </li>
            <div class="garispembatas"></div>
            <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="modal" data-target="#exampleModalCenter">
                <i class="fas fa-user"></i> Login
              </a>
            </li>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- bottom -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-light main">
      <div class="container-fluid">
        <button class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
        <img class="img-fluid d-block d-sm-none" src="<?php '<?php echo base_url(); ?>'.'assets/images/home/'.$contact['contact_logo_header']; ?>" alt="logo-prinneo">
        <button class="navbar-search d-block d-sm-none" data-target="#navbarSupportedContent1" data-toggle="collapse" type="button"><i class="fas fa-search"></i></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mr-auto">
            <?php foreach ($product_categories as $product_category): ?>
              <li class="nav-item dropdown position-static dmenu">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdown" role="button"><?php echo $product_category['product_category_name'] ?></a>
                <ul class="dropdown-menu megamenu sm-menu">
                  <div class="row">
                    <li class="col-md-9">
                      <div class="row">
                        <?php foreach ($product_sub_categories as $product_sub_category): ?>
                          <?php if ($product_sub_category['product_category_id'] == $product_category['product_category_id']): ?>
                            <div class="col-4 my-2">
                              <a href="<?php echo site_url('products/sub_category/'.$product_sub_category['product_sub_category_slug']) ?>"><?php echo $product_sub_category['product_sub_category_name'] ?></a>
                            </div>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </div>
                    </li>
                    <li class="col-md-3">
                      <img class="img-fluid d-none d-sm-block" src="<?php echo base_url().'assets/images/img_product_categorys/'.$product_category['product_category_image'] ?>" alt="<?php echo $product_category['product_category_slug']; ?>">
                    </li>
                  </div>
                </ul>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!-- mobile navbar -->
  <nav class="navbar navbar-expand-lg navbar-light mainmobile">
    <div class="container-fluid">
      <button class="navbar-toggler" data-target="#navcontentmobile" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
      <img class="img-fluid d-block d-sm-none" src="<?php '<?php echo base_url(); ?>'.'assets/images/home/'.$contacts['contact_logo_header']; ?>" alt="logo-prinneo">
      <button class="navbar-search d-block d-sm-none" data-target="#navcontentmobile1" data-toggle="collapse" type="button"><i class="fas fa-search"></i></button>
      <div class="row pencarian-mobile">
        <div class="collapse navbar-collapse" id="navcontentmobile1">
          <div class="input-group">
            <input type="text" class="form-control flipkart" name="" id="" placeholder="Cari sesuatu?">
            <div class="input-group-append">
              <button class="btn btn-secondary flipkart" type="button"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      <div class="collapse navbar-collapse navkategorimobile" id="navcontentmobile">
        <?php foreach ($product_categories as $product_category): ?>
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#mobile<?php echo $product_category['product_category_id'] ?>" aria-expanded="true" aria-controls="<?php echo $product_category['product_category_id'] ?>">
                    <?php echo $product_category['product_category_name'] ?>
                  </a>
                </h4>
              </div>
              <div id="mobile<?php echo $product_category['product_category_id'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                  <?php foreach ($product_sub_categories as $product_sub_category): 
                    if ($product_sub_category['product_category_id'] == $product_category['product_category_id']): ?>
                      <a href="<?php echo site_url('products/sub_category/'.$product_sub_category['product_sub_category_slug']) ?>" class="subkategori ml-3">
                        <?php echo $product_sub_category['product_sub_category_name'] ?>
                      </a><br>
                    <?php endif;
                  endforeach; ?>

                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>


      </div>
    </div>
  </nav>
  <nav class="navbar fixed-bottom navbar-dark d-block d-sm-none" id="nav-mobile">
    <div class="row justify-content-center">
      <a class="navbar-brand" data-toggle="modal" data-target="#exampleModalCenter">Login</a>
      <a class="navbar-brand" href="#">|</a>
      <a class="navbar-brand" href="daftar.html" style="color: #FFFF00">Daftar</a>
    </div>
  </nav>
  <!-- slider mulai -->
