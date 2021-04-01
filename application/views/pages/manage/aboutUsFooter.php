<script>
    $(document).ready(function() {})

    $('#form-about-us').submit(function(e) {
        e.preventDefault();
        let attribute = $(this);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Request it!',
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
                            data: $('#form-about-us').serialize(),
                            url: "<?= base_url(); ?>/manage/aboutUs/update/about_us",

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
                                        title: data.message,
                                        timer: 1000
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
                                        title: 'Terjadi kesalahan saat menghubungkan ke server. Error : ' + textStatus,
                                        timer: 1000
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Terjadi kesalahan saat menghubungkan ke server. ',
                                        timer: 1000
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