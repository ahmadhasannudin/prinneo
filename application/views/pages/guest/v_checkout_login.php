<div id="banner">
  <div class="container">
    <h2 class="title-banner">Checkout</h2>
  </div>
</div>

<form action="<?= base_url() . 'checkout/proses_checkout'; ?>" onsubmit="return false;" id="form-checkout">
  <!-- konten blog -->
  <div id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h3 class="subtitle-main">Informasi Pembayaran</h3>
          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Login</a>
              <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Pesan Tanpa Daftar</a>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <div class="row container mt-4">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="inputAddress">Email</label>
                    <input type="email" class="form-control" placeholder="Masukkan email Anda" name="user_email" value="<?php echo set_value('user_email'); ?>">
                    <small><span class="text-danger"><?php echo form_error('user_email'); ?></span></small>
                  </div>
                  <div class="form-group">
                    <span>Password</span>
                    <p class="float-right"><a href="<?php echo base_url() . 'forgot-password' ?>" style="color: red"> Lupa Password?</a></p>
                    <input type="password" class="form-control" placeholder="Masukkan password Anda" name="user_password" value="<?php echo set_value('user_password'); ?>">
                    <small><span class="text-danger"><?php echo form_error('user_password'); ?></span></small>
                  </div>
                  <center>
                    <button type="submit" class="btn btn-secondary pl-5 pr-5">Login</button>
                    <p class="mt-4">Belum punya akun? <a href="<?php echo base_url() . 'daftar' ?>" style="color: red">Daftar</a></p>
                  </center>

                </div>
                <div class="col-md-12">
                  <hr>
                  <center>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <button type="button" class="btn btn-primary"><i class="fa fa-facebook"></i></button>
                      <button type="button" class="btn btn-outline-primary">Login With Facebook</button>
                    </div>
                    <br>
                    <br>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <button type="button" class="btn btn-danger"><i class="fa fa-google"></i></button>
                      <button type="button" class="btn btn-outline-danger">Login with Google</button>
                    </div>
                  </center>
                </div>
              </div>
            </div>

            <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              <div class="row mt-4">
                <div class="col-12">
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="">Nama Lengkap*</label>
                      <input type="text" class="form-control" name="user_name" placeholder="Isikan nama depan Anda" value="<?php echo $customer['nama_order'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Email*</label>
                    <input type="email" class="form-control" name="user_email" placeholder="Masukkan email Anda" value="<?php echo $customer['email_order'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="">No hp*</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">+62</span>
                      </div>
                      <input type="number" class="form-control" name="user_phone" value="<?php echo $customer['nohp_order'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Alamat*</label>
                    <textarea class="form-control" name="address" rows="3" placeholder="Masukkan alamat Anda"></textarea>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputState">Provinsi*</label>
                      <select class="form-control rounded" name="provinsi" id="provinsi">
                        <option value="">Pilih Provinsi Anda</option>
                        <?php $this->load->view('api/rj_get_provinsi'); ?>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Kabupaten*</label>
                      <select class="form-control rounded" name="kota" id="kota">
                        <option value="">Pilih Kota Anda</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="">Kurir</label>
                      <select class="form-control rounded" name="kurir" id="courier">
                        <option value="">Pilih Kurir Anda</option>
                        <option value="jne">JNE</option>
                        <option value="pos">POS</option>
                        <option value="tiki">TIKI</option>
                        <option value="jnt">J&T</option>
                        <option value="ninja">Ninja</option>
                        <option value="lion">Lion Parcel</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Layanan</label>
                      <select class="form-control rounded" name="layanan" id="layanan">
                        <option value="">Pilih Layanan</option>
                      </select>
                    </div>
                  </div>
                  <input type="number" name="berat-total" id="berat-total" value="100" hidden>
                  <div class="form-group ">
                    <button type="submit" class="btn btn-secondary btn-keranjang float-right">Pesan Sekarang</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="col-md-6">
          <h3 class="subtitle-main">Tinjau Pesanan</h3>
          <div class="table-responsive">
            <table class="table table-striped cart">
              <thead class="table-head-cart">
                <tr>
                  <th colspan="2" width="50%">Produk</th>
                  <th>Qty</th>
                  <th>Sub total</th>
                </tr>
              </thead>
              <tbody>
                <?php $total = 0;
                foreach ($this->cart->contents() as $cart => $value) { ?>

                  <input type="hidden" name="order_product_id[]" value="<?= $value['id']; ?>" readonly>
                  <input type="hidden" name="order_name[]" value="<?= $value['name']; ?>" readonly>
                  <input type="hidden" name="order_qty[]" value="<?= $value['qty']; ?>" readonly>
                  <input type="hidden" name="order_subtotal[]" value="<?= $value['subtotal'] / $value['qty']; ?>" readonly>

                  <tr>
                    <td><img width="150" class="img-fluid" src="<?php echo base_url('assets/images/img_products/' . $value['product_image']); ?>" alt=""></td>
                    <td>
                      <?php echo $value['name'] ?>
                      <?php if ($value['jenis_order'] != 'beli') : ?>
                        <a class="btn btn-sm btn-secondary" target="_blank" href="<?php echo base_url() . 'assets/images/tmp_cart/' . $value['file_order'] ?>">File : <?php echo $value['name'] ?></a>
                      <?php endif ?>
                    </td>
                    <td class="text-right"><?php echo $value['qty'] ?></td>
                    <td style="text-align: right"><?php echo 'Rp. ' . number_format($value['subtotal'], 0, ",", "."); ?></td>
                  </tr>
                <?php $total += $value['subtotal'];
                } ?>
                <input type="hidden" name="order_total" value="<?= $total; ?>" readonly>
                <input type="hidden" name="order_ongkir" value="" readonly>
                <input type="hidden" name="order_grand_total" value="<?= $total; ?>" readonly>
                <tr>
                  <td colspan="3" style="text-align: right">Subtotal</td>
                  <td style="text-align: right"><?php echo 'Rp. ' . number_format($total, 0, ",", "."); ?></td>
                </tr>
                <tr>
                  <td colspan="3" style="text-align: right">Ongkos Kirim</td>
                  <td style="text-align: right" id="ongkir">Rp 0</td>
                </tr>
                <tr>
                  <td colspan="3" style="text-align: right">Grand Total</td>
                  <td style="text-align: right" id="grand-total"><?php echo 'Rp. ' . number_format($total, 0, ",", "."); ?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="form-group">
            <label for="">Catatan</label>
            <textarea class="form-control" name="catatan" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>