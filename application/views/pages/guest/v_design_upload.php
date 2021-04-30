 <!-- banner -->
 <div id="banner">
   <div class="container">
     <h2 class="title-banner">Upload Desain </h2>
   </div>
 </div>

 <!-- konten blog -->
 <div id="main">
   <div class="container">
     <div class="row ">
       <div class="col-md-7">
         <form id="form-konfirmasi" action="<?php echo base_url() . 'cart/add_cart_upload' ?>" onsubmit="return false;" method="POST" enctype='multipart/form-data'>
           <h3 class="title-deskripsi" style="font-size: 10px">Jasa Desain / <?php echo $product_details->product_category_name ?> / <?php echo $product_details->product_sub_category_name ?></h3>
           <hr>
           <div class="form-group">
             <label for="">Nama Lengkap</label>
             <input type="text" name="nama_order" class="form-control" id="" placeholder="Masukkan nama lengkap Anda">
           </div>
           <div class="form-row">
             <div class="form-group col-md-6">
               <label for="">No Hp</label>
               <div class="input-group mb-3">
                 <div class="input-group-prepend">
                   <span class="input-group-text" id="basic-addon1">+62</span>
                 </div>
                 <input type="number" name="nohp_order" class="form-control" placeholder="Masukkan no hp Anda" value="<?php echo $this->session->userdata('user_phone') ?>">
               </div>
             </div>
             <div class="form-group col-md-6">
               <label for="">Email</label>
               <input type="email" name="email_order" class="form-control" id="" placeholder="Masukkan email Anda">
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
               <input type="text" class="form-control" name="product_sub_category_name" value="<?php echo $product_details->product_sub_category_name ?>" readonly>
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
                 <input type="text" class="form-control" name="kode_order" value="<?php echo sprintf("%06d", mt_rand(1, 9999999999)); ?>" aria-label="Username" aria-describedby="basic-addon1" style="background-color: white" readonly>
               </div>
             </div>
             <div class="card-body">
               <div class="form-group">
                 <label for="">Upload Refrensi Desain</label>
                 <input type="file" class="form-control-file" name="file_order">
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
                         <button class="btn btn-warning" type="submit" id="button-addon2">Gunakan</button>
                       </div>
                     </div>
                   </div>
                   <p style="font-size: 10px">PENTING :</p>
                   <ul style="font-size: 10px;padding-left: 15px;">
                     <li>Saya telah memverivikasi desain bahwa ejaan dan isinya sudah benar.</li>
                     <li>Saya Mengerti bahwa dokumen yang saya kirim akan dicetak persis seperti file yang saya kirim.</li>
                     <li>Saya Bertanggung jawab atas file yang sudah saya kirim, apabila ada kesalahan ketik, format dan desain setelah file dikirim.</li>
                     <li>Saya Bertanggung jawab atas semua materi (isi konten dan desain) file yang saya kirim</li>
                   </ul>
                 </div>
                 <div class="col-md-4">
                   <input type="hidden" name="product_id" value="<?php echo $product_details->product_id ?>" readonly>
                   <input type="hidden" name="product_name" value="<?php echo $product_details->product_name ?>" readonly>
                   <input type="hidden" name="jenis_order" value="upload" readonly>
                   <input type="hidden" name="product_image" value="<?php echo $product_details->product_image ?>" readonly>
                   <input type="hidden" name="berat-total" id="berat-total" value="<?php echo $product_details->product_weight ?>" readonly>
                   <input type="hidden" name="harga-total" id="harga-awal" value="<?php echo $product_details->product_start_price ?>" readonly>
                   <textarea class="form-control" rows="3" placeholder="Masukkan pesan Anda" name="product_spesifikasi" id="spesifikasi" readonly hidden></textarea>
                   <input type="hidden" name="price" id="price" value="" readonly>
                   <button type="submit" class="btn btn-success p-3">Add to Cart<i class="fa fa-arrow-right ml-2"></i></button>
                 </div>
               </div>
             </div>
           </div>

         </form>
       </div>
       <div class="col-md-5">
         <h3 class="title-deskripsi">Deskripsi Upload Desain</h3>
         <hr>
         <h4 style="font-size: 1.2rem">Acuan Pengiriman / Upload File Desain :</h4>
         <ul style="font-size: 15px;padding-left: 15px;">
           <li>File harus dalam bentuk Ai, cdr, pdf, svg</li>
           <li>File harus benar hasil desain bukan hasil foto atau scan</li>
           <li>File benar-benar siap print tanpa kami setting ulang.</li>
           <li>File harus sesuai dengan ukuran asli produk (100%) bukan skala</li>
         </ul>
         <h3 class="text-center" style="color: red">PERINGATAN</h3>
         <p class="text-center">Dalam Proses cetak, hasil warna akan ada perbedaan dengan tampilan komputer atau hasil mesin vendor lain (tidak akan sama persis 100%)</p>
         <p class="text-center"> File yang dikirim akan diperiksa tim kami, apabila tidak memenuhi standar siap cetak akan dikembalikan untuk revisi.</p>
         <p class="text-center"> Kami membuat produk berdasarkan pesanan, semua akibat dan hasil pembuatan diluar tanggung jawab kami.</p>
       </div>
     </div>
   </div>
 </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <?php echo $product_details->product_calc_js ?>
 <script type="text/javascript">
   $(document).ready(function() {
     cek_harga();
   })

   function formatNumber(num) {
     return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
   }

   function tambah_jumlah(e) {
     var inputQuantityElement = $('#jumlah');
     var newQuantity = parseInt($(inputQuantityElement).val()) + e;
     $('#jumlah').val(newQuantity);
     cek_harga();
   }

   function kurang_jumlah(e) {
     var inputQuantityElement = $('#jumlah');
     var newQuantity = parseInt($(inputQuantityElement).val()) - e;
     if (newQuantity < 1) {
       newQuantity = 1;
     }
     $('#jumlah').val(newQuantity);
     cek_harga();
   }
 </script>