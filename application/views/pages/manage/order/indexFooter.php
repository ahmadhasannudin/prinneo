<script>
    $(document).ready(function() {

    });
    $('#search_is_active').change(function() {
        dtOrder.ajax.reload(null, false);
    })
    var dtOrder = $('#table-order').DataTable({
        aaSorting: [],
        processing: true,
        serverSide: true,
        // ordering: false,
        ajax: {
            url: "<?= base_url(); ?>manage/orders/datatable",
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
                data: 'order_code',
                className: 'text-left'
            },
            {
                data: 'order_name',
                className: 'text-left'
            },
            {
                data: 'order_phone',
                className: 'text-left',
                render: function(data, type, row, btn) {
                    return '+62 - ' + data;
                }
            },
            {
                data: 'transaction_status',
                className: 'text-center',
                render: function(data, type, row, btn) {
                    if (data == 'pending') {
                        return `<span class="badge badge-info">Pending</span>`;
                    };
                    if (data == 'pending') {
                        return `<span class="badge badge-danger">Expired</span>`;
                    }
                    return `<span class="badge badge-success">Success</span>`;
                }
            },
            {
                data: 'order_id',
                className: 'text-center',
                render: function(data, type, row, btn) {
                    return '<a href="<?= base_url(); ?>/manage/karir/edit/' + data + '" class="btn btn-sm btn-outline-warning mr-1"> <i class="fas fa-edit"></i></a>' +
                        '<a href="<?= base_url(); ?>/manage/karir/detail/' + data + '" class="btn btn-sm btn-outline-info"> <i class="fas fa-eye"></i></a>';
                }
            }
        ]
    });
</script>