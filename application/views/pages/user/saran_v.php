 <!-- dasbor user -->
 <div id="profil">
  <div class="row">
    <div class="col-md-3 col-xs-12 widget">
      <center>
        <img class="img-fluid rounded-circle" src="<?php echo base_url().'assets/images/img_users/'.$user_details->user_photo; ?>" alt="profil-user">
        <h5 class="nama-widget"><?php echo $user_details->user_name; ?></h5>
      </center>
      <hr>
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link" href="<?php echo base_url().'profil/history' ?>" <?php if ($this->uri->segment(2)=='history'): ?> style="background-color: #fdd400" <?php endif ?>>Transaksi</a>
        <a class="nav-link" href="<?php echo base_url().'profil/saran' ?>" <?php if ($this->uri->segment(2)=='saran'): ?> style="background-color: #fdd400" <?php endif ?>>Kritik & Saran</a>
        <a class="nav-link" href="<?php echo base_url().'profil/testimoni' ?>" <?php if ($this->uri->segment(2)=='testimoni'): ?> style="background-color: #fdd400" <?php endif ?>>Testimoni</a>
        <a class="nav-link" href="<?php echo base_url().'login/logout' ?>" >Logout</a>
      </div>
    </div>

    <!-- profil versi dekstop -->
    <div class="col-md-9 col-xs-12 dasbor-konten">
      <div class="row" id="profil-banner">
        <div class="col-md-6">
          <div class="float-left">
            <h5 class="nama-banner">Kritik & Saran</h5>
          </div>
        </div>
        <div class="col-md-6">
        </div>
      </div>

      <div class="row" id="profil-detail">
        <div class="col-md-12">
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
          <form action="<?php echo base_url().'profil/saran' ?>" method="post">
            <div class="form-group">
              <input type="text" class="form-control" id="" placeholder="Masukan Nama Anda" name="contact_us_name" required="" value="<?php echo $user_details->user_name; ?>" readonly>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="email" class="form-control" id="inputEmail4" placeholder="Masukan Email Anda" name="contact_us_email" required="" value="<?php echo $user_details->user_email; ?>" readonly>
              </div>
              <div class="form-group col-md-6">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">+62</span>
                  </div>
                  <input type="number" class="form-control" id="" name="contact_us_phone" value="<?php echo $user_details->user_phone; ?>" readonly>
                </div> 
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
      </div>
    </div>

    <!-- profil versi mobile -->
    <div class="col-md-9 col-xs-12 d-block d-sm-none">
      <a type="button" class="btn btn-secondary btn-widget pt-2 pb-2"  href="<?php echo base_url().'user/edit' ?>">Ganti Informasi</a>
    </div>
  </div>
</div>