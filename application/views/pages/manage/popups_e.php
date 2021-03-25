<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Pop-up</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo site_url('manage/popups') ?>">
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
            <h6>Update Pop-up</h6>
          </div>
          <div class="card-body">
            <?php
            print_r(validation_errors());
            echo validation_errors('<div class="alert alert-danger">', '</div>');
            ?>
            <form class="" action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Link Pop-up</label>
                <input type="text" class="form-control" name="popup_link" value="<?php echo $popup_details->popup_link ?>" required>
              </div>
              <div class="form-group">
                <label>Image Pop-up :</label>
                <input type="file" class="form-control" placeholder="" name="popup_image">
                <input type="hidden" name="popup_image_old" value="<?php echo $popup_details->popup_image ?>">
                <strong><small style="float:right;color:crimson;">Ukuran image max : 150 kb</small></strong>
                <br>
                <strong><small style="float:right;color:crimson;">Resolusi max : 960 x 960 pixel</small></strong>
              </div>
              <div class="form-group">
                <label>Meta Image</label>
                <input type="text" class="form-control" name="popup_image_meta" value="<?php echo $popup_details->popup_image_meta ?>" required>
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
            <img src="<?php echo base_url('assets/images/img_popups/'.$popup_details->popup_image) ?>" style="width:100%;">
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
