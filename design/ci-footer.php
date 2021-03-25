<?php global $lumise;
?>
    <!-- footer -->
    <nav class="navbar navbar-expand-md navbar-light sticky-top d-none d-sm-block" id="footernav">
      <div class="navbar-collapse collapse justify-content-center" id="navbarNav">
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url() ?>">HOME</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url().'blogs' ?>">BLOG</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url() ?>">TENTANG KAMI</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url().'faq' ?>">FAQ</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url() ?>">KARIR</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url() ?>">DROPSHIP</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url() ?>">KONFIRMASI PEMABAYARAN</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url() ?>">LACAK PESANAN</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url().'kontak' ?>">KONTAK</a>
              </li>
          </ul>
      </div>
    </nav>

    <footer id="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <img class="image-footer" src="<?php echo base_url().'assets/images/home/'.$contact['contact_logo_footer']; ?>" alt="logo-prinneo" width="260px">
            <p class="desc-footer d-none d-sm-block"><?php echo $contact->contact_description  ?></p>
            <div class="sosmed">
              <a href="<?php echo $contact['contact_fb']  ?>" target="_blank"><i class="fa fa-facebook" id="sosmed-footer" style="padding: 8px 12px;"></i></a>
              <a href="<?php echo $contact['contact_tw']  ?>" target="_blank"><i class="fa fa-twitter" id="sosmed-footer"></i></a>
              <a href="<?php echo $contact['contact_ig']  ?>" target="_blank"><i class="fa fa-instagram" id="sosmed-footer"></i></a>
              <a href="<?php echo $contact['contact_yt']  ?>" target="_blank"><i class="fa fa-youtube" id="sosmed-footer"></i></a>
            </div>
            <div class="langganan">
              <h5>Berlangganan artikel:</h5>
              <form class="form-inline">
                <div class="form-group">
                  <input type="email" class="form-control" id="" placeholder="Masukkan email">
                </div>
                <button type="submit" class="btn btn-warning">Berlangganan</button>
              </form>
            </div>
            <!-- menu footer mobile -->
            <div class="menu-footer d-block d-sm-none">
                <a href="<?php echo base_url() ?>"><button type="submit" class="btn btn-warning">HOME</button></a> <br>
                <a href="<?php echo base_url().'blogs' ?>"><button type="submit" class="btn btn-warning">BLOG</button></a> <br>
                <a href="<?php echo base_url() ?>"><button type="submit" class="btn btn-warning">TENTANG KAMI</button></a> <br>
                <a href="<?php echo base_url().'faq' ?>"><button type="submit" class="btn btn-warning">FAQ</button></a> <br>
                <a href="<?php echo base_url() ?>"><button type="submit" class="btn btn-warning">KARIR</button></a> <br>
                <a href="<?php echo base_url() ?>"><button type="submit" class="btn btn-warning">DROPSHIP</button></a> <br>
                <a href="<?php echo base_url() ?>"><button type="submit" class="btn btn-warning">KONFIRMASI PEMBAYARAN</button></a> <br>
                <a href="<?php echo base_url() ?>"><button type="submit" class="btn btn-warning">LACAK PESANAN</button></a> <br>
                <a href="<?php echo base_url().'kontak' ?>"><button type="submit" class="btn btn-warning">KONTAK</button></a>
            </div>
          </div>
          <div class="col-md-4 d-none d-sm-block" id="about-footer">
            <h4>Hubungi kami</h4>
            <i class="fa fa-phone"></i> &nbsp;<a><?php echo $contact['contact_phone']  ?> </a><br>
            <i class="fa fa-whatsapp"></i> &nbsp;<a><?php echo $contact['contact_whatsapp'] ?> </a><br>
            <i class="fa fa-envelope"></i> &nbsp;<a><?php echo $contact['contact_email'] ?></a><br>
            <i class="fas fa-clock"></i> &nbsp;<pre style="display: inline-flex;font-family: roboto;font-size: inherit;color: inherit;margin-bottom:inherit;"><?php echo $contact['contact_time'] ?></pre><br>
            <i class="fas fa-map"></i> &nbsp;<pre style="display: inline-flex;font-family: roboto;font-size: inherit;color: inherit;margin-bottom:inherit;"><?php echo $contact['contact_address'] ?></pre>
            </ul>
          </div>
          <div class="col-md-4" id="about-footer">
            <h4>Pembayaran</h4>
            <img class="image-transaksi" src="<?php echo base_url(); ?>assets/images/home/logo-pembayaran.png" alt="logo-pembayaran"><br>
            <h4>Ekspedisi/pengiriman:</h4>
            <img class="image-transaksi" src="<?php echo base_url(); ?>assets/images/home/logo-ekspedisi.png" alt="logo-ekspedisi">
          </div>
        </div>
      </div>
    </footer>

    <section class="copyright">
      <p class="float-left d-none d-sm-block">Copyright &copy Prinneo 2020 All Rights Reserved</p>
      <p class="d-block d-sm-none">Copyright &copy Prinneo 2020 All Rights Reserved</p>
      <p class="float-right d-none d-sm-block">Terimakasih tidak menduplikat dan mengcopy semua yang ada diweb ini </p>
    </section>

    <!-- modal login -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="modal-login">
          <div class="modal-body">
            <center>
              <h4>Masuk</h4><br>
            </center>
            <button type="button" class="close login" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <form action="<?php echo base_url().'login' ?>" method="post">
              <div class="form-group">
                <span>Email</span>
                <input type="email" class="form-control" id="" placeholder="Masukkan email Anda" name="user_email">
              </div>
              <div class="form-group">
                <span>Password</span>
                <p class="float-right"><a href="<?php echo base_url().'forgot-password' ?>" style="color: red"> Lupa Password?</a></p>
                <input type="password" class="form-control" id="" placeholder="Masukkan password Anda" name="user_password">
              </div>
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck">
                  <label class="form-check-label" for="gridCheck">
                    Tetap login
                  </label>
                </div>
              </div>
                <button type="submit" class="btn btn-modal-login">Login</button>
                <center><p>Belum punya akun? <a href="<?php echo base_url().'daftar' ?>" style="color: red">Daftar</a></p></center>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- owlCarousel -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
    <script>
      $(document).ready(function() {
        $('.pembuka-mobile').owlCarousel({
          loop:true,
          nav:false,
          dots:true,
          margin:10,
          responsive:{
            0:{
              items:1
            },
            600:{
              items:1
            },
            1000:{
              items:3
            }
          }
        });
        $('.panduan-belanja').owlCarousel({
          margin:10,
          responsive:{
            0:{
              items:1
            },
            600:{
              items:1
            },
            1000:{
              items:1
            }
          }
        });
        $('.klien').owlCarousel({
          loop:true,
          nav:true,
          dots:false,
          margin:10,
          responsive:{
            0:{
              items:3
            },
            600:{
              items:3
            },
            1000:{
              items:5
            }
          }
        });
        $('.testimoni').owlCarousel({
          loop:true,
          nav:false,
          dots:true,
          margin:10,
          responsive:{
            0:{
              items:1
            },
            600:{
              items:2
            },
            1000:{
              items:3
            }
          }
        });
        $('.product-other').owlCarousel({
          loop:true,
          nav:false,
          dots:true,
          margin:10,
          responsive:{
            0:{
              items:2
            },
            600:{
              items:3
            },
            1000:{
              items:4
            }
          }
        });

      });
    </script>
    <script type="text/javascript">
    $(document).ready(function () {
    $('.navbar-light .dmenu').hover(function () {
            $(this).find('.sm-menu').first().stop(true, true).slideDown(300);
        }, function () {
            $(this).find('.sm-menu').first().stop(true, true).slideUp(300)
        });
    });
    $(window).on('load',function(){
        $('#popups').modal('show');
    });
    </script>
  </body>
</html>
