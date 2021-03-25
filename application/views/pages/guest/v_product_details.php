    <!-- banner -->
    <div id="banner" style="background-image: url(<?php echo base_url().'assets/images/img_product_sub_categorys/'.$product_details->product_sub_category_image ?>);background-size: cover;">
      <div class="container">
        <h2 class="title-banner"><?php echo $product_details->product_name ?></h2>
      </div>
    </div>

    <!-- konten blog -->
    <div id="main">
      <div class="container">
        <div class="row">
          <!-- kategori dekstop -->
          <div class="col-md-3 d-none d-sm-block">
            <div class="row">
              <div class="card">
                <div class="card-header kategori">Kategori Produk</div>
                <div class="card-body kategori top">

                  <?php foreach ($product_categorys as $key => $category): ?>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                          <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#accordion<?php echo $category->product_category_id ?>" aria-expanded="true" aria-controls="collapseOne">
                              <?php echo strtoupper($category->product_category_name) ?>
                            </a>
                          </h4>
                        </div>
                        <div id="accordion<?php echo $category->product_category_id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">
                            <?php foreach ($product_sub_categorys as $key => $sub_category): ?>
                              <?php if ($sub_category->product_category_id==$category->product_category_id): ?>
                                <a href="<?php echo base_url().'products/sub_category/'.strtolower($sub_category->product_sub_category_slug) ?>" class="subkategori">> <?php echo $sub_category->product_sub_category_name ?></a> <br>
                              <?php endif ?>
                            <?php endforeach ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach ?>

                </div>
              </div>

              <div class="card">
                <div class="card-header kategori">Login Customer</div>
                <div class="card-body kategori">
                  <div class="modal-body">
                    <form action="<?php echo base_url().'login' ?>" method="post">
                      <div class="form-group">
                        <span>Email</span>
                        <input type="email" class="form-control" id="" placeholder="Masukkan email Anda" name="user_email">
                      </div>
                      <div class="form-group">
                        <span>Password</span>
                        <p class="float-right"><a href="<?php echo base_url().'forgot-password' ?>" style="color: red"> Lupa Password?</a></p>
                        <input type="password" class="form-control" id="" placeholder="Masukkan password Anda" name="user_password">
                      </div>
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="gridCheck">
                          <label class="form-check-label" for="gridCheck">
                            Tetap login
                          </label>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-modal-login">Login</button>
                      <center><p>Belum punya akun? <a href="<?php echo base_url().'daftar' ?>" style="color: red">Daftar</a></p></center>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div> 

          <div class="col-md-9">
            <form id="form-harga" action="<?php echo base_url().'cart/add' ?>" method="POST" enctype='multipart/form-data'>
              <div class="row">
                <div class="card deskripsi">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?php echo site_url('home') ?>">Home</a></li>
                      <li class="breadcrumb-item"><a href="<?php echo site_url('products/category/'.strtolower($product_sub_category_details->product_category_slug)) ?>"><?php echo $product_sub_category_details->product_category_name ?></a></li>
                      <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo site_url('products/sub_category/'.strtolower($product_sub_category_details->product_sub_category_slug)) ?>"><?php echo $product_sub_category_details->product_sub_category_name ?></a></li>
                    </ol>
                  </nav>
                  <div class="deskripsi-produk">
                    <div class="row">
                      <div class="col-md-6">
                        <img class="img-fluid deskripsi" src="<?php echo base_url('assets/images/img_products/'.$product_details->product_image) ?>" alt="judul-artikel">
                        <div class="row" style="font-size: 13px;">
                          <div class="col-5">
                            <div class="row">
                              <div class="col-7">
                                <p>Konsultasi :</p>
                              </div>
                              <div class="col-5 text-right">
                                <p class="icon" style="font-size: 11px">
                                  <a href="whatsapp://send?text=Halo Admin Prinneo, Saya mau konsultasi tentang produk <?php echo base_url(); ?>products/detail/<?php echo $product_details->product_slug; ?>" target="_blank"><i class="fab fa-whatsapp-square fa-2x" style="color: #28a745;"></i></a>
                                </p>
                              </div>
                            </div>
                          </div>
                          <div class="col-7">
                            <div class="row">
                              <div class="col-5">
                                <p>Bagikan :</p>
                              </div>
                              <div class="col-7 text-right">
                                <p class="icon" style="font-size: 11px">
                                  <a href="https://www.facebook.com/sharer.php?u=<?php echo base_url(); ?>products/detail/<?php echo $product_details->product_slug; ?>" target="_blank"><i class="fab fa-facebook fa-2x" style="color: #007bff;"></i></a>
                                  <a href="https://twitter.com/share?url=<?php echo base_url(); ?>products/detail/<?php echo $product_details->product_slug; ?>&amp;text=Produk Prinneo<?php echo $product_details->product_name; ?>&amp;hashtags=Prinneo" target="_blank"><i class="fab fa-twitter-square fa-2x" style="color: #00b8ff;"></i></a> 
                                  <a href="https://social-plugins.line.me/lineit/share?url=<?php echo base_url(); ?>products/detail/<?php echo $product_details->product_slug; ?>"  target="_blank"><i class="fab fa-line fa-2x" style="color: #26cc32"></i></a>
                                  <a href="https://t.me/share/url?url=<?php echo base_url(); ?>products/detail/<?php echo $product_details->product_slug; ?>&text=Produk Prinneo<?php echo $product_details->product_name ?>"  target="_blank"><i class="fab fa-telegram fa-2x" style="color: #0c98ce"></i></a>
                                </p>
                              </div>
                            </div>
                          </div>
                          
                          
                        </div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item pr-1" style="width: 120px">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Deskripsi</a>
                          </li>
                          <li class="nav-item pr-1">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Penetapan harga</a>
                          </li>
                          <li class="nav-item pr-1" style="width: 123px">
                            <a class="nav-link" id="kegunaan-tab" data-toggle="tab" href="#kegunaan" role="tab" aria-controls="kegunaan" aria-selected="false">Kegunaan</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <?php echo $product_details->product_description ?>
                          </div>
                          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <?php echo $product_details->product_determination_price ?>
                          </div>
                          <div class="tab-pane fade" id="kegunaan" role="tabpanel" aria-labelledby="kegunaan-tab">
                           <?php echo $product_details->product_usability ?> 
                         </div>
                       </div>
                     </div>

                     <div class="col-md-6">
                      <h3 class="title-deskripsi">Spesifikasi Produk</h3>

                      <hr>
                      <?php echo $product_details->product_calc_html ?>
                      <div class="row mb-4">
                        <div class="col-6">
                         <button class="btn btn-warning" type="button" onclick="cek_harga()">Cek Harga</button>
                       </div>
                       <div class="col-6">
                         <h3 class="total-deskripsi font-weight-bold" id="total-hitung">Total: <?php echo 'Rp. '.number_format($product_details->product_start_price,0,",","."); ?></h3>
                         <h4 class="satuan-deskripsi" id="satuan-hitung">Harga satuan : <?php echo 'Rp. '.number_format($product_details->product_start_price,0,",","."); ?></h4>
                       </div>
                     </div>

                     <!-- estimasi onkir -->
                     <h3 class="title-deskripsi">Estimasi Ongkos Kirim</h3><hr>
                     <input type="number" name="berat-total" id="berat-total" value="<?php echo $product_details->product_weight ?>" hidden>
                     <input type="number" name="harga-total" id="harga-awal" value="<?php echo $product_details->product_start_price ?>" hidden>
                     <div class="form-group">
                      <label for="">Provinsi</label>
                      <select class="form-control rounded" name="provinsi" id="provinsi" >
                        <option>Pilih Provinsi Anda</option>
                        <?php $this->load->view('api/rj_get_provinsi'); ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Kabupaten</label>
                      <select class="form-control rounded" name="kota" id="kota">
                        <option >Pilih Kota Anda</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Kurir</label>
                      <select class="form-control rounded" name="kurir" id="courier">
                        <option value="jne">JNE</option>
                        <option value="pos">POS</option>
                        <option value="tiki">TIKI</option>
                        <option value="jnt">J&T</option>
                        <option value="ninja">Ninja</option>
                        <option value="lion">Lion Parcel</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <button class="btn btn-primary" type="button" onclick="cekongkir()">Cek Ongkos Kirim</button>
                    </div>
                    <div id="hasil"></div>
                    <h3 class="title-deskripsi">Pilih Layanan Desain ?</h3>
                    <div class="row">
                      <?php if ($product_details->product_service=='0'){ ?>                       
                        <div class="col-md-4">
                         <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                              <button type="submit" class="panel-title bg-danger" style="border:none;line-height: 1.2;width: 100%;padding: 0;text-align: left;">
                                <a role="button"  id="jasadesain" onclick="jasadesain()" style="color: white;cursor: pointer;">
                                  Jasa Desain <i class="fas fa-chevron-circle-right float-right"></i>
                                </a>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                       <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                          <div class="panel-heading" role="tab" id="headingOne">
                            <button class="panel-title bg-warning" style="border:none;line-height: 1.2;width: 100%;padding: 0;text-align: left;">
                              <a role="button" href="<?php echo base_url().'design/editor.php?product_base='.$product_details->product_lumise_link ?>" style="color:black">
                                Desain Sendiri <i class="fas fa-chevron-circle-right float-right"></i>
                              </a>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                     <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                          <button class="panel-title bg-success" style="border:none;line-height: 1.2;width: 100%;padding: 0;text-align: left;">
                            <a role="button" onclick="uploaddesain()" style="color:white;cursor: pointer;">
                              Upload Desain <i class="fas fa-chevron-circle-right float-right"></i>
                            </a>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php }else{ ?>
                  <div class="col-12">
                   <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="headingOne">
                        <input type="hidden" name="product_category_id" value="<?php echo $product_details->product_category_id ?>">
                        <input type="hidden" class="form-control" name="product_sub_category_id" value="<?php echo $product_details->product_sub_category_id ?>">
                        <input type="hidden" name="product_id" value="<?php echo $product_details->product_id ?>">
                        <input type="hidden" name="product_image" value="<?php echo $product_details->product_image ?>">
                        <input type="hidden" name="product_name" value="<?php echo $product_details->product_name ?>">
                        <textarea class="form-control" rows="3" placeholder="Masukkan pesan Anda" name="product_spesifikasi" id="spesifikasi" hidden=""></textarea>
                        <input type="hidden" name="price" id="price" value="">
                        <button type="submit" class="panel-title bg-success" onclick="cek_harga()" style="border:none;line-height: 1.2;width: 100%;padding: 0;text-align: left;">
                          <a style="color:white;cursor: pointer;">Beli <i class="fas fa-chevron-circle-right float-right"></i></a>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>

            </div>          

          </div>



        </div>
      </div>
    </div>
  </div>
</form>

</div>

</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php echo $product_details->product_calc_js ?> 
<script type="text/javascript">
  function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
  }
  function tambah_jumlah(e){
    var inputQuantityElement = $('#jumlah');
    var newQuantity = parseInt($(inputQuantityElement).val())+e;
    $('#jumlah').val(newQuantity);
    cek_harga();
  }
  function kurang_jumlah(e){
    var inputQuantityElement = $('#jumlah');
    var newQuantity = parseInt($(inputQuantityElement).val())-e;
    if (newQuantity<1) {
      newQuantity = 1;
    }
    $('#jumlah').val(newQuantity);
    cek_harga();
  }
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
  function jasadesain() {
   $('#form-harga').attr('action', '<?php echo base_url().'jasa/'.$product_details->product_slug ?>');
 }
 function uploaddesain() {
   $('#form-harga').attr('action', '<?php echo base_url().'upload/'.$product_details->product_slug ?>');
 }
 function addcart() {
   $('#form-harga').attr('action', '<?php echo base_url().'addcart/'.$product_details->product_id ?>');
 }
 function cekongkir(){
      // var w = $('#kota_asal').val();
      var x = $('#kota').val();
      var y = $('#berat-total').val();
      var z = $('#courier').val();
      var h = $('#total-hitung').text();
      var jumlah = $('#jumlah').val();
      var weight = y*jumlah;
      var del_total = h.replace("Total:","");
      var del_rp = del_total.replace("Rp.","")
      var harga = del_rp.replace(".","")
      var url = "<?php echo base_url(); ?>products/ongkir?origin=469&originType=city&destination="+x+"destinationType=city&berat="+y+"&courier="+z;
      $.post("<?php echo base_url(); ?>products/ongkir?origin=469&originType=city&destination="+x+"destinationType=city&berat="+weight+"&courier="+z+"&harga="+harga,
        function(obj){
          $('#hasil').html(obj);
        });
    };
    $('#courier').change(function(){
      // var w = $('#kota_asal').val();
      var x = $('#kota').val();
      var y = $('#berat-total').val();
      var z = $('#courier').val();
      var h = $('#total-hitung').text();
      var jumlah = $('#jumlah').val();
      var weight = y*jumlah;
      var del_total = h.replace("Total:","");
      var del_rp = del_total.replace("Rp.","")
      var harga = del_rp.replace(".","")
      var url = "<?php echo base_url(); ?>products/ongkir?origin=469&originType=city&destination="+x+"destinationType=city&berat="+y+"&courier="+z;
      $.post("<?php echo base_url(); ?>products/ongkir?origin=469&originType=city&destination="+x+"destinationType=city&berat="+weight+"&courier="+z+"&harga="+harga,
        function(obj){
          $('#hasil').html(obj);
        });
    });
  </script>