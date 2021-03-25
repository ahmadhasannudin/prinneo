<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 border-bottom">
    <h1 class="h2">Update Product</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo site_url('manage/products') ?>">
        <button class="btn btn-sm btn-outline-success"> <i class="fa fa-arrow-left mr-2"></i>Kembali</button></a>
      </div>
    </div>
    <?php echo $this->session->flashdata('notifikasi'); ?>
    <div class="row my-4">
      <div class="col-md-7 ">
        <!-- Goals -->
        <div class="header mt-md-6">
        </div>
        <div class="card mb-3">
          <div class="card-header">
            <h6>Informasi Produk</h6>
          </div>
          <div class="card-body">
            <?php
            print_r(validation_errors());
            echo validation_errors('<div class="alert alert-danger">', '</div>');
            ?>
            <form class="" action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="product_name" value="<?php echo $product_details->product_name ?>" required>
              </div>
              <div class="form-group">
                <label>Kategori</label>
                <select class="form-control custom-select" name="product_category_id" id="product_category_id">
                  <option selected disabled> Pilih Kategori </option>
                  <?php foreach ($product_categorys as $product_category): ?>
                    <option value="<?php echo $product_category->product_category_id ?>" <?php if($product_category->product_category_id == $product_details->product_category_id){ echo "selected"; } ?>><?php echo $product_category->product_category_name ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Sub-kategori</label>
                <select class="form-control custom-select" name="product_sub_category_id" id="product_sub_category_id">
                  <option selected disabled>Pilih Sub Kategori</option>
                </select>
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea name="product_description" class="form-control" id="editor"><?php echo $product_details->product_description ?></textarea>
              </div>
              <div class="form-group">
                <label>Penetapan Harga</label>
                <textarea name="product_determination_price" class="form-control" id="editor1">
                  <?php echo $product_details->product_determination_price ?>
                </textarea>
              </div>
              <div class="form-group">
                <label>Kegunaan</label>
                <textarea name="product_usability" class="form-control" id="editor2">
                  <?php echo $product_details->product_usability ?>
                </textarea>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <!-- Goals -->
          <div class="header mt-md-6">
          </div>
          <div class="card mb-3">
            <div class="card-header">
              <h6>Image Produk</h6>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Image :</label> <br>
                <div class="text-center">
                  <img src="<?php echo base_url('assets/images/img_products/'.$product_details->product_image) ?>" class="text-center mb-3" alt="" style="width:70%">
                </div>
                <input type="hidden" name="product_image_old" value="<?php echo $product_details->product_image ?>">
                <input type="file" class="form-control" placeholder="" name="product_image">
                <strong><small style="float:right;color:crimson;">Ukuran image max : 150 kb</small></strong>
                <br>
                <strong><small style="float:right;color:crimson;">Resolusi max : 960 x 960 pixel</small></strong>
              </div>
            </div>
          </div>
          <div class="card mb-3">
            <div class="card-header">
              <h6>Informasi Advanced</h6>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label>Start Price</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                      </div>
                      <input type="number" id="harga-awal" name="product_start_price" class="form-control" value="<?php echo $product_details->product_start_price ?>" >
                      <!-- <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                      </div> -->
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label>Weight</label>
                    <div class="input-group mb-3">
                      <input type="number" name="product_weight" class="form-control" value="<?php echo $product_details->product_weight ?>">
                      <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">Gram</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 mb-4">
                  <div class="card">
                    <div class="card-header">

                      <label>Spesifikasi Produk</label>
                    </div>
                    <div class="card-body">
                      <?php echo $product_details->product_calc_html ?>
                      <div class="row mb-4">
                        <div class="col-6">
                         <button class="btn btn-primary" type="button" onclick="cek_harga()">Cek Harga</button>
                       </div>
                       <div class="col-6">
                        <h3 class="total-deskripsi text-right" id="total-hitung" style="font-size: 13pt">Total:<?php echo 'Rp. '.number_format($product_details->product_start_price,0,",","."); ?></h3>
                        <h4 class="satuan-deskripsi text-right" id="satuan-hitung" style="font-size: 10pt">Satuan : <?php echo 'Rp. '.number_format($product_details->product_start_price,0,",","."); ?></h4>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="button" class="btn btn-sm btn-primary mt" data-toggle="modal" data-target="#script-spesifikasi">Edit Spesifikasi</button>
                  </div>
                  
                </div>
              </div>

            </div>
            
            <div class="form-group">
              <label>Layanan yang ditampilkan</label>
              <select class="form-control custom-select"  name="product_service" required>
                <option value="0" <?php if($product_details->product_service=='0'){ echo "selected"; }?>>Jasa Desain | Desain Sendiri | Upload Desain </option>
                <option value="1" <?php if($product_details->product_service=='1'){ echo "selected"; }?>>Hanya Pembelian</option>
              </select>
            </div>
            <div class="form-group">
              <label>Status Product</label>
              <select class="form-control custom-select" name="product_status" required>
                <option value="0" <?php if($product_details->product_status=='0'){ echo "selected"; }?>>Pending</option>
                <option value="2" <?php if($product_details->product_status=='2'){ echo "selected"; }?>>Ready</option>
                <option value="1" <?php if($product_details->product_status=='1'){ echo "selected"; }?>>Published</option>
              </select>
            </div>

            <div class="form-group">
              <label>Product Base</label>
              <select class="form-control select-options"  name="product_lumise_link" required>
                <option value="0" selected disabled>Pilih Product base</option>
                <option value="0" <?php if ($product_details->product_lumise_link=='0') {
                  echo 'selected'; } ?>>Kosong</option>
                  <?php foreach ($product_base as $product): ?>
                    <option value="<?php echo $product->id ?>" <?php if ($product->id==$product_details->product_lumise_link) {
                      echo 'selected'; } ?>><?php echo $product->name  ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary"> <i class="fas fa-check mr-2"></i>Update</button>
              </div>
            </div>
          </div>

        </div>
      </form>
    </main>
    <div class="modal fade" id="script-spesifikasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <?php
          echo validation_errors('<div class="alert alert-danger">', '</div>');
          echo form_open_multipart(site_url('manage/products/update_script/'.$product_details->product_id)) ?>
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Form Perhitungan Harga</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-row">
              <div class="col-6">
                <label>Script Perhitungan HTML</label>
                <textarea name="product_calc_html" class="form-control" rows="25" cols="80" style="font-size: 10px;"><?php echo $product_details->product_calc_html ?></textarea>
              </div>
              <div class="col-6">
               <label>Script Perhitungan JS</label>
               <textarea name="product_calc_js" class="form-control" rows="25" cols="80" style="font-size: 10px;"><?php echo $product_details->product_calc_js ?></textarea>
             </div>
           </div>
         </div>
         <div class="modal-footer">         
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
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
</script>

