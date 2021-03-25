 <!-- dasbor user -->
 <div id="profil">
  <div class="row">
    <div class="col-md-3 col-xs-12 widget">
      <center>
        <img class="img-fluid rounded-circle" src="<?php echo base_url().'assets/images/img_users/'.$user_details->user_photo; ?>" alt="profil-user">
        <h5 class="nama-widget"><?php echo $user_details->user_name; ?></h5>
      </center>
      <hr>
      <p class="alamat-widget"><i class="fas fa-map-marker-alt"></i> <?php echo $user_details->address_name ?></p>
      <center>
      <?php if ($user_details->address_id==0): ?>
        <a type="button" class="btn btn-secondary btn-widget" href="<?php echo base_url().'user/alamat/tambah' ?>">Tambahkan Alamat</a>
        <?php else: ?>
          <a type="button" class="btn btn-secondary btn-widget" href="<?php echo base_url().'user/alamat/edit' ?>">Ubah Alamat</a>
        <?php endif ?>
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
              <h5 class="nama-banner"><?php echo $user_details->user_name; ?></h5>
            </div>
          </div>
          <div class="col-md-6">
            <div class="float-right">
              <a type="button" class="btn btn-light btn-banner" href="<?php echo base_url().'profil/edit' ?>">Ganti Informasi</a>
            </div>
          </div>
        </div>

        <div class="row" id="profil-detail">
          <div class="col-md-12">
            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <span>Nama lengkap</span>
                  <input type="text" class="form-control" id="" value="<?php echo $user_details->user_name; ?>" disabled>
                </div>
                <div class="form-group col-md-6">
                  <span>Email</span>
                  <input type="email" class="form-control" id="" value="<?php echo $user_details->user_email; ?>" disabled>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <span>Nomor Hp</span>
                  <input type="number" class="form-control" id="" value="0<?php echo $user_details->user_phone; ?>" disabled>
                </div>
                <div class="form-group col-md-6">
                  <span>Jenis Kelamin</span>
                  <input type="text" class="form-control" id="" value="<?php echo $user_details->user_gender; ?>" disabled>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>

      <!-- profil versi mobile -->
      <div class="col-md-9 col-xs-12 d-block d-sm-none">
        <a type="button" class="btn btn-secondary btn-widget pt-2 pb-2"  href="<?php echo base_url().'profil/edit' ?>">Ganti Informasi</a>
      </div>
    </div>
  </div>