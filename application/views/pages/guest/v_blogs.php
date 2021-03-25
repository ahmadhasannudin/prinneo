<!-- banner -->
<div id="banner">
  <div class="container">
    <h2 class="title-banner">Artikel</h2>  
  </div>
</div>  

<!-- konten blog -->
<div id="main">
  <div class="container">
    <div class="row">
      <!-- kategori dekstop -->
      <div class="col-md-3 d-none d-sm-block">
        <div class="row">
          <h3 class="title-main">Cari</h3>
            <form action="<?php echo base_url('search/products')?>" method="GET">
                <div class="input-group">
                  <input type="text" class="form-control flipkart" name="keyword" id="" placeholder="Apa yang Anda Cari?">
                  <div class="input-group-append">
                    <button class="btn btn-secondary flipkart" type="submit"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </form>      
          </div><br>

          <div class="row">
            <h3 class="title-main">Kategori</h3>
          </div>
          <div class="row">
            <h4>
              <?php foreach ($blog_categorys as $key => $value): ?>
              <a href="<?php echo base_url().'blogs/categorys/'.strtolower($value->blog_category_slug) ?>" class="link-kategori-main"><?php echo $value->blog_category_name ?></a> <br>
              <?php endforeach ?>
            </h4>
          </div>
        </div> 

        <div class="col-md-9">
          <div class="row">
            <?php foreach ($blog_list as $key => $value): ?> 
              <div class="col-md-4 box-shadow">
                <div class="card" style="border-radius: 10px; border: 1px solid #b5b5b5;">
                  <img class="card-img-top" src="<?php echo base_url().'assets/images/img_blogs/'.$value->blog_image ?>" alt="<?php echo $value->blog_slug ?>" style="border-top-left-radius: 9px;  border-top-right-radius: 9px;">
                  <div class="card-body" style="height: 160px;">
                    <div class="float-none">
                      <a href="<?php echo base_url().'blogs/detail/'.strtolower($value->blog_slug) ?>" class="judul-blog" style="font-size: 16px" title="<?php echo $value->blog_title ?>"><?php echo character_limiter($value->blog_title,50) ?></a>
                    </div>
                    <div class="float-left">
                      <a href="#" class="kategori-blog"><?php echo $value->blog_category_name ?></a>
                      <i class="tgl-blog">- <?php $date=date_create($value->blog_date);
                  echo date_format($date,"d F Y"); ?></i>
                    </div>
                    <div class="float-right">
                      <a href="<?php echo base_url().'blogs/detail/'.strtolower($value->blog_slug) ?>" class="baca-blog">Selengkapnya</a>
                    </div>
                  </div>
                </div>
              </div>             
            <?php endforeach ?>

          </div>    
        </div>

        <!-- kategori mobile -->
        <div class="col-md-3 kategori-mobile d-block d-sm-none">
          <div class="row">
            <div class="col-md-12">
            <h3 class="title-main">Cari</h3>
            </div>
            <div class="col-md-12"> 
              <form action="<?php echo base_url('search/blogs')?>" method="GET">
                <div class="input-group">
                  <input type="text" class="form-control flipkart" name="keyword" id="" placeholder="Apa yang Anda Cari?">
                  <div class="input-group-append">
                    <button class="btn btn-secondary flipkart" type="submit"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </form>  
            </div>
            </div><br>

            <div class="row">
              <h3 class="title-main">Kategori</h3>
            </div>
            <div class="row">
              <h4>
                <?php foreach ($blog_categorys as $key => $value): ?>
              <a href="<?php echo base_url().'blogs/categorys/'.strtolower($value->blog_category_slug) ?>" class="link-kategori-main"><?php echo $value->blog_category_name ?></a> <br>
              <?php endforeach ?>
              </h4>
            </div>
          </div> 

        </div>
      </div>
    </div>
