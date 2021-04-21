<script>
    $('#form-konfirmasi').submit(function(e) {
        e.preventDefault();

        let btn = $(this),
            form = $('#form-konfirmasi');

        isiForm = new FormData(form[0]);
        swal.fire({
            title: 'Are you sure?',
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
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                    onBeforeOpen: function() {
                        Swal.showLoading();
                        $.ajax({
                            type: "POST",
                            data: isiForm,
                            url: form.attr('action'),
                            processData: false,
                            contentType: false,
                            cache: false,
                            async: false,

                            success: function(data) {
                                if (data.status) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: data.message,
                                    });
                                    window.location.href = "<?= base_url() . 'cart'; ?>";
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Failed',
                                        text: data.message,
                                    });
                                }
                            },
                            beforeSend: function() {
                                btn.prop('disabled', true);
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

        });
    });
</script>