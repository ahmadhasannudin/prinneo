<script>
    $(document).ready(function() {
        if (typeof CKEDITOR != 'undefined') {
            CKEDITOR.on('instanceReady', function(e) {
                e.editor.element.show();
                e.editor.element.hide();
                e.editor.resize('100%', '605', true);
            });
        }

    });


    $('#form-about-us').submit(function(e) {
        e.preventDefault();
        let attribute = $(this);
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        var isiForm = new FormData($('#form-about-us')[0]);
        Swal.fire({
            title: 'Are you sure?',
            text: "Update data",
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
                            url: "<?= base_url(); ?>/manage/aboutUs/update/about_us",
                            processData: false,
                            contentType: false,
                            cache: false,
                            success: function(data) {
                                console.log(data);
                                if (data.status) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: data.message,
                                        timer: 1000
                                    });
                                } else {
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