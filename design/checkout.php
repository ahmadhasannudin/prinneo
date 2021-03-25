<?php
require('autoload.php');
require('lib_connector.php');
global $lumise;

$data = $lumise->connector->get_session('lumise_cart');
$items = isset($data['items']) ? $data['items'] : null;
$fields = array(
  array('email', 'Billing E-Mail'),
  array('address', 'Street Address'),
  array('zip', 'Zip Code'),
  array('city', 'City'),
  array('country', 'Country')
);

$page_title = $lumise->lang('Checkout');
include(theme('ci-header.php'));
?>
<div id="banner">
  <div class="container">
    <h2 class="title-banner">Tinjauan Pesanan</h2>  
  </div>
</div>
<form action="<?php echo $lumise->cfg->url;?>process_checkout.php" method="post" class="form-horizontal" id="checkoutform" accept-charset="utf-8">
<div id="main" class="cart-bg">
  <div class="container">
    <div class="row">
      <?php if(count($items) > 0):?>
      <div class="col-md-6">
        <h3 class="subtitle-main">Informasi Pembayaran</h3>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Nama depan*</label>
              <input type="text" class="form-control" id="" placeholder="Isikan nama depan Anda">
            </div>
            <div class="form-group col-md-6">
              <label for="">Nama belakang*</label>
              <input type="text" class="form-control" id="" placeholder="Isikan nama belakang Anda">
            </div>
          </div>
          <div class="form-group">
            <label for="">Email*</label>
            <input type="email" class="form-control" id="" placeholder="Masukkan email Anda">
          </div>
          <div class="form-group">
            <label for="">Alamat*</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Masukkan alamat Anda"></textarea>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Kabupaten*</label>
              <input type="text" class="form-control" id="" placeholder="Masukkan kabupaten">
            </div>
            <div class="form-group col-md-6">
              <label for="inputState">Provinsi*</label>
              <select id="inputState" class="form-control">
                <option selected>--pilih--</option>
                <option>...</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Kode Pos*</label>
              <input type="number" class="form-control" id="" placeholder="Masukkan kode pos">
            </div>
            <div class="form-group col-md-6">
              <label for="">No Hp*</label>
              <input type="number" class="form-control" placeholder="Masukkan no hp">
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-6">
        <h3 class="subtitle-main">Tinjau Pesanan</h3>

        <div class="table-responsive">
          <table class="table cart">
            <thead class="table-head-cart">
              <tr>
                <th colspan="2">Produk</th>
                <th>Spesifikasi</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $total = 0;
              foreach($items as $item):

                $cart_data = $lumise->lib->get_cart_item_file($item['file']);
                $meta = $lumise->lib->cart_meta($cart_data);
                $item = array_merge($item, $cart_data);

                ?>
                <tr class="gr">
                  <td class="cart-produk">
                    <?php

                    if(count($item['screenshots'])> 0):
                      foreach($item['screenshots'] as $image):?>
                        <img width="150" src="<?php echo $lumise->cfg->upload_url.$image; ?>" />
                      <?php endforeach;
                    endif;
                    ?>
                  </td>
                  <td>
                    <b><?php echo $item['product_name'];?></b> <br>
                    
                  </td>
                  <td>
                    <?php foreach($meta as $me): ?>
                     <p>
                       <strong><?php echo $me['name']; ?></strong> : <?php echo $me['value']; ?>
                     </p>
                   <?php endforeach;?>
                 </td>
                 <td class="st"><?php echo $lumise->lib->price($item['price']['total']);?><?php $total += $item['price']['total'];?></td>
               </tr>
             <?php endforeach;?>
             <tr>
              <td colspan="3" class="text-right"><strong><?php echo $lumise->lang('Sub Total'); ?></strong></td>
              <td class="text-right"><?php echo $lumise->lib->price($total);?></td>
            </tr>
            <tr>
              <td colspan="3" class="text-right"><strong><?php echo $lumise->lang('Grand Total'); ?></strong></td>
              <td class="text-right"><?php $grand_total = $total;?><?php echo $lumise->lib->price($grand_total);?></td>
            </tr>
          </tbody>
        </table>
      </div>
        <div class="form-group">
          <label for="">Catatan</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
      <button name="submit" type="submit" class="btn btn-secondary btn-keranjang">Pesan Sekarang</button>
    </div>
     <?php else:?>
        <div class="span12">
          <p><?php echo $lumise->lang('Your cart is currently empty.'); ?></p>
        </div>
        <div class="form-actions">
          <a href="http://prinneo.com/home" class="btn btn-large btn-primary"><?php echo $lumise->lang('Continue Shopping'); ?></a>
        </div>
      <?php endif;?>
  </div>
</div>
</div>
</form>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $("#checkoutform").validate();
  });
</script>
<?php
include(theme('ci-footer.php'));
//update cart info

$data['total'] = $grand_total;
$lumise->connector->set_session('lumise_cart', $data);
