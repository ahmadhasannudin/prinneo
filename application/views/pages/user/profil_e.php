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
          <form action="<?php echo base_url().'profil/edit' ?>" method="post">
            <div class="form-row">
              <div class="form-group col-md-6">
                <span>Nama lengkap</span>
                <input type="text" class="form-control" name="user_name" value="<?php echo $user_details->user_name; ?>">
              </div>
              <div class="form-group col-md-6">
                <span>Email</span>
                <input type="email" class="form-control" name="user_email" value="<?php echo $user_details->user_email; ?>">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <span>Nomor Hp</span>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">+62</span>
                  </div>
                  <input type="number" class="form-control" id="" name="user_phone" value="<?php echo $user_details->user_phone; ?>">
                </div>   
              </div>
              <div class="form-group col-md-6">
                <span>Jenis Kelamin</span>
                <select name="user_gender" class="custom-select">
                  <option value="Laki-Laki" <?php if ($user_details->user_gender=='Laki-Laki'): ?> selected <?php endif ?>>Laki - Laki</option>
                  <option value="Perempuan" <?php if ($user_details->user_gender=='Perempuan'): ?> selected <?php endif ?>>Perempuan</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <span>Foto Profil</span>
              <input type="file" class="form-control" placeholder="" name="user_photo">
              <input type="hidden" name="user_photo_old" value="<?php echo $user_details->user_photo ?>">
              <strong><small class="mt-1" style="float:right;color:crimson;">Ukuran image max : 3MB</small></strong>
            </div>
            <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
          </form>
          <hr>
          <form action="<?php echo base_url().'profil/new-password' ?>" method="post">
            <div class="form-row">
              <div class="form-group col-md-6">
                <span>New Password</span>
                <input type="password" class="form-control" name="user_password" placeholder="Masukan Password Baru" value="<?php echo set_value('user_password'); ?>">
                <small><span class="text-danger"><?php echo form_error('user_password'); ?></span></small>
              </div>
              <div class="form-group col-md-6">
                <span>Konfirmasi Password</span>
                <input type="password" class="form-control" name="konfirmasi_password" placeholder="Masukan Ulang Password Baru" value="<?php echo set_value('konfirmasi_password'); ?>">
                <small><span class="text-danger"><?php echo form_error('konfirmasi_password'); ?></span></small>
              </div>
            </div>
            <button class="btn btn-primary text-right" type="submit">Ubah Password</button>
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