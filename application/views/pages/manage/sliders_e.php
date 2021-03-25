<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Slider</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo site_url('manage/sliders') ?>">
        <button class="btn btn-sm btn-outline-success"> <i class="fa fa-arrow-left mr-2"></i>Kembali</button></a>
      </div>
    </div>
    <?php echo $this->session->flashdata('notifikasi'); ?>
    <div class="row my-4">
      <div class="col-md-6 ">
        <!-- Goals -->
        <div class="header mt-md-6">
        </div>
        <div class="card">
          <div class="card-header">
            <h6>Update Slider</h6>
          </div>
          <div class="card-body">
            <?php
            print_r(validation_errors());
            echo validation_errors('<div class="alert alert-danger">', '</div>');
            ?>
            <form class="" action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Title Slider</label>
                <input type="text" class="form-control" name="slider_title" value="<?php echo $slider_details->slider_title ?>" required>
              </div>
              <div class="form-group">
                <label>Caption Slider</label>
                <input type="text" class="form-control" name="slider_caption" value="<?php echo $slider_details->slider_caption ?>" required>
              </div>
              <div class="form-group">
                <label>Link Slider</label>
                <textarea class="form-control" name="slider_link" required><?php echo $slider_details->slider_link ?></textarea>
              </div>
              <div class="form-group">
                <label>Image Slider :</label>
                <input type="file" class="form-control" placeholder="" name="slider_image">
                <input type="hidden" name="slider_image_old" value="<?php echo $slider_details->slider_image ?>">
                <strong><small style="float:right;color:crimson;">Ukuran image max : 350 kb</small></strong>
                <br>
                <strong><small style="float:right;color:crimson;">Resolusi max : 1280 x 527 pixel</small></strong>
              </div>
              <div class="text-right">
                <a>
                  <button type="submit" class="btn btn-primary"> <i class="fas fa-check mr-2"></i>Update</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </form>
      <div class="col-md-6 ">
        <!-- Goals -->
        <div class="header mt-md-6">
        </div>
        <div class="card">
          <div class="card-header">
            <h6>Image</h6>
          </div>
          <div class="card-body">
            <img src="<?php echo base_url('assets/images/img_sliders/'.$slider_details->slider_image) ?>" style="width:100%;">
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
