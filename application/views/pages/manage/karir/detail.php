<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center ">
        <a href="<?= base_url(); ?>/manage/karir" class="btn btn-sm btn-outline-primary  mb-4"> <i class="fas fa-arrow-left mr-1"></i> Back </a>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= isset($title) ? $title : ''; ?></h1>

    </div>

    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label>Status :</label>
                <h4>
                    <span class="badge badge-lg badge-success" <?= isset($data->is_active) && $data->is_active == 1 ? 'badge-success' : 'badge-warning'; ?>>
                        <?= isset($data->is_active) && $data->is_active == 1 ? 'Active' : 'Off'; ?>
                    </span>
                </h4>
            </div>
            <div class="form-group">
                <?= isset($data->title) ? $data->title : null; ?>
            </div>
            <div>
                <?= isset($data->description) ? $data->description : null; ?>
            </div>
            <div class="table-responsive text-center">
                <h4>Applicant</h4>
                <table class="table table-striped table-bordered" id="table-karir" style="width:100%">
                    <thead>
                        <tr>
                            <th width="80px">No</th>
                            <th class="text-center">Name</th>
                            <th>Email</th>
                            <th>Descriptions</th>
                            <th>File</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</main>