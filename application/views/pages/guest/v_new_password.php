<div id="banner">
    <div class="container">
        <h2 class="title-banner">New Password</h2>
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
                <h3>Password Baru</h3>
                <p>Tuliskan password baru Untuk mereset password</p>
                <form id="form-forgot-password" action="<?= base_url() . 'login/new_password'; ?>" onsubmit="return false;" method="post">
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Enter New Password" name="password" value="">
                        <input type="password" class="form-control" placeholder="Renter New Password" name="re_password" value="">
                        <span class="text-danger"><?php echo form_error('user_email'); ?></span>
                    </div>
                    <button type="submit" class="btn btn-modal-login">Submit</button>

                    <p class="text-center">Belum punya akun? <a href="<?php echo base_url() . 'daftar' ?>" style="color: red">Daftar</a></p>

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