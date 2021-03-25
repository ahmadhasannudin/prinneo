   <!-- banner -->
    <div id="banner">
      <div class="container">
        <h2 class="title-banner">KONTAK</h2>  
      </div>
    </div>  

    <!-- konten blog -->
    <div id="main">
      <div class="container">
        <div><h3 class="title-main">Tetap terhubung Bersama kami</h3><br></div>
        <div class="row">
          <?php
        if ($this->session->flashdata('notifikasi')) {
          echo "<br>";
          echo "<div class='alert alert-success alert-dismissible fade show'><center>";
          echo $this->session->flashdata('notifikasi');
          echo "</center><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button></div>";
        }
        ?>
          <div class="col-md-7">
            <form action="<?php echo base_url().'kontak/saran' ?>" method="post">
              <div class="form-group">
                <input type="text" class="form-control" id="" placeholder="Masukan Nama Anda" name="contact_us_name" required="">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="email" class="form-control" id="inputEmail4" placeholder="Masukan Email Anda" name="contact_us_email" required="">
                </div>
                <div class="form-group col-md-6">
                  <input type="number" class="form-control" id="" placeholder="Masukan No hp Anda" name="contact_us_phone" required="">
                </div>
              </div>
              <div class="form-group">
                <div class="form-group">
                  <select id="inputState" class="form-control" name="contact_us_topik" required="">
                    <option selected="" value="" disabled="">Pilih Topik Tentang</option>
                    <option value="Jasa Desain">Jasa Desain </option>
                    <option value="Upload Desain">Upload Desain </option>
                    <option value="Saran">Saran </option>
                    <option value="Pesanan Anda">Pesanan Anda</option>
                    <option value="Pembayaran Anda">Pembayaran Anda</option>
                  </select>
                </div>
              </div>
              
              <div class="form-group">
                <textarea class="form-control" id="" rows="3" placeholder="Masukan Pesan Anda" name="contact_us_message" required=""></textarea>
              </div>
              <div class="form-group">
                <div class="form-group">
                  <select id="inputState" class="form-control" name="contact_us_reply" required="">
                    <option selected="" value="" disabled="">Balas Saya Melalui</option>
                    <option value="Telpon">Telpon</option>
                    <option value="Email">Email</option>
                  </select>
                </div>
              </div>
              <button type="submit" class="btn btn-secondary pl-5 pr-5">Kirim</button>
            </form>
          </div>
          <div class="col-md-5 sosmed-kontak">
            <table class="responsive">
              <tr>
                <td><i class="fa fa-whatsapp"></i></td>
                <td><?php echo $contacts->contact_whatsapp ?></td>
              </tr>
              <tr>
                <td><i class="fa fa-envelope"></i></td>
                <td><?php echo $contacts->contact_email ?></td>
              </tr>
              <tr>
                <td><i class="fas fa-map"></i></td>
                <td><?php echo $contacts->contact_address ?></td>
              </tr>
            </table>
          </div>
          <div class="col-md-12 mt-4">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31657.91587610583!2d108.20539663948222!3d-7.326976746170049!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e8ca35c4a2a3%3A0xa46ef5bc1e1b5383!2sQuick%20Corp.%20Indonesia!5e0!3m2!1sen!2sid!4v1587478641671!5m2!1sen!2sid" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" class="maps"></iframe>
        </div>
        </div>
      </div>
    </div>