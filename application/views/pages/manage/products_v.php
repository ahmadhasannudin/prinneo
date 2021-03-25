<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Products Management</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo site_url('manage/products/add') ?>">
        <button class="btn btn-sm btn-outline-primary"> <i class="fas fa-plus-circle mr-1"></i> Add Product</button></a>
      </div>
    </div>
    <?php echo $this->session->flashdata('notifikasi'); ?>
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
                    <th>No</th>
                    <th>ID Produk</th>
                    <th>Gambar Produk</th>
                    <th>Nama Produk</th>
                    <th>Kategori Produk</th>
                    <th>Harga</th>
                    <th>Berat</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $ne = 1;
                  foreach ($products as $product => $value):
                    if ($value->product_category_id==$category->product_category_id) {   ?>
                      <tr>
                        <td><?php echo $ne; ?></td>
                        <td><?php echo $value->product_id; ?></td>
                        <td width="15%"><img src="<?php echo base_url(); ?>assets/images/img_products/<?php echo $value->product_image; ?>" alt="<?php echo $value->product_name; ?>"  class="slide-image" width="200"/></td>
                        <td><?php echo $value->product_name ?></td>
                        <td><?php echo $value->product_sub_category_name; ?></td>
                        <td><?php echo $value->product_start_price; ?></td>
                        <td><?php echo $value->product_weight.' gram'; ?></td>
                        <td>
                            <?php if ($value->product_status=='1'){ ?>
                              <button type="button" class="btn btn-sm btn-success">Published</button>
                            <?php }else if ($value->product_status=='2') { ?>
                               <button type="button" class="btn btn-sm btn-warning">Ready</button>
                             <?php }else { ?>
                               <button type="button" class="btn btn-sm btn-danger">Pending</button>
                            <?php } ?>
                          </td>
                        <td class="text-center">
                          <a href="<?php echo site_url('manage/products/duplicate_product/'.$value->product_id) ?>" class="btn btn-sm btn-success mt-2">
                            <i class="fas fa-copy mr-2"></i>Copy
                          </a>
                          <br>
                          <a href="<?php echo site_url('manage/products/update/'.$value->product_id) ?>" class="btn btn-sm btn-outline-success mt-2">
                            <i class="fas fa-edit mr-2"></i>Edit
                          </a>
                          <br>
                          <button type="button" class="btn btn-sm btn-outline-danger mt-2" data-toggle="modal" data-target="#<?php echo $value->product_name; ?>">
                            <i class="fas fa-trash mr-2"></i>Delete
                          </button>
                          <!-- Modal -->
                          <div class="modal fade" id="<?php echo $value->product_name; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  Apakah Anda ingin menghapus <b><?php echo $value->product_name; ?></b> ?
                                </div>
                                <div class="modal-footer">
                                 <a href="<?php echo site_url('manage/products/delete/'.$value->product_id) ?>">
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
