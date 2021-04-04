<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center ">
        <a href="<?= base_url(); ?>/manage/karir" class="btn btn-sm btn-outline-primary  mb-4"> <i class="fas fa-arrow-left mr-1"></i> Back </a>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= isset($title) ? $title : ''; ?></h1>

    </div>

    <div class="card">
        <div class="card-body">
            <form action="<?= $formActionURL; ?>" id="form-action" onsubmit="return false;">
                <div class="form-group">
                    <label>Posisi :</label>
                    <label class="switch">
                        <input type="checkbox" name="is_active" value="1" <?= isset($data->is_active) && $data->is_active == 1 ? 'checked' : ''; ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="form-group">
                    <label>Title :</label>
                    <input type="text" class="form-control" name="title" value="<?= isset($data->title) ? $data->title : null; ?>" placeholder="masukan judul Karir">
                </div>
                <div class="form-group">
                    <label>Deskripsi :</label>
                    <textarea name="description" class="form-control ckeditor"><?= isset($data->description) ? $data->description : null; ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary float-right"> submit</button>
            </form>
        </div>
    </div>
</main>