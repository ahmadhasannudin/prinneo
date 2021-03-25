<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Voucher Cashback</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo site_url('manage/voucher_cashbacks') ?>">
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
            <h6>Update Voucher Cashback</h6>
            </div>
            <div class="card-body">
              <?php
              print_r(validation_errors());
              echo validation_errors('<div class="alert alert-danger">', '</div>');
              ?>
              <form class="" action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nama Voucher Cashback</label>
                <input type="text" class="form-control" name="voucher_cashback_name" value="<?php echo $voucher_cashback_details->voucher_cashback_name ?>" required>
              </div>
              <div class="form-group">
                <label>Kode Voucher</label>
                <input type="text" class="form-control" name="voucher_cashback_code" value="<?php echo $voucher_cashback_details->voucher_cashback_code ?>" required>
              </div>
              <div class="form-group">
                <label>Kuota</label>
                <input type="number" class="form-control" name="voucher_cashback_quota" value="<?php echo $voucher_cashback_details->voucher_cashback_quota ?>" required>
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
                  <input type="text" class="form-control" name="voucher_cashback_value" value="<?php echo $voucher_cashback_details->voucher_cashback_value?>" required>
                </div>
                <div class="form-group">
                  <label>Tipe Voucher</label><br>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1" name="voucher_cashback_type" value="Nominal" class="custom-control-input" <?php if($voucher_cashback_details->voucher_cashback_type == 'Nominal'){ echo "checked";} ?>>
                    <label class="custom-control-label" for="customRadioInline1">Nominal</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="voucher_cashback_type" value="Percent" class="custom-control-input" <?php if($voucher_cashback_details->voucher_cashback_type == 'Nominal'){ echo "percent";} ?>>
                    <label class="custom-control-label" for="customRadioInline2">Percent</label>
                  </div>
                </div>
                <div class="text-right">
                  <a>
                    <input type="hidden" name="voucher_cashback_id" value="<?php echo $voucher_cashback_details->voucher_cashback_id ?>">
                    <button type="submit" class="btn btn-primary"> <i class="fas fa-check mr-2"></i>Update</button>
                  </a>
                </div>
              </div>
            </div>
          </div>
      </div>
      </form>
    </main>
