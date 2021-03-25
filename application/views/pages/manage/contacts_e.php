<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Contact</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo site_url('manage/dashboards') ?>">
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
            <h6>Update Contact</h6>
          </div>
          <div class="card-body">
            <form class="" action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="contact_description" class="form-control" rows="4" cols="80" required><?php echo $contact_details->contact_description ?></textarea>
              </div>
              <div class="form-group">
                <label>No. Telepon</label>
                <input type="text" class="form-control" name="contact_phone" value="<?php echo $contact_details->contact_phone ?>" required>
              </div>
              <div class="form-group">
                <label>No. Whatsapp</label>
                <input type="text" class="form-control" name="contact_whatsapp" value="<?php echo $contact_details->contact_whatsapp ?>" required>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="contact_email" value="<?php echo $contact_details->contact_email ?>" required>
              </div>
              <div class="form-group">
                <label>Waktu Buka</label>
                <textarea name="contact_time" class="form-control" rows="2" cols="80" required><?php echo $contact_details->contact_time ?></textarea>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <textarea name="contact_address" class="form-control" rows="4" cols="80" required><?php echo $contact_details->contact_address ?></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h6>Sosial Media</h6>
            </div>
            <div class="card-body">
              <div class="form-group" >
                <label>Logo Header :</label>
                <div class="row">
                  <div class="col-md-8">
                    <img src="<?php echo base_url(); ?>assets/images/home/<?php echo $contact_details->contact_logo_header; ?>"   class="slide-image " width="200px" />
                  </div>
                  <div class="col-md-4">
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#header">Ganti header</button>
                  </div>
                </div>
              </div>
              <div class="form-group" >
                <label>Logo Footer :</label>
                <div class="row">
                  <div class="col-md-8">
                    <img src="<?php echo base_url(); ?>assets/images/home/<?php echo $contact_details->contact_logo_footer; ?>"   class="slide-image  bg-dark" width="200px" />
                  </div>
                  <div class="col-md-4">
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#footer">Ganti Footer</button>
                  </div>
                </div>

              </div>
              <div class="form-group">
                <label>Facebook</label>
                <input type="text" class="form-control" name="contact_fb" value="<?php echo $contact_details->contact_fb ?>" required>
              </div>
              <div class="form-group">
                <label>Twitter</label>
                <input type="text" class="form-control" name="contact_tw" value="<?php echo $contact_details->contact_tw ?>" required>
              </div>
              <div class="form-group">
                <label>Youtube</label>
                <input type="text" class="form-control" name="contact_yt" value="<?php echo $contact_details->contact_yt ?>" required>
              </div>
              <div class="form-group">
                <label>Instagram</label>
                <input type="text" class="form-control" name="contact_ig" value="<?php echo $contact_details->contact_ig ?>" required>
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
  <div class="modal fade" id="header" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="<?php echo base_url().'manage/contacts/update_header' ?>" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ganti Logo Header</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
              <label>Upload Logo :</label>
              <input type="file" class="form-control"  name="contact_logo_header">
              <strong><small style="float:right;color:crimson;">Ukuran image Max : 250 kb</small></strong>
              <br>
              <strong><small style="float:right;color:crimson;"> Resolusi max : 167 x 53 pixel</small></strong>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Update</button>
      </div>
    </div>
</form>
  </div>
</div>
<div class="modal fade" id="footer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="<?php echo base_url().'manage/contacts/update_footer' ?>" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ganti Logo Footer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
              <label>Upload Logo :</label>
              <input type="file" class="form-control"  name="contact_logo_footer">
              <strong><small style="float:right;color:crimson;">Ukuran image Max : 250 kb</small></strong>
              <br>
              <strong><small style="float:right;color:crimson;"> Resolusi max : 167 x 53 pixel</small></strong>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Update</button>
      </div>
    </div>
</form>
  </div>
</div>
