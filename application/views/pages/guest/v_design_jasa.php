 <!-- banner -->
 <div id="banner">
  <div class="container">
    <h2 class="title-banner">Jasa Desain </h2>  
  </div>
</div>  

<!-- konten blog -->
<div id="main">
  <div class="container">
    <div class="row ">
      <div class="col-md-7">
        <form id="form-konfirmasi" action="<?php echo base_url().'cart/add_cart' ?>" method="POST" enctype='multipart/form-data'>
          <h3 class="title-deskripsi" style="font-size: 10px">Jasa Desain / <?php echo $product_details->product_category_name ?> / <?php echo $product_details->product_sub_category_name ?></h3>
          <hr>
          <div class="form-group">
            <label for="">Nama Lengkap</label>
            <input type="text" name="nama_order" class="form-control" id="" placeholder="Masukkan nama lengkap Anda" value="<?php echo $this->session->userdata('user_name') ?>">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">No Hp</label>
              <input type="number" name="nohp_order" class="form-control" id="" placeholder="Masukkan no hp Anda" value="<?php echo $this->session->userdata('user_phone') ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="">Email</label>
              <input type="email" name="email_order" class="form-control" id="" placeholder="Masukkan email Anda" value="<?php echo $this->session->userdata('user_email') ?>">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Kategori Produk</label>
              <input type="hidden" name="product_category_id" value="<?php echo $product_details->product_category_id ?>">
              <input type="text" class="form-control" name="product_category_name" value="<?php echo $product_details->product_category_name ?>" readonly>
            </div>
            <div class="form-group col-md-6">
              <label for="">Sub Kategori</label>
              <input type="hidden" class="form-control" name="product_sub_category_id" value="<?php echo $product_details->product_sub_category_id ?>">
              <input type="text" class="form-control" name="product_sub_category_name" value="<?php echo $product_details->product_sub_category_name?>" readonly>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              Spesifikasi Produk
            </div>
            <div class="card-body">
              <?php echo $product_details->product_calc_html ?>
              
            </div>
          </div>
          <p> Upload File <span style="color: #EE1A1A; font-size: 14px;"> (Ai, cdr, pdf, svg, File tidak boleh lebih dari 700 mb)</span></p>
          <div class="card">
            <div class="card-header" style="background-color: #fcef00">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">Kode Order</span>
                </div>
                <input type="text" class="form-control" name="kode_order" value="<?php echo sprintf("%06d", mt_rand(1, 9999999999)); ?>" aria-label="Username" aria-describedby="basic-addon1" style="background-color: white" readonly >
              </div>
            </div>
            <div class="card-body">
              <label for="">Refrensi Desain</label>
              <div class="form-row">
                <div class="form-group col-md-6">
                 <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <input type="radio" aria-label="Radio button for following text input" name="refrensi" value="Belum ada gambaran desain" onclick="belum()">
                    </div>
                  </div>
                  <input type="text" class="form-control" aria-label="Text input with radio button" value="Belum ada gambaran desain" readonly="">
                </div>
              </div>
              <div class="form-group col-md-6">
               <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <input type="radio" aria-label="Radio button for following text input" name="refrensi" value="Sudah Ada Refrensi Desain" onclick="sudah()">
                  </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with radio button" value="Sudah Ada Refrensi Desain" readonly="">
              </div>
            </div>
          </div>
          <div id="budget"></div>

          <div class="form-group">
            <label for="">Upload Refrensi Desain</label>
            <input type="file" class="form-control-file" id="" name="file_order">
          </div>
          <div class="form-group">
            <label for="">Keterangan desain yang diinginkan</label>
            <textarea class="form-control" id="" rows="3" placeholder="Masukkan pesan Anda" name="keterangan_order"></textarea>
          </div>
          <div class="row">
            <div class="col-md-8">
             <div class="form-group">
              <div class="input-group input-group-sm mb-3">
                <input type="text" class="form-control" placeholder="Masukan Kode Promo" aria-label="Example text with button addon" aria-describedby="button-addon1" name="kode_promo">
                <div class="input-group-append">
                  <button class="btn btn-warning" type="submit" id="button-addon2" >Gunakan</button>
                </div>
              </div>
            </div>
            <p style="font-size: 10px">PENTING :</p>
            <ul style="font-size: 10px;padding-left: 15px;">
              <li>Untuk anda yang sudah ada gambaran desain, tinggal upload gambar desain bisa cari refrensi dalam media online atau foto langsung refrensi desain yang diinginkan dan tambahkan keterangan desain yang anda inginkan dengan detail</li>
              <li>Untuk anda yang belum mempunyai gambaran buat sketsa secara tertulis atau gambarkan desain yang diinginkan dan kasih keterangan secara detail</li>
              <li>Dalam memberikan keterangan perhatikan detail ejaan, gelar, dan attribute lainya secara spesifik dan benar</li>
            </ul>
          </div>
          <div class="col-md-4">
            <input type="hidden" name="product_id" value="<?php echo $product_details->product_id ?>">
            <input type="hidden" name="product_name" value="<?php echo $product_details->product_name ?>">
            <input type="hidden" name="jenis_order" value="jasa">
            <input type="hidden" name="product_image" value="<?php echo $product_details->product_image ?>">
            <input type="hidden" name="berat-total" id="berat-total" value="<?php echo $product_details->product_weight ?>" >
            <input type="hidden" name="harga-total" id="harga-awal" value="<?php echo $product_details->product_start_price ?>" >
            <textarea class="form-control" rows="3" placeholder="Masukkan pesan Anda" name="product_spesifikasi" id="spesifikasi" hidden=""></textarea>
            <input type="hidden" name="price" id="price" value="">
            <button type="submit" class="btn btn-success p-3" onclick="cek_harga()">Checkout<i class="fa fa-arrow-right ml-2"></i></button>
          </div>
        </div>
      </div>
    </div>

  </form>
</div>
<div class="col-md-5">
  <h3 class="title-deskripsi">Deskripsi Jasa Desain</h3>
  <hr>
  <h4 style="font-size: 1.2rem" >Acuan Pengiriman / Upload File Gambaran Desain :</h4>
  <ul style="font-size: 15px;padding-left: 15px;">
    <li>Upload File Gambaran Bisa Berupa Foto, File, Atau Coretan, dll</li>
    <li>Kasih Keterangan yang jelas dan detauk desain produk yang anda inginkan</li>
    <li>Perhatikan dalam membuat keterangan desain yang diinginkan penulisan huruf, ejaan, gelar, dll yang baik dan benar.</li>
    <li>Setelah Order Produk tim desain kami akan langsung menghubungi anda untu mendiskusikan produk dan desain yang anda inginkan.</li>
    <li>Jasa Desain akan dikenakan biaya berdasarkan produk dan desain yang disepakati</li>
  </ul>
  <h3 class="text-center" style="color: red">PERINGATAN</h3>
  <p class="text-center">Jasa Desain Dikenakan Biaya tambahan dari produk yang anda pesan.</p>
  <p class="text-center">Dalam Proses cetak, hasil warna akan ada perbedaan dengan tampilan komputer atau hasil mesin vendor lain (tidak akan sama persis)</p>
  <p class="text-center"> Kami membuat produk berdasarkan pesanan, semua akibat dan hasil pembuatan diluar tanggung jawab kami.</p>
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
  function sudah() {
    let html = `
    <div class="card">
    <div class="card-header bg-warning text-right">
    Sudah Ada Refrensi Desain
    </div>
    <div class="card-body">
    <div class="form-group">
    <label for="">Pilih Budget Desain</label>
    <select class="form-control" id="" name="budget">
    <option value="10000">Rp. 10.000</option>
    <option value="20000">Rp. 20.000</option>
    </select>
    </div>
    </div>
    </div>
    `;
    $('#budget').html(html);
  }
  function belum() {
    let html = `
    <div class="card">
    <div class="card-header bg-warning">
    Belum Ada Refrensi Desain
    </div>
    <div class="card-body">
    <div class="form-group">
    <label for="">Pilih Budget Desain</label>
    <select class="form-control" id="" name="budget">
    <option value="100000">Rp. 100.000</option>
    <option value="200000">Rp. 200.000</option>
    </select>
    </div>
    </div>
    </div>
    `;
    $('#budget').html(html);
  }
</script>

