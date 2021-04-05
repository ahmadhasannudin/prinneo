<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= $title; ?></h1>
    </div>
    <div class="row my-4">
        <div class="col-12 ">
            <?php echo $this->session->flashdata('notifikasi');   ?>
            <!-- Goals -->
            <div class="card">
                <?php
                print_r(validation_errors());
                echo validation_errors('<div class="alert alert-danger">', '</div>');
                ?>
                <form id="form-about-us" onsubmit="return false" action="<?= $formAction; ?>">

                    <!-- <div class="form-group text-center">
                        <img src="<?php echo base_url(); ?>assets/images/img_blogs/<?= isset($data->image_url) ? $data->image_url : '' ?>" alt="<?= isset($data->title) ? $data->title : '' ?>" class="img-thumbnail" />
                        <input class="form-control" name="image_url_old" type="text" value="<?= isset($data->image_url) ? $data->image_url : '' ?>" readonly>
                        <input type="file" class="form-control image-load" name="image_url">

                        <strong><small style="float:right;color:crimson;">Ukuran image max : 250 kb</small></strong>
                        <br>
                        <strong><small style="float:right;color:crimson;">Resolusi max : 1000 x 625 pixel</small></strong>
                    </div> -->
                    <div class="form-group">
                        <textarea class="ckeditor" name="content">
                        <?= isset($data->content) ? $data->content : '' ?>
                        </textarea>
                        <span class="help-block"></span>
                        <button type="submit" class="btn btn-sm btn-outline-primary mt-2 float-right"> <i class="fas fa-save mr-1"></i> Save </button></a>
                    </div>
                </form>
                <!-- tabel tutup -->
            </div>
        </div>
    </div>
</main>