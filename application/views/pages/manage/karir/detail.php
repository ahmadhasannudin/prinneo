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
                <table class="table table-striped table-bordered" id="table-applicant" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center" width="80px">No</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">No HP</th>
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

<!-- modal detail applicant  -->
<div class="modal" tabindex="-1" role="dialog" id="modal-detail-applicant">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-sm-4">Nama lengkap :</label>
                    <span class="col-sm-8" name="nama"></span>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Tanggal lahir :</label>
                    <span class="col-sm-8" name="tanggal_lahir"></span>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Alamat lengkap :</label>
                    <span class="col-sm-8" name="alamat"></span>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Nomor telepon / HP :</label>
                    <span class="col-sm-8" name="telephone"></span>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Email :</label>
                    <span class="col-sm-8" name="email"></span>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Status Pernikaahan :</label>
                    <span class="col-sm-8" name="status_pernikahan"></span>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Status Pekerjaan :</label>
                    <span class="col-sm-8" name="status_pekerjaan"></span>
                </div>
            </div>
        </div>
    </div>
</div>