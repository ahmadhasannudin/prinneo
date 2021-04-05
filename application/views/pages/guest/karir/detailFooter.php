<script>
    $(document).ready(function() {

    });


    $('#form-applicant').submit(function(e) {
        e.preventDefault();
        let attribute = $(this);

        var form = $('#form-applicant'),
            isiForm = new FormData(form[0]);

        Swal.fire({
            title: 'Are you sure?',
            text: "Submit Data",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Submit it!',
            allowOutsideClick: false,
        }).then(function(e) {
            if (e.value === true) {
                Swal.fire({
                    title: 'Processing ... ',
                    showConfirmButton: false,
                    onBeforeOpen: function() {
                        Swal.showLoading()
                        $.ajax({
                            type: "POST",
                            data: isiForm,
                            url: form.attr('action'),
                            processData: false,
                            contentType: false,
                            cache: false,
                            success: function(data) {
                                if (data.status) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: data.message,
                                        timer: 1000
                                    });
                                    location.href = "<?= base_url(); ?>about/karir";
                                } else
                                // if (!isset(() => data.status) || !data.status) 
                                {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Failed',
                                        text: data.message,
                                    });
                                }
                            },
                            beforeSend: function() {
                                attribute.prop('disabled', true);
                            },
                            complete: function(res) {
                                if (res.responseJSON === undefined) {
                                    Swal.close();
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                if (jqXHR.status == '403') {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Failed',
                                        text: 'Terjadi kesalahan saat menghubungkan ke server. Error : ' + textStatus,
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Failed',
                                        text: 'Terjadi kesalahan saat menghubungkan ke server. ',
                                    });
                                }
                            }
                        })
                    }
                })
            }

        })
    });
</script>