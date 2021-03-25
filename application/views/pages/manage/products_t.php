<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Product</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo site_url('manage/products') ?>">
        <button class="btn btn-sm btn-outline-success"> <i class="fa fa-arrow-left mr-2"></i>Kembali</button></a>
      </div>
    </div>
    <?php echo $this->session->flashdata('notifikasi'); ?>
    <div class="row my-4">
      <div class="col-md-6 ">
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
                <input type="text" class="form-control" name="product_name" value="" required>
              </div>
              <div class="form-group">
                <label>Kategori</label>
                <select class="form-control custom-select" name="product_category_id" id="product_category_id">
                  <option selected disabled> Pilih Kategori </option>
                  <?php foreach ($product_categorys as $product_category): ?>
                    <option value="<?php echo $product_category->product_category_id ?>"><?php echo $product_category->product_category_name ?></option>
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
                <textarea name="product_description" class="form-control" id="editor"></textarea>
              </div>
              <div class="form-group">
                <label>Penetapan Harga</label>
                <textarea name="product_determination_price" class="form-control" id="editor1">
                  <?php echo "<table border='1' cellpadding='1' cellspacing='1' style='width:100%''>
                  <tbody>
                  <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  </tr>
                  <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  </tr>
                  <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  </tr>
                  </tbody>
                  </table>"; ?>
                </textarea>
              </div>
              <div class="form-group">
                <label>Kegunaan</label>
                <textarea name="product_usability" class="form-control" id="editor2"></textarea>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <!-- Goals -->
          <div class="header mt-md-6">
          </div>
          <div class="card mb-3">
            <div class="card-header">
              <h6>Image Produk</h6>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Image :</label>
                <input type="file" class="form-control" placeholder="" name="product_image">
                <strong><small style="float:right;color:crimson;">Ukuran image max : 150 kb</small></strong>
                <br>
                <strong><small style="float:right;color:crimson;">Resolusi max : 620 x 500 pixel</small></strong>
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
                      <input type="number" name="product_start_price" class="form-control" value="">
                      <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label>Weight</label>
                    <div class="input-group mb-3">
                      <input type="number" name="product_weight" class="form-control" value="">
                      <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">Gram</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Script Perhitungan HTML</label>
                <textarea name="product_calc_html" class="form-control" rows="7" cols="80"></textarea>
              </div>
              <div class="form-group">
                <label>Script Perhitungan JS</label>
                <textarea name="product_calc_js" class="form-control" rows="6" cols="80"></textarea>
              </div>
              <div class="form-group">
                <label>Layanan yang ditampilkan</label>
                <select class="form-control custom-select"  name="product_service" id="exampleFormControlSelect1" required>
                    <option value="0" selected>Jasa Desain | Desain Sendiri | Upload Desain </option>
                    <option value="1">Hanya Pembelian</option>
                </select>
              </div>
              <div class="form-group">
                <label>Status Product</label>
                <select class="form-control custom-select" name="product_status" id="exampleFormControlSelect1" required>
                  <option value="0" selected>Pending</option>
                  <option value="2">Ready</option>
                  <option value="1">Published</option>
                </select>
              </div>
              <div class="form-group">
                <label>Product Base</label>
                <select class="form-control select-options"  name="product_lumise_link" required>
                  <option value="0" selected disabled>Pilih Product base</option>
                  <option value="0">Kosong</option>
                  <?php foreach ($product_base as $product): ?>
                    <option value="<?php echo $product->id ?>"><?php echo $product->name ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
        
      </div>
    </form>
  </main>
