<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 border-bottom">
    <h1 class="h2">Form
      <?php
      if ($this->uri->segment(2) == 'superadmins') {
        echo 'Super Admin';
      }
      if ($this->uri->segment(2) == 'admins') {
        echo 'Admin';
      }
      if ($this->uri->segment(2) == 'productions') {
        echo 'Production';
      }
      if ($this->uri->segment(2) == 'designers') {
        echo 'Designer';
      }
      if ($this->uri->segment(2) == 'customers') {
        echo 'Customer';
      }
      ?></h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <a href="
        <?php
        if ($this->uri->segment(2) == 'superadmins') {
          echo base_url('manage/superadmins');
        }
        if ($this->uri->segment(2) == 'admins') {
          echo base_url('manage/admins');
        }
        if ($this->uri->segment(2) == 'productions') {
          echo base_url('manage/productions');
        }
        if ($this->uri->segment(2) == 'designers') {
          echo base_url('manage/designers');
        }
        if ($this->uri->segment(2) == 'customers') {
          echo base_url('manage/customers');
        }
        ?>
        ">
        <button class="btn btn-sm btn-outline-success"> <i class="fa fa-arrow-left mr-2"></i>Kembali</button></a>
      </div>
    </div>
    <?php echo $this->session->flashdata('notifikasi'); ?>
    <div class="row my-4">
      <div class="col-md-6 ">
        <!-- Goals -->
        <div class="header mt-md-6">
        </div>

        <div class="card">
          <div class="card-header">
            <h6>Update <?php echo $user_details->user_id ?>
              <?php
              if ($this->uri->segment(2) == 'superadmins') {
                echo 'Super Admin';
              }
              if ($this->uri->segment(2) == 'admins') {
                echo 'Admin';
              }
              if ($this->uri->segment(2) == 'productions') {
                echo 'Production';
              }
              if ($this->uri->segment(2) == 'designers') {
                echo 'Designer';
              }
              if ($this->uri->segment(2) == 'customers') {
                echo 'Customer';
              }
              ?>
            </h6>
          </div>
          <div class="card-body">
            <?php
            print_r(validation_errors());
            echo validation_errors('<div class="alert alert-danger">', '</div>');
            ?>
            <form class="" action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" name="user_name" value="<?php echo $user_details->user_name ?>" required>
              </div>
              <div class="form-group">
                <label>No. Handphone</label>
                <input type="text" class="form-control" name="user_phone" value="<?php echo $user_details->user_phone ?>" required>
              </div>
              <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="custom-select form-control" name="user_gender" required>
                  <option disabled>Pilih Jenis Kelamin</option>
                  <option value="Perempuan" <?php if($user_details->user_gender == 'Perempuan'){ echo 'selected'; } ?>>Perempuan</option>
                  <option value="Laki-laki" <?php if($user_details->user_gender == 'Laki-laki'){ echo 'selected'; } ?>>Laki-laki</option>
                </select>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="address_name" value="<?php echo $user_details->address_name ?>" required>
              </div>
            </div>
          </div>
          
        </div>

        <div class="col-md-6 ">
          <!-- Goals -->
          <div class="card">
            <div class="card-header">
              <h6>Keterangan
                <?php
                if ($this->uri->segment(2) == 'superadmins') {
                  echo 'Super Admin';
                }
                if ($this->uri->segment(2) == 'admins') {
                  echo 'Admin';
                }
                if ($this->uri->segment(2) == 'productions') {
                  echo 'Production';
                }
                if ($this->uri->segment(2) == 'designers') {
                  echo 'Designer';
                }
                if ($this->uri->segment(2) == 'customers') {
                  echo 'Customer';
                }
                ?>
              </h6>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Foto User :</label>
                <img src="<?php echo base_url('assets/images/img_users/'.$user_details->user_photo) ?>" class="mb-2" alt="" style="width:30%;">
                <input type="file" class="form-control" placeholder="" name="user_photo">
                <input type="hidden" name="user_photo_old" value="<?php echo $user_details->user_photo ?>">
                <strong><small class="mt-1" style="float:right;color:crimson;">Ukuran image max : 3MB</small></strong>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="user_email" value="<?php echo $user_details->user_email ?>">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <div class="row">
                  <div class="col-12">
                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modalEditPassword">Ganti Password</button>
                  </div>
                </div>
              </div>
              <div class="text-right">
                <a>
                  <button type="submit" class="btn btn-primary"> <i class="fas fa-check mr-2"></i>Update</button>
                </a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </form>

  </main>

  <div class="modal fade" id="modalEditPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalScrollableTitle">Ganti Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= site_url('manage/').$this->uri->segment(2).'/edit_password/'. $user_details->user_id; ?>" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label>Password :</label>
              <input type="password" class="form-control" id="user_password" placeholder="Password" name="user_password" value="<?php echo set_value('user_password'); ?>" required>
              <span class="text-danger"><?php echo form_error('user_password'); ?></span>
            </div>
            <div class="form-group">
              <label>Ulangi Password :</label>
              <input type="password" class="form-control" id="user_password_conf" placeholder="Ketik Ulang Password" name="user_password_conf" value="<?php echo set_value('user_password_conf'); ?>" required>
              <span class="text-danger"><?php echo form_error('user_password_conf'); ?></span>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>