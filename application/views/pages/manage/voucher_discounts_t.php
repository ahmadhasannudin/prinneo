<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Voucher Discount</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo site_url('manage/voucher_discounts') ?>">
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
            <h6>Tambah Voucher Discount Baru</h6>
          </div>
          <div class="card-body">
            <?php
            print_r(validation_errors());
            echo validation_errors('<div class="alert alert-danger">', '</div>');
            ?>
            <form class="" action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nama Voucher Discount</label>
                <input type="text" class="form-control" name="voucher_discount_name" value="" required>
              </div>
              <div class="form-group">
                <label>Kode Voucher</label>
                <input type="text" class="form-control" name="voucher_discount_code" value="" required>
              </div>
              <div class="form-group">
                <label>Kuota</label>
                <input type="number" class="form-control" name="voucher_discount_quota" value="" required>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 ">
          <!-- Goals -->
          <div class="header mt-md-6">
          </div>
          <div class="card">
            <div class="card-header">
              <h6>Detail Voucher</h6>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Value Voucher ( Nominal / Percent )</label>
                <input type="text" class="form-control" name="voucher_discount_value" value="" required>
              </div>
              <div class="form-group">
                <label>Tipe Voucher</label><br>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="customRadioInline1" name="voucher_discount_type" value="Nominal" class="custom-control-input">
                  <label class="custom-control-label" for="customRadioInline1">Nominal</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="customRadioInline2" name="voucher_discount_type" value="Percent" class="custom-control-input">
                  <label class="custom-control-label" for="customRadioInline2">Percent</label>
                </div>
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
