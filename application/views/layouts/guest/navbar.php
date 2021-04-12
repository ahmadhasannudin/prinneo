<body>
  <!-- dekstop navbar -->
  <div id="flipkart-navbar">
    <div class="container">
      <div class="row row2 ml-auto mr-auto">
        <div class="col-sm-2">
          <a href="<?php echo base_url() . 'home' ?>">
            <h1 style="margin:0px;">
              <span class="largenav">
                <img class="img-fluid" src="<?php echo base_url() . 'assets/images/home/' . $contacts->contact_logo_header; ?>" alt="logo-prinneo">
              </span>
            </h1>
          </a>
        </div>
        <form class="flipkart-navbar-search smallsearch col-lg-6 col-md-5 col-sm-6 col-xs-11" action="<?php echo base_url('search/products') ?>" method="GET">
          <div class="row">
            <div class="input-group">
              <input type="text" class="form-control flipkart" name="keyword" placeholder="Apa yang Anda Cari?">
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
              <a class="nav-link" href="<?php echo base_url() . 'cart' ?>">
                <i class="fas fa-shopping-cart"></i> Keranjang
                <?php $keranjang = count($this->cart->contents());
                if ($keranjang > 0) : ?>
                  <span class="badge badge-secondary"><?php echo $keranjang ?></span>
                <?php endif ?>
              </a>
            </li>
            <div class="garispembatas"></div>
            <?php if ($this->session->userdata('user_name') == null) : ?>
              <li class="nav-item dropdown">
                <!-- <a class="nav-link" data-toggle="modal" data-target="#exampleModalCenter" style="cursor: pointer;">
                <i class="fas fa-user"></i> Login
              </a> -->
                <a class="nav-link" href="<?php echo base_url() . 'login' ?>" style="cursor: pointer;">
                  <i class="fas fa-user"></i> Login
                </a>
              </li>
            <?php else : ?>
              <li class="nav-item dropdown">
                <a class="nav-link" href="<?php echo base_url() . 'login' ?>" style="cursor: pointer;">
                  <i class="fas fa-user"></i> Profil
                </a>
              </li>
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- bottom -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-light main" style="background-color: whitesmoke">
      <div class="container-fluid">
        <button class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
        <img class="img-fluid d-block d-sm-none" src="<?php echo base_url() . 'assets/images/home/' . $contacts->contact_logo_header; ?>" alt="logo-prinneo">
        <button class="navbar-search d-block d-sm-none" data-target="#navbarSupportedContent1" data-toggle="collapse" type="button"><i class="fas fa-search"></i></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mr-auto">
            <?php foreach ($product_categorys as $product_category) : ?>
              <li class="nav-item dropdown position-static dmenu">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdown" role="button"><?php echo $product_category->product_category_name ?></a>
                <ul class="dropdown-menu megamenu sm-menu">
                  <div class="row">
                    <li class="col-md-9">
                      <div class="row">
                        <?php foreach ($product_sub_categorys as $product_sub_category) : ?>
                          <?php if ($product_sub_category->product_category_id == $product_category->product_category_id) : ?>
                            <div class="col-4 my-2">
                              <a href="<?php echo site_url('products/sub_category/' . strtolower($product_sub_category->product_sub_category_slug)) ?>"><?php echo $product_sub_category->product_sub_category_name ?></a>
                            </div>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </div>
                    </li>
                    <li class="col-md-3">
                      <img class="img-fluid d-none d-sm-block" src="<?php echo base_url('assets/images/img_product_categorys/' . $product_category->product_category_image) ?>" alt="<?php echo $product_category->product_category_slug; ?>">
                      <p><?php echo $product_category->product_category_desk; ?></p>
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
      <img class="img-fluid d-block d-sm-none" src="<?php echo base_url() . 'assets/images/home/' . $contacts->contact_logo_header; ?>" alt="logo-prinneo" style="max-width: 160px">
      <button class="navbar-search d-block d-sm-none" data-target="#navcontentmobile1" data-toggle="collapse" type="button"><i class="fas fa-search"></i></button>
      <div class="row pencarian-mobile">
        <form action="<?php echo base_url('search/products') ?>" method="GET">
          <div class="collapse navbar-collapse" id="navcontentmobile1">
            <div class="input-group">
              <input type="text" class="form-control flipkart" name="keyword" placeholder="Cari sesuatu?">
              <div class="input-group-append">
                <button class="btn btn-secondary flipkart" type="submit"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="collapse navbar-collapse navkategorimobile" id="navcontentmobile">
        <?php foreach ($product_categorys as $product_category) : ?>
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#mobile<?php echo $product_category->product_category_id ?>" aria-expanded="true" aria-controls="<?php echo $product_category->product_category_id ?>">
                    <?php echo $product_category->product_category_name ?>
                  </a>
                </h4>
              </div>
              <div id="mobile<?php echo $product_category->product_category_id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                  <?php foreach ($product_sub_categorys as $product_sub_category) :
                    if ($product_sub_category->product_category_id == $product_category->product_category_id) : ?>
                      <a href="<?php echo site_url('products/sub_category/' . $product_sub_category->product_sub_category_slug) ?>" class="subkategori ml-3">
                        <?php echo $product_sub_category->product_sub_category_name ?>
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
      <a class="navbar-brand" href="<?php echo base_url() . 'daftar' ?>" style="color: #ffc107;">Daftar</a>
    </div>
  </nav>
  <!-- slider mulai -->