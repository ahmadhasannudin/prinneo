<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Product Categorys Management</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo site_url('manage/product_categorys/add/') ?>">
        <button class="btn btn-sm btn-outline-primary"> <i class="fas fa-plus-circle mr-1"></i> Add Product Kategori</button></a>
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
                  <th class="text-center">No</th>
                  <th>Nama Kategori</th>
                  <th>Deskripsi</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($product_categorys as $product_category):
                  ?>
                  <tr>
                    <td class="text-center"><?php echo $no; ?></td>
                    <td><?php echo $product_category->product_category_name ?></td>
                    <td><?php echo $product_category->product_category_desk ?></td>
                    <td class="text-center">
                      <a href="<?php echo site_url('manage/product_categorys/duplicate/'.$product_category->product_category_id) ?>" class="btn btn-sm btn-success">
                            <i class="fas fa-copy mr-2"></i>Copy
                          </a>
                      <a href="<?php echo site_url('manage/product_categorys/update/'.$product_category->product_category_id) ?>">
                        <button class="btn btn-sm btn-outline-success"> <i class="fas fa-edit mr-2"></i>Edit</button>
                      </a>
                      <a>
                        <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#<?php echo $product_category->product_category_name; ?>">
                          <i class="fas fa-trash mr-2"></i>Delete
                        </button>
                      </a>
                      <!-- Modal -->
                      <div class="modal fade" id="<?php echo $product_category->product_category_name; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Apakah Anda ingin menghapus <b><?php echo $product_category->product_category_name; ?></b> ?
                            </div>
                            <div class="modal-footer">
                             <a href="<?php echo site_url('manage/product_categorys/delete/'.$product_category->product_category_id) ?>">
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
