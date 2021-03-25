<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Sliders Management</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo site_url('manage/sliders/add') ?>">
        <button class="btn btn-sm btn-outline-primary"> <i class="fas fa-plus-circle mr-1"></i> Add Slider</button></a>
      </div>
    </div>
    <div class="row my-4">
      <div class="col-12 ">
        <?php echo $this->session->flashdata('notifikasi'); ?>
        <!-- Goals -->
        <div class="card">
          <div class="table-responsive p-4">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th class="text-center">Image</th>
                  <th>Title</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($sliders as $slider):
                  ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td class="text-center"> <img src="<?php echo base_url('assets/images/img_sliders/'.$slider->slider_image) ?>" style="max-width: 300px;;"> </td>
                    <td><?php echo $slider->slider_title; ?></td>
                    <td class="text-center">
                      <a href="<?php echo site_url('manage/sliders/update/'.$slider->slider_id) ?>">
                        <button class="btn btn-sm btn-outline-success"> <i class="fas fa-edit mr-2"></i>Edit</button>
                      </a>
                      <a>
                        <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#<?php echo $slider->slider_title; ?>">
                          <i class="fas fa-trash mr-2"></i>Delete
                        </button>
                      </a>
                      <!-- Modal -->
                      <div class="modal fade" id="<?php echo $slider->slider_title; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Apakah Anda ingin menghapus <b><?php echo $slider->slider_title; ?></b> ?
                            </div>
                            <div class="modal-footer">
                             <a href="<?php echo site_url('manage/sliders/delete/'.$slider->slider_id) ?>">
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
