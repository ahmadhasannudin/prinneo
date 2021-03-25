<?php
require('autoload.php');
require('lib_connector.php');
global $lumise, $lumise_helper;

$data = $lumise->connector->get_session('lumise_cart');
$items = isset($data['items']) ? $data['items'] : null;
$fields = array(
    array('email', 'Billing E-Mail'),
    array('address', 'Street Address'),
    array('zip', 'Zip Code'),
    array('city', 'City'),
    array('country', 'Country')
);


$lumise_helper->process_cart();
$page_title = 'Shopping Cart';


// echo "<pre>";
// print_r($product_categories);
// exit();
include(theme('ci-header.php'));
?>
<div id="banner">
    <div class="container">
        <h2 class="title-banner">Tinjauan Pesanan</h2>  
    </div>
</div> 
<div id="main" class="cart-bg">
  <div class="container">
    <div class="row justify-content-center">
        <?php
        $lumise_helper->show_sys_message();
        ?>
        <?php if(count($items) > 0):?>
            <div class="table-responsive">
                <table class="table cart">
                  <thead class="table-head-cart">
                    <tr>
                      <th colspan="2">Produk</th>
                      <th>Spesifikasi</th>
                      <th>Jumlah</th>
                      <th>Total</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                $total = 0;
                $index = 0;
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
                        <b><?php echo $item['product_name'];?></b> 
                        <br>
                        <a href="<?php echo $lumise->cfg->tool_url;?>?product_base=<?php echo $item['product_id'];?>&cart=<?php echo $item['cart_id'];?>" type="button" class="btn btn-success btn-cart"><i class="fa fa-pencil-square-o"></i></a>
                        <a href="<?php echo $lumise->cfg->url;?>cart.php?action=remove&item=<?php echo $item['cart_id'];?>" type="button" class="btn btn-danger btn-cart"><i class="fa fa-trash"></i></a>
                    </td>
                    <td>
                     <?php foreach($meta as $me): ?>
                        <p>
                            <strong><?php echo $me['name']; ?></strong> : <?php echo $me['value']; ?>
                        </p>
                    <?php endforeach;?>
                </td>
                <td>
                    <center>
                      <div class="form-group">
                        <?php echo $item['qty'];?>
                    </div>
                </center>
            </td>
            <td class="st"><?php echo $lumise->lib->price($item['price']['total']);?>
            <?php $total += $item['price']['total'];?></td>
        </tr>

        <?php 
        $index++;
    endforeach;
    ?>
    <tr class="ch">
      <td colspan="2">
        <a href="<?php echo $lumise->cfg->url;?>checkout.php" type="button" class="btn btn-secondary btn-keranjang"><?php echo $lumise->lang('Proceed To Checkout'); ?></a>
    </td>
    <td colspan="3" style="text-align: right; font-weight: bold;">Total  <?php echo $lumise->lib->price($total);?></td>
</tr>

</tbody>
</table>
</div>
<?php else:?>
    <div class="span12">
        <p><?php echo $lumise->lang('Your cart is currently empty.'); ?></p>
    </div>
    <div class="form-actions">
        <a href="http://prinneo.com/home" class="btn btn-large btn-primary">
            <?php echo $lumise->lang('Continue Shopping'); ?>
        </a>
    </div>
<?php endif;?>
</div>
</div>
</div>


<?php
include(theme('ci-footer.php'));
$lumise->connector->set_session('lumise_cart', $data);
