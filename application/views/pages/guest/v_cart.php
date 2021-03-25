<div id="banner">
  <div class="container">
    <h2 class="title-banner">Tinjauan Pesanan</h2>  
  </div>
</div> 
<div id="main" class="cart-bg">
  <div class="container">
    <div class="row justify-content-center">
      <?php if ($this->cart->contents()!=null){ 
        $total = 0;
        ?>
        <div class="table-responsive">
          <table class="table table-striped cart">
            <thead class="table-head-cart">
              <tr>
                <th colspan="2">Produk</th>
                <th>Spesifikasi</th>
                <th>Jumlah</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($this->cart->contents() as $cart => $value) { ?>
                <tr class="gr">
                  <td class="cart-produk">
                    <img width="150" src="<?php echo base_url('assets/images/img_products/'.$value['product_image']);?>" />
                  </td>
                  <td>
                    <b><?php echo $value['name'] ?></b> 
                    <br>
                    <?php if ($value['jenis_order']!='beli'): ?>
                      <a href="<?php echo base_url() ?>" type="button" class="btn btn-success btn-cart"><i class="fa fa-pencil-square-o"></i></a>
                    <?php endif ?>
                    <a href="<?php echo base_url().'cart/delete_cart/'.$value['rowid']; ?>" type="button" class="btn btn-danger btn-cart"><i class="fa fa-trash"></i></a>
                  </td>
                  <td>
                   <p><?php echo $value['product_spesifikasi'] ?></p>
                 </td>
                 <td width="15%">
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <a href="<?php echo base_url().'cart/add_qty?id='.$value['rowid'].'&qty='.($value['qty']-1) ?>" class="btn btn-primary" type="button" id="button-addon1" >-</a>
                      </div>
                      <input type="number" name="qty" id="jumlah-<?php echo $value['id']; ?>" class="form-control" min="1" placeholder="10" aria-label="Example text with button addon" aria-describedby="button-addon1" value="<?php echo $value['qty'] ?>" style="text-align:center;">
                      <div class="input-group-append">
                        <a href="<?php echo base_url().'cart/add_qty?id='.$value['rowid'].'&qty='.($value['qty']+1) ?>" class="btn btn-primary" type="button" id="button-addon2">+</a>
                      </div>
                    </div>
                  </div>
                </td>
                <td class="st"><?php echo 'Rp. '.number_format($value['subtotal'],0,",","."); ?> </td>
              </tr>
              <?php $total += $value['subtotal']; } ?>
              <tr class="ch">
                <td colspan="2">
                  <a href="<?php echo base_url().'checkout' ?>" type="button" class="btn btn-secondary btn-keranjang">Proceed To Checkout</a>
                </td>
                <td colspan="3" style="text-align: right; font-weight: bold;">Total <?php echo 'Rp. '.number_format($total,0,",","."); ?></td>
              </tr>

            </tbody>
          </table>
        </div>
        <?php 
      }else{ ?>
        <div class="row">
          <div class="col-12">
            <div class="span12">
              <p>Daftar Belanja Masih Kosong</p>
            </div>
          </div>
          <div class="col-12">
            <div class="form-actions">
              <a href="<?php echo base_url() ?>" class="btn btn-large btn-primary">
                Lanjutkan Belanja
              </a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
  function tambah_qty(cart_id){
    var rowid = cart_id;
    var qty = parseInt($('#jumlah').val())+1;
    console.log(rowid);
    console.log(qty);
    $.ajax({
      url:'<?php echo base_url('manage/cart/add_qty') ?>',
      data:'rowid='+rowid+'&qty='+qty,
      type:'post',
      success: function(response){
      $('#jumlah-'+rowid).val(newQuantity);
      $('#order_total').text(response);
      var inputTotal = $('#order_total');
      var newTotal = $(inputTotal).text();
      var extractTotal = newTotal.replace("Rp. ","");
      var finalTotal = extractTotal.split(".").join("");
      var piutang = parseInt(finalTotal) - parseInt(newPayment);
      $('#order_piutang').text('Rp. '+formatNumber(piutang));
      }
    });
  }
function showmsg(msg){
  var title     = "Invalid Data &nbsp; <span class='fa fa-exclamation-triangle text-warning'></span>";

  bootbox.alert({
    size:'small',
    title:title,
    message:msg,
    buttons:{
      ok:{
        label: 'OK',
        className: 'btn-warning'
      }
    }
  });
}
</script>
