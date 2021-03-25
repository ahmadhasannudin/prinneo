<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Bank</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo site_url('manage/banks') ?>">
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
            <h6>Update Bank</h6>
          </div>
          <div class="card-body">
            <?php
            print_r(validation_errors());
            echo validation_errors('<div class="alert alert-danger">', '</div>');
            ?>
            <form class="" action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nama Bank</label>
                <input type="text" class="form-control" name="bank_name" value="<?php echo $bank_details->bank_name ?>" required>
              </div>
              <div class="form-group">
                <label>No. Rekening</label>
                <input type="text" class="form-control" name="bank_account_number" value="<?php echo $bank_details->bank_account_number ?>" required>
              </div>
              <div class="form-group">
                <label>Nama Pemilik Rekening</label>
                <input type="text" class="form-control" name="bank_account_name" value="<?php echo $bank_details->bank_account_name ?>" required>
              </div>
              <div class="form-group" >
                <label>Gambar lama :</label>
                <img src="<?php echo base_url(); ?>assets/images/img_banks/<?php echo $bank_details->bank_img; ?>" alt="<?php echo $bank_details->bank_name; ?>"  class="img-thumbnail"  />
                <input class="form-control" name="bank_img_old" id="bank_img_old" type="text" value="<?php echo $bank_details->bank_img ?>" hidden>
              </div>
              <div class="form-group">
                <label>Upload baru :</label>
                <input type="file" class="form-control"  name="bank_img">
                <strong><small style="float:right;color:crimson;">Ukuran image max : 250 kb</small></strong>
                <br>
                <strong><small style="float:right;color:crimson;">Resolusi max : 100 x 100 pixel</small></strong>
              </div>
              <div class="text-right">
                <a>
                  <input type="hidden" name="bank_id" value="<?php echo $bank_details->bank_id ?>">
                  <button type="submit" class="btn btn-primary"> <i class="fas fa-check mr-2"></i>Update</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </main>
