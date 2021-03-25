<div id="banner">
  <div class="container">
    <h2 class="title-banner">Login Akun</h2>  
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
        <h3>Login</h3>
        <p>Belum punya akun? <a href="<?php echo base_url().'daftar' ?>" style="color: red">Daftar</a></p>
        <form action="<?php echo base_url().'login'; ?>" method="post">
          <div class="form-group">
            <label for="inputAddress">Email</label>
            <input type="email" class="form-control" id="" placeholder="Masukkan email Anda" name="user_email" value="<?php echo set_value('user_email'); ?>">           
            <small><span class="text-danger"><?php echo form_error('user_email'); ?></span></small>
          </div>
          <div class="form-group">
                <span>Password</span>
                <p class="float-right"><a href="<?php echo base_url().'forgot-password' ?>" style="color: red"> Lupa Password?</a></p>
                <input type="password" class="form-control" id="" placeholder="Masukkan password Anda" name="user_password" value="<?php echo set_value('user_password'); ?>">
                <small><span class="text-danger"><?php echo form_error('user_password'); ?></span></small>
              </div>

          <center><button type="submit" class="btn btn-secondary pl-5 pr-5">Login</button></center>
          <br />  
          <div class="row">
            <div class="col-md-12">
              <h6 style="text-align:center; color:#474443;">atau login dengan</h6>
            </div>
          </div>  
          <div class="row">
            <div class="col-md-6">
              <div style="text-align:center;">
                <a href="<?php echo $facebook_oauth; ?>" class="btn-face m-b-20">
                <img src="<?php echo base_url(); ?>assets/icons/facebook_logo.png" alt="facebook">
                  Facebook
                </a>
              </div>  
            </div>
            <div class="col-md-6">    
            <div style="text-align:center;">
                <a href="<?php echo $google_oauth; ?>"
              
                class="btn-google m-b-20">
                  <img src="<?php echo base_url(); ?>assets/icons/google_logo.png" alt="GOOGLE">
                  Google
                </a>
              </div>  
            </div>  
          </div>
          <br />
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

<!-- <script>
  function myPopup(myURL, title, myWidth, myHeight) {
    var left = (screen.width - myWidth) / 2;
    var top = (screen.height - myHeight) / 4;
    var myWindow = window.open(myURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + myWidth + ', height=' + myHeight + ', top=' + top + ', left=' + left);
  }
     onclick="myPopup('<?php echo $google_oauth ?>',  'login prinneo dengan google', 1050, 550);"   
</script> -->