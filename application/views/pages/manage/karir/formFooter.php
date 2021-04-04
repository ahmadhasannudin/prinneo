<script>
    $(document).ready(function() {

    });
    $('#search_is_active').change(function() {
        dtKarir.ajax.reload(null, false);
    })
    var dtKarir = $('#table-karir').DataTable({
        aaSorting: [],
        processing: true,
        serverSide: true,
        // ordering: false,
        ajax: {
            url: "<?= base_url(); ?>/manage/karir/dataTableIndex",
            type: 'POST',
            data: function(d) {
                d.is_active = $('#search_is_active').val()
            }
        },
        order: [1, 'asc'],
        columns: [{
                data: 'no',
                orderable: false,
                searchable: false,
                className: 'text-center'
            },
            {
                data: 'title',
                className: 'text-left'
            },
            {
                data: 'is_active',
                className: 'text-center',
                render: function(data, type, row, btn) {
                    let label = `<span class="badge badge-success">Active</span>`;
                    if (data == 0) {
                        label = `<span class="badge badge-danger">Off</span>`;
                    }
                    return label;
                }
            },
            {
                data: 'applicant',
                className: 'text-center'
            },
            {
                data: 'career_id',
                className: 'text-center',
                render: function(data, type, row, btn) {
                    return '<a href="<?= base_url(); ?>/manage/karir/detail/' + data + '" class="btn btn-sm btn-info"> <i class="fas fa-detail"></i> Detail</a>';
                }
            }
        ]
    });
</script>