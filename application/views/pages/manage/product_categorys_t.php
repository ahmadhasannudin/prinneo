<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Product Kategori</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo site_url('manage/product_categorys') ?>">
        <button class="btn btn-sm btn-outline-success"> <i class="fa fa-arrow-left mr-2"></i>Kembali</button></a>
      </div>
    </div>
    <div class="row my-4">
      <div class="col-md-6 ">
        <div class="card">
          <div class="card-header">
            <h6>Tambah Product Kategori Baru</h6>
            </div>
            <div class="card-body">
              <?php
              print_r(validation_errors());
              echo validation_errors('<div class="alert alert-danger">', '</div>');
              ?>
              <form class="" action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" class="form-control" name="product_category_name" value="" placeholder="Masukan Deskripsi Kategori Produk" required>
              </div>
              <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="form-control" name="product_category_desk" placeholder="Masukan Deskripsi Kategori Produk"></textarea>
              </div>
              

            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              Gambar
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Image :</label>
                <input type="file" class="form-control" placeholder="" name="product_category_image">
                <strong><small style="float:right;color:crimson;">Ukuran image max : 350 kb</small></strong>
                <br>
                <strong><small style="float:right;color:crimson;">Resolusi max : 310 x 250 pixel</small></strong>
              </div>
              <div class="text-right mt-4">
                <a>
                  <button type="submit" class="btn btn-primary"> <i class="fas fa-plus-circle mr-2"></i>Tambah</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      </form>
    </main>
