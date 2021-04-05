<script>
    $(document).ready(function() {});

    function detailApplicant(btn) {
        var row = dtKarir.row($(btn).parents('tr')).data(); // here is the change
        console.log(row);
        $('#modal-detail-applicant [name="nama"]').html(row.nama);
        $('#modal-detail-applicant [name="tanggal_lahir"]').html(row.tanggal_lahir);
        $('#modal-detail-applicant [name="alamat"]').html(row.alamat);
        $('#modal-detail-applicant [name="telephone"]').html(row.telephone);
        $('#modal-detail-applicant [name="email"]').html(row.email);
        $('#modal-detail-applicant [name="status_pernikahan"]').html(row.status_pernikahan);
        $('#modal-detail-applicant [name="status_pekerjaan"]').html(row.status_pekerjaan);
        $("#modal-detail-applicant").modal('show');
    }

    var dtKarir = $('#table-applicant').DataTable({
        aaSorting: [],
        processing: true,
        serverSide: true,
        // ordering: false,
        ajax: {
            url: "<?= base_url() . '/manage/karir/dataTableApplicant/' . $id; ?>",
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
                data: 'nama',
                className: 'text-left'
            },
            {
                data: 'email',
                className: 'text-left',
            },
            {
                data: 'telephone',
                className: 'text-left',
            }, {
                data: 'career_applicant_id',
                className: 'text-center',
                render: function(data, type, row, btn) {
                    return '<button class="btn btn-sm btn-outline-info" onClick="detailApplicant(this)"> <i class="fas fa-eye"></i></button>';
                }
            }
        ]
    });
</script>