<body>
  <div class="wrapper">
    <nav id="sidebar">
      <div class="sidebar-header">
        <center>
          <img src="<?php echo base_url(); ?>assets/images/img_users/<?php echo $this->session->userdata('user_photo'); ?>" alt="Foto_Profil" class="rounded-circle coba mb-2" width="50%">
          <br>
          <span><?php echo $this->session->userdata('user_name'); ?></span>
          <hr>
        </center>
      </div>
      <ul class="list-unstyled components">
        <li class="active">
          <a href="<?php echo base_url('manage/dasbor'); ?>"><i class="fas fa-tachometer-alt pr-2"></i> Dasboard</a>
        </li>
        <li>
          <a href="#blogs" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed"><i class="fas fa-newspaper pr-2"></i> Blogs </a>
          <ul class="list-unstyled collapse" id="blogs" style="">
            <li>
              <a href="<?php echo base_url('manage/blog_categorys'); ?>"> Kategori Artikel</a>
            </li>
            <li>
              <a href="<?php echo base_url('manage/blogs'); ?>"> Artikel </a>
            </li>
            <li>
              <a href="<?php echo base_url('manage/aboutUs'); ?>"> About Us</a>
            </li>
            <li>
              <a href="<?php echo base_url('manage/dropship'); ?>"> Dropship</a>
            </li>
            <li>
              <a href="<?php echo base_url('manage/karir'); ?>"> Karir</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#products" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed"><i class="fas fa-box-open pr-2"></i> Products </a>
          <ul class="list-unstyled collapse" id="products" style="">
            <li>
              <a href="<?php echo base_url('manage/product_categorys'); ?>"> Kategori Produk </a>
            </li>
            <li>
              <a href="<?php echo base_url('manage/product_sub_categorys'); ?>"> Sub Kategori Produk </a>
            </li>
            <li>
              <a href="<?php echo base_url('manage/products'); ?>"> Produk Management</a>
            </li>
            <li>
              <a href="<?php echo base_url('manage/product_design'); ?>"> Produk Desain</a>
            </li>
          </ul>
        </li>
        <li class="">
          <a href="<?php echo base_url('manage/contacts/saran'); ?>"><i class="far fa-comments pr-2"></i> Kritik & Saran</a>
        </li>
        <li>
          <a href="#transaksi" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed"><i class="fas fa-chart-bar pr-2"></i> Transaksi </a>
          <ul class="list-unstyled collapse" id="transaksi" style="">
            <li>
              <a href="<?php echo base_url('manage/orders'); ?>"> Orders </a>
            </li>
            <li>
              <a href="<?php echo base_url('manage/konfirmasi_pembayaran'); ?>"> Konfirmasi Pembayaran </a>
            </li>
            <li>
              <a href="<?php echo base_url('manage/jasa_desain'); ?>"> Jasa Desain</a>
            </li>
            <li>
              <a href="<?php echo base_url('manage/upload_desain'); ?>"> Upload Desain</a>
            </li>
            <li>
              <a href="<?php echo base_url('manage/kode_promo'); ?>"> Kode Promo</a>
            </li>
          </ul>
        </li>


        <li>
          <a href="#users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed"><i class="fas fa-user-cog pr-2"></i> Users Management </a>
          <ul class="list-unstyled collapse" id="users" style="">
            <li>
              <a href="<?php echo base_url('manage/superadmins'); ?>"> Super Admin </a>
            </li>
            <li>
              <a href="<?php echo base_url('manage/admins'); ?>"> Admin</a>
            </li>
            <li>
              <a href="<?php echo base_url('manage/productions'); ?>"> Produksi</a>
            </li>
            <li>
              <a href="<?php echo base_url('manage/designers'); ?>"> Desainer</a>
            </li>
            <li>
              <a href="<?php echo base_url('manage/customers'); ?>"> Customer</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#appearance" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed"><i class="fas fa-sliders-h pr-2"></i> Appearance </a>
          <ul class="list-unstyled collapse" id="appearance" style="">
            <li>
              <a href="<?php echo base_url('manage/sliders'); ?>"> Sliders </a>
            </li>
            <li>
              <a href="<?php echo base_url('manage/popups'); ?>"> Popups</a>
            </li>
            <li>
              <a href="<?php echo base_url('manage/testimonials'); ?>"> Testimoni</a>
            </li>
            <li>
              <a href="<?php echo base_url('manage/faqs'); ?>"> FAQs</a>
            </li>
            <li>
              <a href="<?php echo base_url('manage/contacts'); ?>"> Profile</a>
            </li>
            <li>
              <a href="<?php echo base_url('manage/analytics'); ?>"> Analytics</a>
            </li>
            <li>
              <a href="<?php echo base_url('manage/banks'); ?>"> Banks</a>
            </li>
          </ul>
        </li>
        <!-- <li>
          <a href="#tools" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed"><i class="fas fa-cog pr-2"></i> Tools Management </a>
          <ul class="list-unstyled collapse" id="tools" style="">
            <li>
              <a href="<?php echo base_url('manage/tools/googleanalytics'); ?>"> Google Analytics </a>
            </li>
            <li>
              <a href="<?php echo base_url('manage/tools/fbpixel'); ?>"> Facebook Pixel</a>
            </li>
          </ul>
        </li> -->
        <!-- <li class="">
          <a href="<?php echo base_url('manage/banks'); ?>"><i class="fas fa-university pr-2"></i> Banks Management</a>
        </li>
        <li class="">
          <a href="<?php echo base_url('manage/sliders'); ?>"><i class="fas fa-images pr-2"></i> Sliders Management</a>
        </li>
        <li class="">
          <a href="<?php echo base_url('manage/popups'); ?>"><i class="fas fa-image pr-2"></i> Popups Management</a>
        </li>
        <li class="">
          <a href="<?php echo base_url('manage/faqs'); ?>"><i class="fas fa-question-circle pr-2"></i> FAQs Management</a>
        </li>
        <li class="">
          <a href="<?php echo base_url('manage/testimonials'); ?>"><i class="fab fa-gratipay pr-2"></i> Testimonials Management</a>
        </li>
        <li class="">
          <a href="<?php echo base_url('manage/contacts'); ?>"><i class="fas fa-phone pr-2"></i> Contacts Management</a>
        </li>
        <li>
          <a href="#vouchers" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed"><i class="fas fa-money-check pr-2"></i> Vouchers Management </a>
          <ul class="list-unstyled collapse" id="vouchers" style="">
            <li>
              <a href="<?php echo base_url('manage/voucher_discounts'); ?>"> Voucher Discount </a>
            </li>
            <li>
              <a href="<?php echo base_url('manage/voucher_cashbacks'); ?>"> Voucher Cashback</a>
            </li>
          </ul>
        </li> -->
        <li>
          <a href="<?php echo base_url('login/logout'); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </li>
      </ul>
    </nav>