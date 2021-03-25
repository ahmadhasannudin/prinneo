<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Blog Kategori</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo site_url('manage/blog_categorys') ?>">
        <button class="btn btn-sm btn-outline-success"> <i class="fa fa-arrow-left mr-2"></i>Kembali</button></a>
      </div>
    </div>
    <div class="row my-4">
      <div class="col-md-6 ">
        <!-- Goals -->
        <div class="header mt-md-6">
        </div>
        <div class="card">
          <div class="card-header">
            <h6>Update Blog Kategori</h6>
            </div>
            <div class="card-body">
              <?php
              print_r(validation_errors());
              echo validation_errors('<div class="alert alert-danger">', '</div>');
              ?>
              <form class="" action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" class="form-control" name="blog_category_name" value="<?php echo $blog_category_details->blog_category_name ?>" required>
              </div>
              <div class="text-right">
                <a>
                  <input type="hidden" name="blog_category_id" value="<?php echo $blog_category_details->blog_category_id ?>">
                  <button type="submit" class="btn btn-primary"> <i class="fas fa-check mr-2"></i>Update</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      </form>
    </main>
