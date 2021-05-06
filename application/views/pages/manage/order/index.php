<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= $title; ?></h1>
    </div>

    <a class="btn btn-sm btn-outline-primary float-right mb-4" href="<?= base_url(); ?>/manage/karir/create/"> <i class="fas fa-plus-circle mr-1"></i> Add New Carrerr</a>
    <div class="table-responsive">
        <select name="search_is_active" class="custom-select custom-select float-right ml-3" style="width: 100px;" id="search_is_active">
            <option value="">All</option>
            <option value="1">Active</option>
            <option value="0">Off</option>
        </select>
        <table class="table table-striped table-bordered" id="table-order" style="width:100%">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th class="text-center">Order Code</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Phone Number</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

        </table>
    </div>

</main>