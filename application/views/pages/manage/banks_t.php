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
            <h6>Tambah Bank Baru</h6>
          </div>
          <div class="card-body">
            <?php
            print_r(validation_errors());
            echo validation_errors('<div class="alert alert-danger">', '</div>');
            ?>
            <form class="" action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nama Bank</label>
                <input type="text" class="form-control" name="bank_name" value="" required>
              </div>
              <div class="form-group">
                <label>No. Rekening</label>
                <input type="text" class="form-control" name="bank_account_number" value="" required>
              </div>
              <div class="form-group">
                <label>Nama Pemilik Rekening</label>
                <input type="text" class="form-control" name="bank_account_name" value="" required>
              </div>
              <div class="form-group">
                <label>Logo bank :</label>
                <input type="file" class="form-control"  name="bank_img">
                <strong><small style="float:right;color:crimson;">Ukuran image Max : 150 kb</small></strong>
                <br>
                <strong><small style="float:right;color:crimson;"> Resolusi max : 100 x 100 pixel</small></strong>
              </div>
              <div class="text-right">
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
