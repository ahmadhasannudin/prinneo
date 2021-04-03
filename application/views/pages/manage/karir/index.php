<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Karir Management</h1>

        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="<?php echo site_url('manage/blogs/add') ?>"></a>
        </div>

    </div>

    <button class="btn btn-sm btn-outline-primary float-right mb-4"> <i class="fas fa-plus-circle mr-1"></i> Add New Carrerr</button>
    <div class="table-responsive">
        <select name="search_is_active" class="custom-select custom-select float-right ml-3" style="width: 100px;" id="search_is_active">
            <option value="1">Active</option>
            <option value="0">Off</option>
        </select>
        <table class="table table-striped table-bordered" id="table-karir" style="width:100%">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th class="text-center">Title</th>
                    <th>Status</th>
                    <th>Applicant</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

        </table>
    </div>

</main>