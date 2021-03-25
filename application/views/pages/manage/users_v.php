<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">
      <?php
        if ($this->uri->segment(2) == 'superadmins') {
          echo 'Superadmins';
        }
        if ($this->uri->segment(2) == 'admins') {
          echo 'Admins';
        }
        if ($this->uri->segment(2) == 'productions') {
          echo 'Productions';
        }
        if ($this->uri->segment(2) == 'designers') {
          echo 'Designers';
        }
        if ($this->uri->segment(2) == 'customers') {
          echo 'Customers';
        }
      ?>
       Users Management</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php
        if ($this->uri->segment(2) == 'superadmins') {
          echo site_url('manage/superadmins/add');
        }
        if ($this->uri->segment(2) == 'admins') {
          echo site_url('manage/admins/add');
        }
        if ($this->uri->segment(2) == 'productions') {
          echo site_url('manage/productions/add');
        }
        if ($this->uri->segment(2) == 'designers') {
          echo site_url('manage/designers/add');
        }
        if ($this->uri->segment(2) == 'customers') {
          echo site_url('manage/customers/add');
        }
      ?>">
        <button class="btn btn-sm btn-outline-primary"> <i class="fas fa-plus-circle mr-1"></i> Add
          <?php
            if ($this->uri->segment(2) == 'superadmins') {
              echo 'Superadmins';
            }
            if ($this->uri->segment(2) == 'admins') {
              echo 'Admins';
            }
            if ($this->uri->segment(2) == 'productions') {
              echo 'Productions';
            }
            if ($this->uri->segment(2) == 'designers') {
              echo 'Designers';
            }
            if ($this->uri->segment(2) == 'customers') {
              echo 'Customers';
            }
          ?>
        </button></a>
      </div>
    </div>
    <?php echo $this->session->flashdata('notifikasi'); ?>
    <div class="row my-4">
      <div class="col-12 ">
        
        <!-- Goals -->
        <div class="card">
          <div class="table-responsive p-4">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($users as $user):
                  ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $user->user_name ?></td>
                    <td><?php echo $user->user_email; ?></td>
                    <td class="text-center">
                      <a href="<?php
                      if ($this->uri->segment(2) == 'superadmins') {
                        echo site_url('manage/superadmins/update/'.$user->user_id);
                      }
                      if ($this->uri->segment(2) == 'admins') {
                        echo site_url('manage/admins/update/'.$user->user_id);
                      }
                      if ($this->uri->segment(2) == 'productions') {
                        echo site_url('manage/productions/update/'.$user->user_id);
                      }
                      if ($this->uri->segment(2) == 'designers') {
                        echo site_url('manage/designers/update/'.$user->user_id);
                      }
                      if ($this->uri->segment(2) == 'customers') {
                        echo site_url('manage/customers/update/'.$user->user_id);
                      }
                      ?>">
                        <button class="btn btn-sm btn-outline-success"> <i class="fas fa-edit mr-2"></i>Edit</button>
                      </a>
                      <a>
                        <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#<?php echo $user->user_email; ?>">
                          <i class="fas fa-trash mr-2"></i>Delete
                        </button>
                      </a>
                      <!-- Modal -->
                      <div class="modal fade" id="<?php echo $user->user_email; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Apakah Anda ingin menghapus user dengan email <b><?php echo $user->user_email; ?></b> ?
                            </div>
                            <div class="modal-footer">
                             <a href="
                             <?php
                             if ($this->uri->segment(2) == 'superadmins') {
                               echo site_url('manage/superadmins/delete/'.$user->user_id);
                             }
                             if ($this->uri->segment(2) == 'admins') {
                               echo site_url('manage/admins/delete/'.$user->user_id);
                             }
                             if ($this->uri->segment(2) == 'productions') {
                               echo site_url('manage/productions/delete/'.$user->user_id);
                             }
                             if ($this->uri->segment(2) == 'designers') {
                               echo site_url('manage/designers/delete/'.$user->user_id);
                             }
                             if ($this->uri->segment(2) == 'customers') {
                               echo site_url('manage/customers/delete/'.$user->user_id);
                             }
                             ?>
                             ">
                              <button type="button" class="btn btn-danger">Delete</button>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php
                $no++;
              endforeach;
              ?>
            </tbody>
          </table>
        </div>
        <!-- tabel tutup -->
      </div>
    </div>
  </div>
</main>
