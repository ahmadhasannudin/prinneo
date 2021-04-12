    <!-- footer -->
    <nav class="navbar navbar-expand-md navbar-light sticky-top d-none d-sm-block" id="footernav">
      <div class="navbar-collapse collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() . 'blogs' ?>">BLOG</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() . 'about' ?>">TENTANG KAMI</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() . 'faq' ?>">FAQ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() . 'about/karir' ?>">KARIR</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() . 'about/dropship' ?>">DROPSHIP</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>">KONFIRMASI PEMABAYARAN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>">LACAK PESANAN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() . 'kontak' ?>">KONTAK</a>
          </li>
        </ul>
      </div>
    </nav>

    <footer id="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <img class="image-footer" src="<?php echo base_url() . 'assets/images/home/' . $contacts->contact_logo_footer; ?>" alt="logo-prinneo" width="260px">
            <p class="desc-footer d-none d-sm-block"><?php echo $contacts->contact_description  ?></p>
            <div class="sosmed">
              <a href="<?php echo $contacts->contact_fb  ?>" target="_blank"><i class="fa fa-facebook" id="sosmed-footer" style="padding: 8px 12px;"></i></a>
              <a href="<?php echo $contacts->contact_tw  ?>" target="_blank"><i class="fa fa-twitter" id="sosmed-footer"></i></a>
              <a href="<?php echo $contacts->contact_ig  ?>" target="_blank"><i class="fa fa-instagram" id="sosmed-footer"></i></a>
              <a href="<?php echo $contacts->contact_yt  ?>" target="_blank"><i class="fa fa-youtube" id="sosmed-footer"></i></a>
            </div>
            <div class="langganan">
              <h5>Berlangganan artikel:</h5>
              <form class="form-inline" action="<?php echo base_url() . 'home/subscribe' ?>" method="post">
                <div class="form-group">
                  <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Masukan Email" aria-label="Example text with button addon" aria-describedby="button-addon1" name="subscriber_email">
                    <div class="input-group-append">
                      <button class="btn btn-warning" type="submit" id="button-addon2">Berlangganan</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <!-- menu footer mobile -->
            <div class="menu-footer d-block d-sm-none">
              <a href="<?php echo base_url() ?>"><button type="button" class="btn btn-warning">HOME</button></a> <br>
              <a href="<?php echo base_url() . 'blogs' ?>"><button type="button" class="btn btn-warning">BLOG</button></a> <br>
              <a href="<?php echo base_url() ?>"><button type="button" class="btn btn-warning">TENTANG KAMI</button></a> <br>
              <a href="<?php echo base_url() . 'faq' ?>"><button type="button" class="btn btn-warning">FAQ</button></a> <br>
              <a href="<?php echo base_url() ?>"><button type="button" class="btn btn-warning">KARIR</button></a> <br>
              <a href="<?php echo base_url() ?>"><button type="button" class="btn btn-warning">DROPSHIP</button></a> <br>
              <a href="<?php echo base_url() ?>"><button type="button" class="btn btn-warning">KONFIRMASI PEMBAYARAN</button></a> <br>
              <a href="<?php echo base_url() ?>"><button type="button" class="btn btn-warning">LACAK PESANAN</button></a> <br>
              <a href="<?php echo base_url() . 'kontak' ?>"><button type="button" class="btn btn-warning">KONTAK</button></a>
            </div>
          </div>
          <div class="col-md-4 d-none d-sm-block" id="about-footer">
            <h4>Hubungi kami</h4>
            <ul style="list-style-type: none;margin: 0;padding: 0;font-size: 17px;">
              <li class="mb-3"><a href="tel:02657297930" style="text-decoration: none;color:white;"><i class="fa fa-phone pr-2"></i><?php echo $contacts->contact_phone  ?> </a></li>
              <li class="mb-3"><a href="https://api.whatsapp.com/send?phone=6289503720201&text=Halo Admin Prinneo," style="text-decoration: none;color:white;"><i class="fa fa-whatsapp pr-2"></i><?php echo $contacts->contact_whatsapp ?> </a></li>
              <li class="mb-3"><a><i class="fa fa-envelope pr-2"></i><?php echo $contacts->contact_email ?></a></li>
              <li class="mb-3"><a><i class="fas fa-clock pr-2"></i>
                  <pre style="display: inline-flex;font-family: roboto;font-size: inherit;color: inherit;margin-bottom:inherit;"><?php echo $contacts->contact_time ?></pre>
                </a></li>
              <li class="mb-3"><a><i class="fas fa-map pr-2"></i>
                  <pre style="display: inline-flex;font-family: roboto;font-size: inherit;color: inherit;margin-bottom:inherit;"><?php echo $contacts->contact_address ?></pre>
                </a></li>
            </ul>

          </div>
          <div class="col-md-4" id="about-footer">
            <h4>Pembayaran</h4>
            <img class="image-transaksi mb-3" src="<?php echo base_url(); ?>assets/images/home/logo-pembayaran-new.png" alt="logo-pembayaran"><br>
            <h4 class="my-4">Ekspedisi/pengiriman:</h4>
            <img class="image-transaksi" src="<?php echo base_url(); ?>assets/images/home/logo-ekspedisi-baru.png" alt="logo-ekspedisi">
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
            <form action="<?php echo base_url() . 'login' ?>" method="post">
              <div class="form-group">
                <span>Email</span>
                <input type="email" class="form-control" placeholder="Masukkan email Anda" name="user_email">
              </div>
              <div class="form-group">
                <span>Password</span>
                <p class="float-right"><a href="<?php echo base_url() . 'forgot-password' ?>" style="color: red"> Lupa Password?</a></p>
                <input type="password" class="form-control" placeholder="Masukkan password Anda" name="user_password">
              </div>
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck">
                  <label class="form-check-label" for="gridCheck">
                    Tetap login
                  </label>
                </div>
              </div>
              <div class="row"> <button type="submit" class="btn btn-modal-login">Login</button></div>
              <div class="row">
                <div class="col-md-12">
                  <h6 style="text-align:center; color:#474443;">atau login dengan</h6>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div style="text-align:center;">
                    <a href="#" class="btn-face m-b-20">
                      <img src="<?php echo base_url(); ?>assets/icons/facebook_logo.png" alt="facebook">
                      Facebook
                    </a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div style="text-align:center;">
                    <a href="<?php echo base_url(); ?>login/login_google" class="btn-google m-b-20">
                      <img src="<?php echo base_url(); ?>assets/icons/google_logo.png" alt="GOOGLE">
                      Google
                    </a>
                  </div>
                </div>
              </div>
              <br />

              <center>
                <p>Belum punya akun? <a href="<?php echo base_url() . 'daftar' ?>" style="color: red">Daftar</a></p>
              </center>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php echo $this->session->flashdata('notifikasi');   ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
      var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
      (function() {
        var s1 = document.createElement("script"),
          s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/5f17a8a17258dc118beeb107/default';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
      })();
    </script>
    <!--End of Tawk.to Script-->
    <!-- owlCarousel -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dropify.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>vendor/sweetalert/sweetalert2.all.min.js"></script>
    <script>
      $(document).ready(function() {
        $('.dropify').dropify({
          messages: {
            default: 'Drag atau drop untuk mengupload gambar',
            replace: 'Ganti',
            remove: 'Hapus',
            error: 'error'
          }
        });
        $('.pembuka-mobile').owlCarousel({
          loop: true,
          nav: false,
          dots: true,
          margin: 10,
          responsive: {
            0: {
              items: 1
            },
            600: {
              items: 1
            },
            1000: {
              items: 3
            }
          }
        });
        $('.panduan-belanja').owlCarousel({
          margin: 10,
          responsive: {
            0: {
              items: 1
            },
            600: {
              items: 1
            },
            1000: {
              items: 1
            }
          }
        });
        $('.klien').owlCarousel({
          loop: true,
          nav: true,
          dots: false,
          margin: 10,
          autoplay: true,
          autoplayTimeout: 2200,
          autoplayHoverPause: true,
          smartSpeed: 2500,
          fluidSpeed: 1,
          responsive: {
            0: {
              items: 3
            },
            600: {
              items: 3
            },
            1000: {
              items: 5
            }
          }
        });
        $('.testimoni').owlCarousel({
          loop: true,
          nav: false,
          dots: true,
          margin: 10,
          responsive: {
            0: {
              items: 1
            },
            600: {
              items: 2
            },
            1000: {
              items: 3
            }
          }
        });
        $('.product-other').owlCarousel({
          loop: true,
          nav: false,
          dots: true,
          margin: 10,
          responsive: {
            0: {
              items: 2
            },
            600: {
              items: 3
            },
            1000: {
              items: 4
            }
          }
        });

      });
    </script>
    <script type="text/javascript">
      $(function() {
        $('[data-toggle="popover"]').popover();
        $('[data-toggle="tooltip"]').tooltip('show');
      })
      $(document).ready(function() {
        $('#example').DataTable();
        $('.navbar-light .dmenu').hover(function() {
          $(this).find('.sm-menu').first().stop(true, true).slideDown(300);
        }, function() {
          $(this).find('.sm-menu').first().stop(true, true).slideUp(300)
        });
      });
      $(window).on('load', function() {
        $('#popups').modal('show');
      });
      window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
          $(this).remove();
        });
      }, 3000);
    </script>
    <?php
    if (isset($pageFooter) && !empty($pageFooter)) {
      $this->load->view($pageFooter);
    }
    ?>
    </body>

    </html>