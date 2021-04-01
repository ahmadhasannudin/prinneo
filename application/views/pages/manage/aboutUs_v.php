<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">About Us Management</h1>
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
                <form id="form-about-us" onsubmit="return false" data-url="">
                    <textarea class="ckeditor" name="content" rows="3" placeholder="Enter text . . . "></textarea><span class="help-block"></span>
                    <button type="submit" class="btn btn-sm btn-outline-primary mt-2 float-right"> <i class="fas fa-save mr-1"></i> Save </button></a>
                </form>
                <!-- tabel tutup -->
            </div>
        </div>
    </div>
</main>