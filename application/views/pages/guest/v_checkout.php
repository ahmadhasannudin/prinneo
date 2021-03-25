<div id="banner">
      <div class="container">
        <h2 class="title-banner">Checkout</h2>  
      </div>
    </div>  

    <!-- konten blog -->
    <div id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3 class="subtitle-main">Informasi Pembayaran</h3>
            <form>
              <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="">Nama Lengkap*</label>
                      <input type="text" class="form-control" id="" placeholder="Isikan nama depan Anda" value="<?php echo $customer['nama_order'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Email*</label>
                    <input type="email" class="form-control" id="" placeholder="Masukkan email Anda" value="<?php echo $customer['email_order'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="">No hp*</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">+62</span>
                      </div>
                      <input type="number" class="form-control" id="" name="user_phone" value="<?php echo $customer['nohp_order'] ?>">
                    </div>  
                  </div>
                  <div class="form-group">
                    <label for="">Alamat*</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Masukkan alamat Anda" ></textarea>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputState">Provinsi*</label>
                      <select class="form-control rounded" name="provinsi" id="provinsi" >
                        <option>Pilih Provinsi Anda</option>
                        <?php $this->load->view('api/rj_get_provinsi'); ?>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Kabupaten*</label>
                      <select class="form-control rounded" name="kota" id="kota">
                        <option >Pilih Kota Anda</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                     <label for="">Kurir</label>
                     <select class="form-control rounded" name="kurir" id="courier">
                      <option >Pilih Kurir Anda</option>
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
                    <option >Pilih Layanan</option>
                  </select>
                </div>
              </div>
              <input type="number" name="berat-total" id="berat-total" value="100" hidden>
            </form>
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
                  <?php $total = 0; foreach ($this->cart->contents() as $cart => $value) { ?>
                  <tr>
                    <td><img width="150" class="img-fluid" src="<?php echo base_url('assets/images/img_products/'.$value['product_image']);?>" alt=""></td>
                    <td><?php echo $value['name'] ?></td>
                    <td><?php echo $value['qty'] ?></td>
                    <td style="text-align: right"><?php echo 'Rp. '.number_format($value['subtotal'],0,",","."); ?></td>
                  </tr>
                  <?php $total += $value['subtotal']; } ?>
                  <tr>
                    <td colspan="3" style="text-align: right">Subtotal</td>
                    <td style="text-align: right"><?php echo 'Rp. '.number_format($total,0,",","."); ?></td>
                  </tr>
                  <tr>
                    <td colspan="3" style="text-align: right">Ongkos Kirim</td>
                    <td style="text-align: right" id="ongkir">Rp 0</td>
                  </tr>
                  <tr>
                    <td colspan="3" style="text-align: right">Grand Total</td>
                    <td style="text-align: right"><?php echo 'Rp. '.number_format($total,0,",","."); ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <form>
              <div class="form-group">
                <label for="">Catatan</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
            </form>
            <a href="checkout.html"><button type="button" class="btn btn-secondary btn-keranjang">Pesan Sekarang</button></a>
          </div>
        </div>
      </div></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
  $('#provinsi').change(function(){
    $.post("<?php echo base_url(); ?>products/get_city/"+$('#provinsi').val(),function(obj){$('#kota').html(obj);});
    var prov = $('#provinsi option:selected').attr('prov');
    $('#prov').val(prov);
    $('#kot').val('');
  });
  $('#kota').change(function(){
    var kot = $('#kota option:selected').attr('kot');
    $('#kot').val(kot);
  });
  function cekongkir(){
      // var w = $('#kota_asal').val();
      var x = $('#kota').val();
      var y = $('#berat-total').val();
      var z = $('#courier').val();
      var h = $('#total-hitung').text();
      var jumlah = $('#jumlah').val();
      var weight = y*jumlah;
      var harga = $('#harga-total').val();
      var url = "<?php echo base_url(); ?>products/ongkir?origin=469&originType=city&destination="+x+"destinationType=city&berat="+y+"&courier="+z;
      $.post("<?php echo base_url(); ?>products/ongkir?origin=469&originType=city&destination="+x+"destinationType=city&berat="+weight+"&courier="+z+"&harga="+harga,
        function(obj){
          $('#layanan').html(obj);
        });
    };
    $('#courier').change(function(){
      // var w = $('#kota_asal').val();
      var x = $('#kota').val();
      var y = $('#berat-total').val();
      var z = $('#courier').val();
      var h = $('#total-hitung').text();
      var jumlah = $('#jumlah').val();
      var weight = y;
      var harga = $('#harga-total').val();
      var url = "<?php echo base_url(); ?>products/checkout_ongkir?origin=469&originType=city&destination="+x+"&destinationType=city&berat="+y+"&courier="+z;
      $.post("<?php echo base_url(); ?>products/checkout_ongkir?origin=469&originType=city&destination="+x+"&destinationType=city&berat="+weight+"&courier="+z+"&harga="+harga,
        function(obj){
          $('#layanan').html(obj);
        });
    });
    $('#layanan').change(function(){
      var ongkir = $('#layanan option:selected').attr('data-ongkir');
      var total = $('#layanan option:selected').attr('data-total');
      $('#ongkir').html(ongkir);
      $('#grand-total').html(total);
      console.log(ongkir);
      console.log(total);
    });
  </script>