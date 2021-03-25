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
    <div class="row my-4">
      <div class="col-md-6 ">
        <!-- Goals -->
        <div class="header mt-md-6">
        </div>
        <div class="card">
          <div class="card-header">
            <h6>Tambah
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
              Baru</h6>
            </div>
            <div class="card-body">
              <?php
              print_r(validation_errors());
              echo validation_errors('<div class="alert alert-danger">', '</div>');
              ?>
              <form class="" action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" name="user_name" value="" required>
              </div>
              <div class="form-group">
                <label>No. Handphone</label>
                <input type="text" class="form-control" name="user_phone" value="" required>
              </div>
              <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="custom-select form-control" name="user_gender" required>
                  <option value="" selected disabled>Pilih Jenis Kelamin</option>
                  <option value="Perempuan">Perempuan</option>
                  <option value="Laki-laki">Laki-laki</option>
                </select>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="address_name" value="" required>
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
                <input type="file" class="form-control" placeholder="" name="user_photo">
                <strong><small style="float:right;color:crimson;">Ukuran image max : 150 kb</small></strong>
                <br>
                <strong><small style="float:right;color:crimson;">Resolusi max : 960 x 960 pixel</small></strong>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="user_email" value="" required>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="user_password" value="" required>
              </div>
              <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password" class="form-control" name="user_password_conf" value="" required>
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
