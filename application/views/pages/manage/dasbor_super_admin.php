<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
      </div>

    </div>
  </div>
  <?php echo $this->session->flashdata('notifikasi'); ?>
  <div class="row card-hover">
    <div class="col-12 col-lg-6 col-xl my-2">
      <a href="<?php echo base_url().'manage/products'; ?>">
        <div class="card">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-12">
                <h6 class="card-title text-uppercase text-muted mb-2">
                  Products
                </h6>
                <hr>
              </div>
              <div class="col">
                <span class="h6 mb-0">
                  <?php echo $count['product_categorys']; ?> Kategori
                </span>
                <br>
                <span class="h6 mb-0 mt-4 ">
                 <?php echo $count['product_sub_categorys']; ?> Sub Kategori
                </span>
                <br>
                <span class="h6 mb-0 mt-4 ">
                  <?php echo $count['products']; ?> Produk
                </span>
              </div>
              <div class="col-auto">
                <span class="h2 fas fa-box-open mb-0"></span>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>

    <div class="col-12 col-lg-6 col-xl my-2">
      <a href="<?php echo base_url().'manage/product_design'; ?>">
        <div class="card">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-12">
                <h6 class="card-title text-uppercase text-muted mb-2">
                  Products Base
                </h6>
                <hr>
              </div>
              <div class="col mb-3">
                <span class="h6 mb-0">
                  <?php echo $count['base_categorys']; ?> Kategori
                </span>
                <br>
                <span class="h6 mb-0 mt-4 ">
                  <?php echo $count['base_products']; ?> Produk
                </span>
              </div>
              <div class="col-auto">
                <span class="h2 fas fa-box mb-0"></span>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>

    <div class="col-12 col-lg-6 col-xl my-2">
      <a href="<?php echo base_url().'manage/blogs'; ?>">
        <div class="card">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-12">
                <h6 class="card-title text-uppercase text-muted mb-2">
                  Blogs
                </h6>
                <hr>
              </div>
              <div class="col ">
                <span class="h6 mb-0">
                  <?php echo $count['blog_categorys']; ?> Kategori Artikel
                </span>
                <br>
                <span class="h6 mb-0  ">
                  <?php echo $count['published']; ?> Published
                </span>
                <br>
                <span class="h6 mb-0  ">
                  <?php echo $count['pending']; ?> Pending
                </span>
                <br>
              </div>
              <div class="col-auto">
                <span class="h2 far fa-newspaper  mb-0"></span>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>

    <div class="col-12 col-lg-6 col-xl my-2">
      <a href="<?php echo base_url().'manage/contacts/saran'; ?>">
        <div class="card">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-12">
                <h6 class="card-title text-uppercase text-muted mb-2">
                  Saran
                </h6>
                <hr>
              </div>
              <div class="col mb-3">
                <div class="row align-items-center no-gutters">
                  <div class="col-auto">
                    <span class="h1 mr-2 mb-0">
                      <?php echo $count['saran']; ?>
                    </span>
                  </div>
                </div> 
              </div>
              <div class="col-auto">
                <span class="h2 far fa-comments mb-0"></span>
              </div>
            </div> 
          </div>
        </div>
      </a>
    </div>

  </div>


  <div class="row card-hover">


    <div class="col-12 col-lg-6 col-xl my-2">
      <a href="<?php echo base_url().'manage/orders'; ?>">
        <div class="card">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-12">
                <h6 class="card-title text-uppercase text-muted mb-2">
                  Transaksi
                </h6>
                <hr>
              </div>
              <div class="col mb-3">
                <span class="h6 mb-0">
                  <?php echo $count['pemesanan']; ?> Pemesanan
                </span>
                <br>
                <span class="h6 mb-0 mt-4 ">
                  <?php echo $count['konfirmasi']; ?> Konfirmasi
                </span>
              </div>
              <div class="col-auto">
                <span class="h2 fas fa-box mb-0"></span>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>

    

    <div class="col-12 col-lg-6 col-xl my-2">
      <a href="<?php echo base_url().'manage/customers'; ?>">
        <div class="card">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-12">
                <h6 class="card-title text-uppercase text-muted mb-2">
                  User Management
                </h6>
                <hr>
              </div>
              <div class="col ">
                <div class="row align-items-center no-gutters">
                  <div class="col-auto">
                    <span class="h6 mb-0">
                      <?php echo $count['customer']; ?> Customer
                    </span>
                    <br>
                    <span class="h6 mb-0">
                     <?php echo $count['desainer']; ?> Designer
                    </span>
                    <br>
                    <span class="h6 mb-0">
                      <?php echo $count['admin']; ?> Admin
                    </span>
                    <br>
                  </div>
                </div> 
              </div>
              <div class="col-auto">
                <span class="h2 fas fa-user mb-0"></span>
              </div>
            </div> 
          </div>
        </div>
      </a>
    </div>

  </div>


</main>