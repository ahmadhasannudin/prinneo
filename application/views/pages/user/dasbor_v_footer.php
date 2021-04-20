<script>
    $('#update-informasi').click(function() {
        let btn = $(this),
            form = $('#form-update-informasi');

        (async () => {

            const {
                value: password
            } = await Swal.fire({
                title: 'Enter your password',
                input: 'password',
                inputLabel: 'Password',
                inputPlaceholder: 'Enter your password',
                inputAttributes: {
                    maxlength: 10,
                    autocapitalize: 'off',
                    autocorrect: 'off'
                }
            })

            if (password) {
                isiForm = new FormData(form[0]);
                isiForm.append('password', password);
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
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed',
                                text: data.message,
                            });
                        }
                    },
                    beforeSend: function() {},
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
            } else {

                Swal.fire({
                    icon: 'error',
                    title: 'please input password !',
                });
            }

        })();
    });
</script>