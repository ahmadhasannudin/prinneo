  <link href="<?php echo base_url(); ?>vendor/css/tagsinput.css" rel="stylesheet" type="text/css">
<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Artikel</h1>

    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo site_url('manage/blogs') ?>">
        <button class="btn btn-sm btn-outline-success"><i class="fa fa-arrow-left mr-2"></i>Kembali</button></a>

      </div>

    </div>
    <?php
    echo validation_errors('<div class="alert alert-danger">', '</div>');
    echo form_open_multipart(site_url('manage/blogs/add')) ?>
    <div class="row my-4">


      <div class="col-md-8">

        <!-- Goals -->
        <div class="header mt-md-6">

        </div>
        <div class="card">
          <div class="card-header">
            <h6>Tambah Artikel Baru</h6>
          </div>
          <div class="card-body">


            <div class="form-group">
              <label>Judul artikel :</label>
              <input type="text" class="form-control" placeholder="Masukkan Nama Artikel Baru" name="blog_title" required>
            </div>
            <div class="form-group">
              <label>Excerpt :</label>
              <textarea name="blog_exerpt" class="form-control" placeholder="Masukkan Kutipan Artikel Baru" required></textarea>
            </div>
            <div class="form-group">
              <label> Isi artikel :</label>
              <textarea name="blog_description" id="editor"></textarea>
            </div>        

          </div>
        </div>

      </div>

      <div class="col-md-4">

        <!-- Goals -->
        <div class="card mb-2">
          <div class="card-header">
            <h6>Publish Artikel</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label>Gambar artikel :</label>
              <input type="file" class="form-control"  name="blog_image">
              <strong><small style="float:right;color:crimson;">Ukuran image Max : 150 kb</small></strong>
              <br>
              <strong><small style="float:right;color:crimson;"> Resolusi max : 1000 x 625 pixel</small></strong>
            </div>
            <div class="form-group">
              <label>Penulis artikel :</label>
              <input type="text" class="form-control" placeholder="Masukkan Penulis artikel Baru" name="blog_author" required>
            </div>
            <div class="form-group">
              <label>Status artikel :</label>
              <select class="custom-select form-control" name="blog_status">
                <option selected value="published">Published</option>
                <option value="pending">Pending</option>
              </select>
            </div>
            <div class="form-group">
              <label>Tanggal publish :</label>
              <input type="date" class="form-control" placeholder="Masukkan Penulis artikel Baru" name="blog_date" required>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h6>Kategori Artikel</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label>Kategori</label>
              <select class="form-control" name="blog_category">
                <option value="" selected disabled>Pilih Kategori</option>
                <?php foreach ($blog_categorys as $blog_category): ?>
                  <option value="<?php echo $blog_category->blog_category_id ?>"><?php echo $blog_category->blog_category_name ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Tags :</label>
              <input type="text" class="form-control" data-role="tagsinput" value="" name="blog_tags" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Submit</button>
          </div>
        </div>
      </div>
    </div>
    <?php echo form_close(); ?>
  </main>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>
<script src="<?php echo base_url(); ?>vendor/js/tagsinput.js"></script>
