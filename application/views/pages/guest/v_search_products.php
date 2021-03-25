<!-- banner -->
<div id="banner">
  <div class="container">
    <h2 class="title-banner"><?php echo $banner ?></h2>  
  </div>
</div>  

<!-- konten blog -->
<div id="main">
  <div class="container">
    <div class="row">
      <!-- kategori dekstop -->
      <div class="col-md-3 d-none d-sm-block">
        <div class="row">
          <div class="card">
            <div class="card-header kategori">Kategori Produk</div>
            <div class="card-body kategori top">

              <?php foreach ($product_categorys as $key => $category): ?>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#accordion<?php echo $category->product_category_id ?>" aria-expanded="true" aria-controls="collapseOne">
                          <?php echo strtoupper($category->product_category_name) ?>
                        </a>
                      </h4>
                    </div>
                    <div id="accordion<?php echo $category->product_category_id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                      <div class="panel-body">
                        <?php foreach ($product_sub_categorys as $key => $sub_category): ?>
                          <?php if ($sub_category->product_category_id==$category->product_category_id): ?>
                            <a href="<?php echo base_url().'products/sub_category/'.$sub_category->product_sub_category_slug ?>" class="subkategori">> <?php echo $sub_category->product_sub_category_name ?></a> <br>
                          <?php endif ?>
                        <?php endforeach ?>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach ?>

            </div>
          </div>

          <div class="card">
            <div class="card-header kategori">Login Customer</div>
            <div class="card-body kategori">
              <div class="modal-body">
                <form action="<?php echo base_url().'login' ?>" method="post">
                  <div class="form-group">
                    <span>Email</span>
                    <input type="email" class="form-control" id="" placeholder="Masukkan email Anda" name="user_email">
                  </div>
                  <div class="form-group">
                    <span>Password</span>
                    <p class="float-right"><a href="<?php echo base_url().'forgot-password' ?>" style="color: red"> Lupa Password?</a></p>
                    <input type="password" class="form-control" id="" placeholder="Masukkan password Anda" name="user_password">
                  </div>
                  <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck">
                      <label class="form-check-label" for="gridCheck">
                        Tetap login
                      </label>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-modal-login">Login</button>
                  <center><p>Belum punya akun? <a href="<?php echo base_url().'daftar' ?>" style="color: red">Daftar</a></p></center>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div> 

      <div class="col-md-9">
        <div class="row">
          <?php foreach ($data->result() as $key => $value): ?>
          <div class="col-md-4 box-shadow">
            <div class="card" style="border-radius: 10px; border: 1px solid #b5b5b5;">
              <img class="card-img-top" src="<?php echo base_url().'assets/images/img_products/'.$value->product_image ?>" alt="<?php echo $value->product_name ?>" style="border-top-left-radius: 9px;  border-top-right-radius: 9px;">
              <div class="card-body text-center" style="height: 160px;">
                <h5 class="title-best-seller"><a href="<?php echo base_url().'products/detail/'.$value->product_slug ?>"><?php echo $value->product_name ?></a></h5>
                <p class="text-best-seller">Mulai dari Rp <?php echo $value->product_start_price ?></p>
                <a href="<?php echo base_url().'products/detail/'.$value->product_slug ?>"><button type="button" class="btn btn-primary btn-best-seller">Detail</button></a>
              </div>
            </div>
          </div>
          <?php endforeach ?>

          <!-- pagination -->

        </div>    
      </div>

    </div>
  </div>
  <!-- kategori lainnya -->
  
</div>