<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= isset($title) ? $title : ''; ?></h1>

    </div>

    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label>Status :</label>
                <label class="switch">
                    <input type="checkbox" value="q" checked>
                    <span class="slider round"></span>
                </label>
            </div>
            <div class="form-group">
                <label>Title :</label>
                <input type="text" class="form-control" name="title" value="" placeholder="masukan judul Karir">
            </div>
            <div class="form-group">
                <label>Deskripsi :</label>
                <textarea name="blog_exerpt" class="form-control ckeditor"></textarea>
            </div>
        </div>
    </div>
</main>