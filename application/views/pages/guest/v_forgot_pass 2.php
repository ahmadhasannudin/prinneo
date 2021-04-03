<div id="banner">
  <div class="container">
    <h2 class="title-banner">Lupa Password</h2>  
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
          <div class="col-md-7 form-register align-self-center">
            <h3>Lupa Password</h3>
            <p>Jangan khawatir tuliskan alamat email Anda untuk reset password</p>
             <form action="<?php echo base_url().'daftar/forgot' ?>" method="post">
              <div class="form-group">
                <input type="email" class="form-control" id="" placeholder="Masukkan email Anda" name="user_email" value="<?php echo set_value('user_email'); ?>">
                <span class="text-danger"><?php echo form_error('user_email'); ?></span>
              </div>
              <button type="submit" class="btn btn-modal-login">Reset Password</button>
              <p class="text-center mb-0 mt-2"> Belum punya akun? <a href="<?php echo base_url().'daftar' ?>" style="color: red">Daftar</a></p>
              <p class="text-center"> Sudah punya akun? <a href="<?php echo base_url().'login' ?>" style="color: red">Login</a></p>
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