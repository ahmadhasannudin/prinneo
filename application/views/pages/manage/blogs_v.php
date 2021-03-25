<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Blogs Management</h1>
    
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo site_url('manage/blogs/add') ?>">
        <button class="btn btn-sm btn-outline-primary"> <i class="fas fa-plus-circle mr-1"></i> Add Blogs</button></a>

      </div>

    </div>
    <?php echo $this->session->flashdata('notifikasi');      ?>
    <div class="row my-4">
      <div class="col-12 ">
        <!-- Goals -->
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-all-tab" data-toggle="tab" href="#nav-all" role="tab" aria-controls="nav-all" aria-selected="true">All </a>
            <a class="nav-item nav-link" id="nav-published-tab" data-toggle="tab" href="#nav-published" role="tab" aria-controls="nav-published" aria-selected="false">Published </a>
            <a class="nav-item nav-link" id="nav-pending-tab" data-toggle="tab" href="#nav-pending" role="tab" aria-controls="nav-pending" aria-selected="false">Pending </a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
            <div class="table-responsive p-4">
              <table class="table table-striped table-bordered example1" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Gambar artikel</th>
                    <th>Keterangan artikel</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($blogs as $blog_all):

                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td width="15%"><img src="<?php echo base_url(); ?>assets/images/img_blogs/<?php echo $blog_all->blog_image; ?>" alt="<?php echo $blog_all->blog_title; ?>"  class="slide-image" width="200"/></td>
                      <td>
                        <b><?php echo $blog_all->blog_title; ?></b>
                        <br>
                        <?php echo character_limiter($blog_all->blog_exerpt,50) ?>
                        <br>
                      </td>
                      <td><?php echo $blog_all->blog_category_name; ?></td>
                      <td><?php echo $blog_all->blog_author; ?></td>
                      <td><?php echo $blog_all->blog_status; ?></td>
                      <td>
                        <a href="<?php echo site_url('manage/blogs/update/'.$blog_all->blog_id) ?>">
                          <button class="btn btn-sm btn-outline-success"> <i class="fas fa-edit mr-2"></i> Edit</button>
                          </a>

                          <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete<?php echo $blog_all->blog_id; ?>">
                            <i class="fas fa-trash mr-2"></i>Delete
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="delete<?php echo $blog_all->blog_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  Apakah Anda ingin menghapus data <b><?php echo $blog_all->blog_title; ?></b> ?
                                </div>
                                <div class="modal-footer">
                                 <a href="<?php echo site_url('manage/blogs/delete/'.$blog_all->blog_id) ?>">
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
          </div>
          <div class="tab-pane fade" id="nav-published" role="tabpanel" aria-labelledby="nav-published-tab">
            <div class="table-responsive p-4">
              <table class="table table-striped table-bordered example1" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Gambar artikel</th>
                    <th>Keterangan artikel</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($blogs as $blog_publish):
                    if ($blog_publish->blog_status=="published") {
                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td width="15%"><img src="<?php echo base_url(); ?>assets/images/img_blogs/<?php echo $blog_publish->blog_image; ?>" alt="<?php echo $blog_publish->blog_title; ?>"  class="slide-image" width="200"/></td>
                      <td>
                        <b><?php echo $blog_publish->blog_title; ?></b>
                        <br>
                        <?php echo character_limiter($blog_publish->blog_exerpt,200) ?>
                        <br>
                      </td>
                      <td><?php echo $blog_publish->blog_category_name; ?></td>
                      <td><?php echo $blog_publish->blog_author; ?></td>
                      <td><?php echo $blog_publish->blog_status; ?></td>
                      <td>
                        <a href="<?php echo site_url('manage/blogs/update/'.$blog_publish->blog_id) ?>">
                          <button class="btn btn-sm btn-outline-success"> <i class="fas fa-edit mr-2"></i> Edit</button>
                          </a>

                          <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#publish<?php echo $blog_publish->blog_id; ?>">
                            <i class="fas fa-trash mr-2"></i>Delete
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="publish<?php echo $blog_publish->blog_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  Apakah Anda ingin menghapus data <b><?php echo $blog_publish->blog_title; ?></b> ?
                                </div>
                                <div class="modal-footer">
                                 <a href="<?php echo site_url('manage/blogs/delete/'.$blog_publish->blog_id) ?>">
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
                     }
                endforeach;
                ?>
              </tbody>

            </table>
          </div>
        </div>
        <div class="tab-pane fade" id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab">  
          <div class="table-responsive p-4">
            <table class="table table-striped table-bordered example1" style="width:100%">
              <thead>
                <tr>
                  <th>No</th>
                    <th>Gambar artikel</th>
                    <th>Keterangan artikel</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($blogs as $blog_pending):
                  if ($blog_pending->blog_status=="pending") {
                  ?>
                  <tr>
                      <td><?php echo $no; ?></td>
                      <td width="15%"><img src="<?php echo base_url(); ?>assets/images/img_blogs/<?php echo $blog_pending->blog_image; ?>" alt="<?php echo $blog_pending->blog_title; ?>"  class="slide-image" width="200"/></td>
                      <td>
                        <b><?php echo $blog_pending->blog_title; ?></b>
                        <br>
                        <?php echo character_limiter($blog_pending->blog_exerpt,200) ?>
                        <br>
                      </td>
                      <td><?php echo $blog_pending->blog_category_name; ?></td>
                      <td><?php echo $blog_pending->blog_author; ?></td>
                      <td><?php echo $blog_pending->blog_status; ?></td>
                      <td>
                        <a href="<?php echo site_url('manage/blogs/update/'.$blog_pending->blog_id) ?>">
                          <button class="btn btn-sm btn-outline-success"> <i class="fas fa-edit mr-2"></i> Edit</button>
                          </a>

                          <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#pending<?php echo $blog_pending->blog_id; ?>">
                            <i class="fas fa-trash mr-2"></i>Delete
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="pending<?php echo $blog_pending->blog_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  Apakah Anda ingin menghapus data <b><?php echo $blog_pending->blog_title; ?></b> ?
                                </div>
                                <div class="modal-footer">
                                 <a href="<?php echo site_url('manage/blogs/delete/'.$blog_pending->blog_id) ?>">
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
              }
              endforeach;
              ?>
            </tbody>

          </table>
        </div>
      </div>
    </div>


  </div>
</div>

</main>





