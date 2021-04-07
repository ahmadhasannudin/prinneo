<!-- slider mulai -->
<div id="slider">
  <div id="dicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <?php $sl = 1;
      foreach ($sliders as $key => $slider) : ?>
        <?php if ($key == '0') : ?>
          <li data-target="#dicators" data-slide-to="<?php echo $sl ?>" class="active"></li>
        <?php else : ?>
          <li data-target="#dicators" data-slide-to="<?php echo $sl ?>"></li>
        <?php endif; ?>
      <?php $sl++;
      endforeach; ?>


    </ol>
    <div class="carousel-inner">
      <?php foreach ($sliders as $key => $slider) : ?>
        <?php if ($key == '0') : ?>
          <div class="carousel-item active">
            <img class="d-block w-100" src="<?php echo base_url('assets/images/img_sliders/' . $slider->slider_image); ?>" alt="<?php echo $slider->slider_image_meta ?>">
            <div style="width:100%;bottom: 10%;position: absolute;">
              <center>
                <a class="btn btn-dark btn-sm-hidden" href="<?php echo $slider->slider_link ?>" target="_blank"><?php echo $slider->slider_caption ?></a>
              </center>
            </div>
          </div>
        <?php else : ?>
          <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo base_url('assets/images/img_sliders/' . $slider->slider_image); ?>" alt="<?php echo $slider->slider_image_meta ?>">
            <div style="width:100%;bottom: 10%;position: absolute;">
              <center>
                <a class="btn btn-dark btn-sm-hidden" href="<?php echo $slider->slider_link ?>" target="_blank"><?php echo $slider->slider_caption ?></a>
              </center>
            </div>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
    <a class="carousel-control-prev" href="#dicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#dicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div id="pembuka">
  <div class="container">
    <!-- dekstop -->
    <div class="row d-none d-sm-block">
      <img class="img-fluid" src="<?php echo base_url(); ?>assets/images/home/kelebihan-layanan.png" alt="kelebihan-layanan.png">
      <p class="desc-pembuka">Dikerjakan dengan team berpengalaman,mesin dan peralatan yang canggih.melayani pengiriman keseluruh wilayah Indonesia. <br> <b>Prinneo</b> akan selalu memprioritaskan kepuasan anda. </p>
    </div>
    <!-- mobile -->
    <div class="row d-block d-sm-none">
      <div class="owl-carousel pembuka-mobile owl-theme">
        <div class="item">
          <center>
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/layanan-1.png" alt="layanan-prinneo">
          </center>
        </div>
        <div class="item">
          <center>
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/layanan-2.png" alt="layanan-prinneo">
          </center>
        </div>
        <div class="item">
          <center>
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/layanan-3.png" alt="layanan-prinneo">
          </center>
        </div>
        <div class="item">
          <center>
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/layanan-4.png" alt="layanan-prinneo">
          </center>
        </div>
        <div class="item">
          <center>
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/layanan-5.png" alt="layanan-prinneo">
          </center>
        </div>
      </div>
      <p class="desc-pembuka">Dikerjakan dengan team berpengalaman,mesin dan peralatan yang canggih.melayani pengiriman keseluruh wilayah Indonesia. <br> <b>Prinneo</b> akan selalu memprioritaskan kepuasan anda. </p>

    </div>
  </div>
  <div class="container">
    <div class="row">
      <center></center>
    </div>
  </div>
</div>

<!-- kategori -->
<div id="kategori">
  <div class="container">
    <h2 class="subtitle">Kategori Produk</h2>
    <div class="row">
      <?php foreach ($product_categorys as $product_category) : ?>
        <div class="col-md-4">
          <a href="<?php echo base_url() . 'products/category/' . strtolower($product_category->product_category_slug) ?>" class="card-link">
            <div class="card">
              <img class="card-img-top" src="<?php echo base_url('assets/images/img_product_categorys/' . $product_category->product_category_image) ?>" alt="<?php echo $product_category->product_category_slug ?>">
              <div class="card-body">
                <h5 class="card-title"><?php echo $product_category->product_category_name ?></h5>
                <p class="card-text">Mulai dari Rp 15.000</p>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <br>
  <div class="container">
    <h2 class="subtitle">Produk Best Seller</h2>
    <div class="row">

      <!-- <div class="col-md-4">
            <div class="card">
              <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/produk-tinta-hijau.jpeg" alt="produk-kaos">
              <div class="card-body text-center">
                <h5 class="title-best-seller"><a href="#">Tinta Stempel Hijau</a></h5>
                <p class="text-best-seller">mulai dari Rp15.000</p>
                <a href=""><button type="button" class="btn btn-primary btn-best-seller">Detail</button></a>
              </div>
            </div>
          </div> -->


    </div>
  </div>
</div>

<!-- video -->
<div id="video">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/OKLTplWOtpw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="col-md-6">
        <h3 class="judul">Langkah cepat & mudah <br>belanja di <span style="color: #fdd400">Prinneo</span></h3>
        <div class="owl-carousel panduan-belanja owl-theme">
          <div class="item">
            <div class="card" style="border-style: none;">
              <center>
                <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/langkah-pembelian.png" alt="langkah-pembelian">
              </center>
              <div class="card-body">
                <p class="card-desc">Langkah 1</p>
                <h5 class="card-judul">Pilih Produk & Spesifikasi</h5>
                <ul class="card-desc">
                  <li>Pilih produk yang akan anda pesan</li>
                  <li>Pilih spesifikasi produk yang anda inginkan</li>
                  <li>Perhatikan secara teliti & detail produk dan layanan yang kami sediakan</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="item">
            <div class="card" style="border-style: none;">
              <center>
                <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/langkah-pembelian.png" alt="langkah-pembelian">
              </center>
              <div class="card-body">
                <p class="card-desc">Langkah 2</p>
                <h5 class="card-judul">Desain</h5>
                <ul class="card-desc">
                  <li>Pilih Jasa Desain bagi anda yang belum mempunyai desain</li>
                  <li>Pilih Desain Custom bagi anda yang mau mendesain produk sendiri di editor produk</li>
                  <li>Pilih Upload desain bagi anda yang sudah mempunyai desain sesuai dengan standar desain yang kami butuhkan untuk proses cetak</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="item">
            <div class="card" style="border-style: none;">
              <center>
                <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/langkah-pembelian.png" alt="langkah-pembelian">
              </center>
              <div class="card-body">
                <p class="card-desc">Langkah 3</p>
                <h5 class="card-judul">Lakukan pembayaran</h5>
                <ul class="card-desc">
                  <li>Bayar Mudah dengan transfer antar bank</li>
                  <li>Bayar dengan pembayaran e-wallet</li>
                  <li>Bayar mudah dengan Qris atau seluruh aplikasi yang menyediakan pembayaran dengan QR Code</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="item">
            <div class="card" style="border-style: none;">
              <center>
                <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/langkah-pembelian.png" alt="langkah-pembelian">
              </center>
              <div class="card-body">
                <p class="card-desc">Langkah 4</p>
                <h5 class="card-judul">Lacak status pesanan</h5>
                <ul class="card-desc">
                  <li>Cek Status pesanan produk anda sejauh mana</li>
                  <li>Cek Status pengiriman produk anda sampai mana apabila barang sudah dikirim</li>
                  <li>Pengecekan di menu lacak pesanan</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="item">
            <div class="card" style="border-style: none;">
              <center>
                <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/langkah-pembelian.png" alt="langkah-pembelian">
              </center>
              <div class="card-body">
                <p class="card-desc">Langkah 5</p>
                <h5 class="card-judul">Terima pesanan</h5>
                <ul class="card-desc">
                  <li>Pesanan akan dikirim ke alamatmu</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- klien kami -->
<div id="klien">
  <div class="container">
    <h2 class="subtitle">Klien Kami</h2>
    <div class="row">
      <div class="owl-carousel klien owl-theme">
        <div class="item">
          <center>
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/1.png" alt="bpjs-kesehatan">
          </center>
        </div>
        <div class="item">
          <center>
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/2.png" alt="bpjs-kesehatan">
          </center>
        </div>
        <div class="item">
          <center>
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/3.png" alt="bpjs-kesehatan">
          </center>
        </div>
        <div class="item">
          <center>
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/4.png" alt="bpjs-kesehatan">
          </center>
        </div>
        <div class="item">
          <center>
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/5.png" alt="bpjs-kesehatan">
          </center>
        </div>
        <div class="item">
          <center>
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/6.png" alt="bpjs-kesehatan">
          </center>
        </div>
        <div class="item">
          <center>
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/7.png" alt="bpjs-kesehatan">
          </center>
        </div>
        <div class="item">
          <center>
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/8.png" alt="bpjs-kesehatan">
          </center>
        </div>
        <div class="item">
          <center>
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/9.png" alt="bpjs-kesehatan">
          </center>
        </div>
        <div class="item">
          <center>
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/10.png" alt="bpjs-kesehatan">
          </center>
        </div>
        <div class="item">
          <center>
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/11.png" alt="bpjs-kesehatan">
          </center>
        </div>
        <div class="item">
          <center>
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/12.png" alt="bpjs-kesehatan">
          </center>
        </div>
        <div class="item">
          <center>
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/13.png" alt="bpjs-kesehatan">
          </center>
        </div>
        <div class="item">
          <center>
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/14.png" alt="bpjs-kesehatan">
          </center>
        </div>
        <div class="item">
          <center>
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/15.png" alt="bpjs-kesehatan">
          </center>
        </div>
        <div class="item">
          <center>
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/16.png" alt="bpjs-kesehatan">
          </center>
        </div>
        <!-- <div class="item">
          <center>
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/bpjs-kesehatan.png" alt="bpjs-kesehatan">
          </center>
        </div>
        <div class="item">
          <center>
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/bri.png" alt="bri">
          </center>
        </div>
        <div class="item">
          <center>
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/btn-syariah.png" alt="btn-syariah">
          </center>
        </div>
        <div class="item">
          <center>
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/bpjs-kesehatan.png" alt="bpjs-kesehatan">
          </center>
        </div>
        <div class="item">
          <center>
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/bri.png" alt="bri">
          </center>
        </div>
        <div class="item">
          <center>
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/bni-syariah.png" alt="bni-syariah">
          </center>
        </div>
        <div class="item">
          <center>
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/btn-syariah.png" alt="btn-syariah">
          </center>
        </div>
        <div class="item">
          <center>
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/home/bni-syariah.png" alt="bni-syariah">
          </center>
        </div> -->
      </div>
    </div>
  </div>
</div>

<!-- testimoni -->
<div id="testimoni">
  <div class="container">
    <h2 class="subtitle">Testimoni Klien</h2>
    <div class="row">
      <div class="owl-carousel testimoni owl-theme">
        <?php foreach ($testimonials as $key => $value) : ?>
          <div class="item">
            <center>
              <img class="img-testimoni rounded-circle" src="<?php echo base_url() . 'assets/images/img_testimonials/' . $value->testimonial_image ?>" align="testimoni-klien">
              <p class="isi-testimoni">"<?php echo $value->testimonial_description ?>"</p>
              <p class="nama-testimoni"><?php echo $value->testimonial_name ?></p>
            </center>
          </div>
        <?php endforeach ?>

      </div>
    </div>
  </div>
</div>

<!-- artikel -->
<div id="artikel">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="subtitle">Artikel Terbaru</h2>
      </div>
      <?php foreach ($blog_newest as $key => $value) : ?>
        <div class="col-md-4">
          <div class="card">
            <img class="card-img-top" src="<?php echo base_url() . 'assets/images/img_blogs/' . $value->blog_image ?>" alt="<?php echo $value->blog_title ?>">
            <div class="card-body" style="height: 260px">
              <i class="fa fa-calendar" id="iconartikel"></i> <?php $date = date_create($value->blog_date);
                                                              echo date_format($date, "d F Y"); ?> &nbsp;&nbsp;
              <i class="fa fa-user" id="iconartikel"></i> <?php echo $value->blog_author ?>
              <h5 class="card-title"><a href="<?php echo base_url() . 'blogs/detail/' . strtolower($value->blog_slug) ?>"><?php echo character_limiter($value->blog_title, 50) ?></a></h5>
              <p class="card-text"><?php echo character_limiter($value->blog_exerpt, 100) ?> </p>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</div>

<!-- modal popup -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal-pupup">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="popup_status" value="<?= !empty($popup) ? 'true' : 'false'; ?>" readonly>
        <?= !empty($popup) ? '<a name="popup_link" href="' . $popup->popup_link . '" target="_blank"><img style="width: 100% !important;" src="' . base_url('assets/images/img_popups/' . $popup->popup_image) . '" alt="' . $popup->popup_image_meta . '"></a>' : ''; ?>
      </div>
    </div>
  </div>
</div>