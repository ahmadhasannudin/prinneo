<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Product Sub-Kategori</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo site_url('manage/product_sub_categorys') ?>">
        <button class="btn btn-sm btn-outline-success"> <i class="fa fa-arrow-left mr-2"></i>Kembali</button></a>
      </div>
    </div>
    <div class="row my-4">
      <div class="col-md-6 ">
        <div class="card">
          <div class="card-header">
            <h6>Update Product Sub-Kategori</h6>
            </div>
            <div class="card-body">
              <?php
              print_r(validation_errors());
              echo validation_errors('<div class="alert alert-danger">', '</div>');
              ?>
              <form class="" action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nama Sub Kategori</label>
                <input type="text" class="form-control" name="product_sub_category_name" value="<?php echo $product_sub_category_details->product_sub_category_name ?>" required>
              </div>
              <div class="form-group">
                <label>Kategori</label>
                <select class="form-control" name="product_category_id" id="product_category_id">
                  <?php foreach ($product_categorys as $product_category): ?>
                    <option value="<?php echo $product_category->product_category_id ?>" <?php if ($product_category->product_category_id==$product_sub_category_details->product_category_id) { echo "selected"; } ?>><?php echo $product_category->product_category_name ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Image :</label>
                <img src="<?php echo base_url('assets/images/img_product_sub_categorys/'.$product_sub_category_details->product_sub_category_image) ?>" class="mb-3" style="width:100%" alt="">
                <input type="hidden" name="product_sub_category_image_old" value="<?php echo $product_sub_category_details->product_sub_category_image ?>">
                <input type="file" class="form-control" placeholder="" name="product_sub_category_image">
                <strong><small style="float:right;color:crimson;">Ukuran image max : 350 kb</small></strong>
                <br>
                <strong><small style="float:right;color:crimson;">Resolusi max : 1280 x 143 pixel</small></strong>
              </div>
              <div class="text-right mt-4">
                <a>
                  <button type="submit" class="btn btn-primary"> <i class="fas fa-check mr-2"></i>Update</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      </form>
    </main>
