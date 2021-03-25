 <!-- banner -->
    <div id="banner">
      <div class="container">
        <h2 class="title-banner">Detail Artikel</h2>  
      </div>
    </div>  

    <!-- konten blog -->
    <div id="main">
      <div class="container">
        <div class="row justify-content-center">
          <h1 class="judul-artikel"><?php echo $blog_detail->blog_title ?></h1>
        </div>
        <div class="row justify-content-center">
          <hr class="sub-line">
          <a href="#" class="kategori-blog"><?php echo $blog_detail->blog_category_name ?></a>
          <i class="tgl-blog">- <?php $date=date_create($blog_detail->blog_date);
                  echo date_format($date,"d F Y"); ?></i>
          <hr class="sub-line">
        </div>
        <div class="row justify-content-center">
          <img class="img-artikel" src="<?php echo base_url().'assets/images/img_blogs/'.$blog_detail->blog_image ?>" alt="<?php echo $blog_detail->blog_title ?>">
          <div class="col-md-12">
          <?php echo $blog_detail->blog_description ?>
          </div>
        </div>

        <div class="tags-share">
          <div class="float-left tags">
            <i class="fa fa-tags icon-tags"></i>
            <?php
                $no = 0;
                $c_tags=array();
                $c_tags=explode(",", $blog_detail->blog_tags);
                for ($i=0; $i < count($c_tags) ; $i++) { 
                # code...
                  ?>
            <a href="<?php echo base_url(); ?>search/blogs?keyword=<?php echo $c_tags[$i]; ?>" class="isi-tags"><?php echo $c_tags[$i]; ?></a>
            <?php }
                ?>

          </div>
          <div class="float-right share">
            <a href class="isi-tags">Share:</a>
            <a href="https://www.facebook.com/sharer.php?u=<?php echo base_url(); ?>blogs/detail/<?php echo $blog_detail->blog_slug; ?>" target="_blank" class="share-sosmed"><i class="fa fa-facebook icon-share"></i></a>
            <a href="https://twitter.com/share?url=<?php echo base_url(); ?>blogs/detail/<?php echo $blog_detail->blog_slug; ?>&amp;text=<?php echo $blog_detail->blog_title; ?>&amp;hashtags=Prinneo" target="_blank" class="share-sosmed"><i class="fa fa-twitter icon-share"></i></a>
            <a href="whatsapp://send?text=<?php echo base_url(); ?>blogs/detail/<?php echo $blog_detail->blog_slug; ?>" target="_blank" class="share-sosmed"><i class="fab fa-whatsapp icon-share"></i></a>
          </div>
        </div>
        <div class="row"><hr class="under-tags"></div>
        <div class="row justify-content-center">
          <div class="d-flex flex-md-row align-items-start align-items-stretch hidden-print">
            <?php if ($blog_next!=null): ?> 
            <div class="d-flex justify-content-start col">
              <a href="<?php echo base_url().'blogs/detail/'.strtolower($blog_next->blog_slug) ?>" role="button" class="btn btn-secondary btn-navigation d-flex align-items-center bg-gray-800 border-0 rounded-0 hidden-sm-down"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
              <button type="button" class="btn btn-secondary btn-navigation mr-2 bg-gray-900 text-muted border-0 rounded-0">Previous
             <br>
                <a href="<?php echo base_url().'blogs/detail/'.strtolower($blog_next->blog_slug) ?>" class="wordwrap"><?php echo $blog_next->blog_title ?> </a>
             </button>
            </div>
            <?php endif ?>
            <?php if ($blog_prev!=null): ?>
            <div class="d-flex justify-content-end ml-auto col">
              <button type="button" class="btn btn-secondary btn-navigation bg-gray-900 text-muted border-0 rounded-0">Next
             <br>
                <a href="<?php echo base_url().'blogs/detail/'.strtolower($blog_prev->blog_slug) ?>" class="wordwrap"><?php echo $blog_prev->blog_title ?> </a>
             </button>
              <a href="<?php echo base_url().'blogs/detail/'.strtolower($blog_prev->blog_slug) ?>" role="button" class="btn btn-secondary btn-navigation d-flex align-items-center bg-gray-800 border-0 rounded-0 hidden-sm-down"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
            <?php endif ?>

          </div>
        </div>

      </div>
    </div>