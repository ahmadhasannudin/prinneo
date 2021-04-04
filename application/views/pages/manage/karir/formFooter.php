<script>
    $(document).ready(function() {
        if (typeof CKEDITOR != 'undefined') {
            CKEDITOR.on('instanceReady', function(e) {
                e.editor.element.show();
                e.editor.element.hide();
                e.editor.resize('100%', '350', true);
            });
        }

    });


    $('#form-action').submit(function(e) {
        e.preventDefault();
        let attribute = $(this);
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        var form = $('#form-action'),
            isiForm = new FormData(form[0]);

        Swal.fire({
            title: 'Are you sure?',
            text: "Save Data",
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
                                    location.href = "<?= base_url(); ?>manage/karir";
                                } else if (!isset(() => data.status) || !data.status) {
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