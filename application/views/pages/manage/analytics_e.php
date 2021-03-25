<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Analytics</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo site_url('manage/contacts') ?>">
        <button class="btn btn-sm btn-outline-success"> <i class="fa fa-arrow-left mr-2"></i>Kembali</button></a>
      </div>
    </div>
    <?php echo $this->session->flashdata('notifikasi');      ?>
    <div class="row my-4">
      <?php
      print_r(validation_errors());
      echo validation_errors('<div class="alert alert-danger">', '</div>');
      ?>

      <div class="col-md-6 ">
        <div class="card">
          <div class="card-header">
            <h6>Google Analytics</h6>
          </div>
          <div class="card-body">
            <form class="" action="" method="post" enctype="multipart/form-data">
              
              <div class="form-group">
                <label>Google Script</label>
                <textarea name="google_script" class="form-control" rows="4" cols="80" required><?php echo $contact_details->google_script ?></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6>Facebook Pixel</h6>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Facebook Script</label>
                <textarea name="fb_script" class="form-control" rows="4" cols="80" required><?php echo $contact_details->fb_script ?></textarea>
              </div>
              <div class="text-right">
                <a>
                  <input type="hidden" name="contact_id" value="<?php echo $contact_details->contact_id ?>">
                  <button type="submit" class="btn btn-primary"> <i class="fas fa-check mr-2"></i>Update</button>
                </a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </form>
  </main>
  