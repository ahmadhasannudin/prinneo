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
            url: "<?= base_url(); ?>/about/dataTableKarir",
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
                data: 'penempatan',
                className: 'text-left'
            },
            {
                data: 'pendidikan',
                className: 'text-left'
            },
            {
                data: 'career_id',
                className: 'text-center',
                render: function(data, type, row, btn) {
                    return '<a href="<?php echo base_url() . 'about/karir/' ?>' + data + '"><button type="button" class="btn btn-karir btn-sm"><i class="fa fa-search"></i></button></a>';
                }
            }
        ]
    });
</script>