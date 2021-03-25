<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Product Sub-categorys Management</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo site_url('manage/product_sub_categorys/add') ?>">
        <button class="btn btn-sm btn-outline-primary"> <i class="fas fa-plus-circle mr-1"></i> Add Product Sub-Kategori</button></a>
      </div>
    </div>
    <div class="row my-4">
      <div class="col-12 ">
        <?php echo $this->session->flashdata('notifikasi');  ?>
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <?php $no=1; foreach ($product_categorys as $category ): ?>
            <a class="nav-item nav-link <?php if ($no==1): echo 'active'; endif ?>" id="<?php echo 'nav-'.$category->product_category_id.'-tab' ?>" data-toggle="tab" href="<?php echo '#nav-'.$category->product_category_id ?>" role="tab" aria-controls="<?php echo 'nav-'.$category->product_category_id ?>" aria-selected="false"><?php echo $category->product_category_name ?> </a>
            <?php $no++; endforeach ?>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <?php $ni=1; foreach ($product_categorys as $product_category => $category): ?>
          <div class="tab-pane fade <?php if ($ni==1): echo 'show active'; endif ?>" id="<?php echo 'nav-'.$category->product_category_id ?>" role="tabpanel" aria-labelledby="nav-kusus-tab">
            <div class="card">
              <div class="table-responsive p-4">
                <table  class="table table-striped table-bordered example1" style="width:100%">
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th>Nama Sub Kategori</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $ne = 1;
                    foreach ($product_sub_categorys as $sub_categorys => $product_sub_category):
                      if ($product_sub_category->product_category_id==$category->product_category_id) {   ?>
                        <tr>
                          <td class="text-center"><?php echo $ne; ?></td>
                          <td><?php echo $product_sub_category->product_sub_category_name ?></td>
                          <td class="text-center">
                            <a href="<?php echo site_url('manage/product_sub_categorys/duplicate/'.$product_sub_category->product_sub_category_id) ?>" class="btn btn-sm btn-success">
                              <i class="fas fa-copy mr-2"></i>Copy
                            </a>
                           <a class="btn btn-sm btn-outline-success" href="<?php echo site_url('manage/product_sub_categorys/update/'.$product_sub_category->product_sub_category_id) ?>">
                             <i class="fas fa-edit mr-2"></i>Edit
                          </a>
                          <a>
                            <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#<?php echo $product_sub_category->product_sub_category_name; ?>">
                              <i class="fas fa-trash mr-2"></i>Delete
                            </button>
                          </a>
                          <!-- Modal -->
                          <div class="modal fade" id="<?php echo $product_sub_category->product_sub_category_name; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  Apakah Anda ingin menghapus <b><?php echo $product_sub_category->product_sub_category_name; ?></b> ?
                                </div>
                                <div class="modal-footer">
                                 <a href="<?php echo site_url('manage/product_sub_categorys/delete/'.$product_sub_category->product_sub_category_id) ?>">
                                  <button type="button" class="btn btn-danger">Delete</button>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <?php
                    $ne++;
                  } else{ }
                endforeach;
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <?php $ni++; endforeach ?>
    </div>
  </div>
</div>
</main>
