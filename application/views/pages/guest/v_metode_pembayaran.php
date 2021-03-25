<div id="banner">
  <div class="container">
    <h2 class="title-banner">Metode Pembayaran</h2>  
  </div>
</div>  

<!-- konten blog -->
<div id="main">
  <div class="container">
    <form>
      <div class="row">
        <div class="col-md-6 mb-4">
          <h3 class="subtitle-main">Pilih Metode Pembayaran Anda</h3>
          <div class="table-responsive-sm">
            <table class="table">
              <tbody>
                <?php $no = 1; foreach ($banks as $key => $value): ?>  
                <tr>
                  <td class="align-middle"> 
                    <div class="form-check mr-3">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios<?php echo $no ?>" value="<?php echo $value->bank_id ?>" <?php if ($no==1): ?> checked <?php endif ?>>
                    </div>
                  </td>
                   <td>
                    <img src="<?php echo base_url().'assets/images/img_banks/'.$value->bank_img ?>" style="width: 100px;" for="exampleRadios<?php echo $no ?>">
                  </td>
                  <td class="align-middle">
                   <label class="form-check-label" for="exampleRadios<?php echo $no ?>">
                    <?php echo $value->bank_name ?>
                  </label><br>
                  <label class="form-check-label" for="exampleRadios<?php echo $no ?>">
                    Atas Nama <?php echo $value->bank_account_name ?>
                  </label><br>
                  <label class="form-check-label" for="exampleRadios<?php echo $no ?>">
                   <?php echo $value->bank_account_number ?>
                  </label>
                </td>
              </tr>
                <?php $no++; endforeach ?>

            </tbody>
          </table>
        </div>
        <button type="submit" class="btn btn-secondary btn-keranjang">Pilih Metode Pembayaran</button>
      </div>
      <div class="col-md-6">
        <h3 class="subtitle-main">Tinjau Pesanan</h3>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th width="20%">Gambar Produk</th>
                <th>Nama Produk</th>
                <th>Qty</th>
                <th>Sub total</th>
              </tr>
            </thead>
            <tbody>
              <?php $total = 0; foreach ($this->cart->contents() as $cart => $value) { ?>
                <tr>
                  <td><img class="img-fluid" src="<?php echo base_url('assets/images/img_products/'.$value['product_image']);?>" alt=""></td>
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
          
        </div>
      </div>
    </form>
  </div>
</div>
