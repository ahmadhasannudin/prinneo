<div id="banner">
  <div class="container">
    <h2 class="title-banner">Daftar Akun</h2>
  </div>
</div>
<div id="register">
  <div class="container">
    <div class="row">
      <!-- dekstop -->
      <div class="col-md-5 icon-register d-none d-sm-block">
        <img class="img-fluid" src="<?php echo base_url() ?>assets/images/register/daftar.png" alt="daftar">
        <h5>Hanya di Prinneo, Jasa percetakan tercepat dan terjamin</h5>
        <p>tentukan pilihan paketmu & temukan bonusnya!</p>
      </div>
      <div class="col-md-7 form-register">
        <h3>Daftar Sekarang</h3>
        <p>Sudah punya akun? <a href="<?php echo base_url() . 'login' ?>" style="color: red">Masuk</a></p>
        <form action="<?php echo base_url() . 'daftar/baru'; ?>" method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Nama lengkap</label>
              <input type="text" class="form-control" id="" name="user_name" value="<?php echo set_value('user_name'); ?>">
              <small><span class="text-danger"><?php echo form_error('user_name'); ?></span></small>
            </div>
            <div class="form-group col-md-6">
              <label for="">Email</label>
              <input type="email" class="form-control" id="" name="user_email" value="<?php echo set_value('user_email'); ?>">
              <small><span class="text-danger"><?php echo form_error('user_email'); ?></span></small>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Kata sandi</label>
              <input type="password" class="form-control" id="" name="user_password" value="<?php echo set_value('user_password'); ?>">
              <small><span class="text-danger"><?php echo form_error('user_password'); ?></span></small>
            </div>
            <div class="form-group col-md-6">
              <label for="">Konfirmasi kata sandi</label>
              <input type="password" class="form-control" id="" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>">
              <small><span class="text-danger"><?php echo form_error('confirm_password'); ?></span></small>
            </div>
          </div>

          <div class="form-group">
            <label for="inputAddress">No hp</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">+62</span>
              </div>
              <input type="number" class="form-control" id="" name="user_phone" value="<?php echo set_value('user_phone'); ?>">
            </div>
            <small><span class="text-danger"><?php echo form_error('user_phone'); ?></span></small>
          </div>
          <center><button type="submit" class="btn btn-secondary pl-5 pr-5">Daftar</button></center>
        </form>
      </div>
      <!-- mobile -->
      <div class="col-md-5 icon-register d-block d-sm-none">
        <img class="img-fluid" src="assets/images/register/daftar.png" alt="daftar">
        <h5>Hanya di Prinneo, Jasa percetakan tercepat dan terjamin</h5>
        <p>tentukan pilihan paketmu & temukan bonusnya!</p>
      </div>

    </div>
  </div>
</div>