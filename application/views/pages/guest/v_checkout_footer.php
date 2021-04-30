<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= getenv('MIDTRANS_CLIENT_KEY'); ?>"></script>
<script type="text/javascript">
    $('#provinsi').change(function() {
        $.post("<?php echo base_url(); ?>products/get_city/" + $('#provinsi').val(), function(obj) {
            $('#kota').html(obj);
        });
        var prov = $('#provinsi option:selected').attr('prov');
        $('#prov').val(prov);
        $('#kot').val('');
    });
    $('#kota').change(function() {
        var kot = $('#kota option:selected').attr('kot');
        $('#kot').val(kot);
    });

    function cekongkir() {
        // var w = $('#kota_asal').val();
        var x = $('#kota').val();
        var y = $('#berat-total').val();
        var z = $('#courier').val();
        var h = $('#total-hitung').text();
        var jumlah = $('#jumlah').val();
        var weight = y * jumlah;
        var harga = $('#harga-total').val();
        var url = "<?php echo base_url(); ?>products/ongkir?origin=469&originType=city&destination=" + x + "destinationType=city&berat=" + y + "&courier=" + z;
        $.post("<?php echo base_url(); ?>products/ongkir?origin=469&originType=city&destination=" + x + "destinationType=city&berat=" + weight + "&courier=" + z + "&harga=" + harga,
            function(obj) {
                $('#layanan').html(obj);
            });
    };
    $('#courier').change(function() {
        // var w = $('#kota_asal').val();
        var x = $('#kota').val();
        var y = $('#berat-total').val();
        var z = $('#courier').val();
        var h = $('#total-hitung').text();
        var jumlah = $('#jumlah').val();
        var weight = y;
        var harga = $('#harga-total').val();
        var url = "<?php echo base_url(); ?>products/checkout_ongkir?origin=469&originType=city&destination=" + x + "&destinationType=city&berat=" + y + "&courier=" + z;
        $.post("<?php echo base_url(); ?>products/checkout_ongkir?origin=469&originType=city&destination=" + x + "&destinationType=city&berat=" + weight + "&courier=" + z + "&harga=" + harga,
            function(obj) {
                $('#layanan').html(obj).trigger('change');
            });
    });
    $('#layanan').change(function() {
        var ongkir = $('#layanan option:selected').val(),
            total = $("#form-checkout [name='order_total']").val(),
            grandTotal = parse(ongkir) + parse(total);
        $('#ongkir').html(format_currency(ongkir));
        $('#grand-total').html(format_currency(grandTotal));

        $("#form-checkout [name='order_ongkir']").val(ongkir);
        $("#form-checkout [name='order_grand_total']").val(grandTotal);
    });

    function format_currency(nStr) {
        if (nStr === null) return '0';
        nStr += '';
        x = nStr.split(',');
        x1 = x[0];
        x2 = x.length > 1 ? ',' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return 'Rp. ' + x1 + x2;
    }

    function parse(val) {
        num = isNaN(parseFloat(val)) ? 0 : parseFloat(val);
        return parseFloat((Math.round(num * 1) / 1).toFixed(0));
    }

    // submit checkout
    $('#form-checkout').submit(function(e) {
        e.preventDefault();

        let btn = $(this),
            form = $('#form-checkout');

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
                                    Swal.close();
                                    btn.prop('disabled', false);

                                    var transactionData = data.data.transaction_data,
                                        dataPost = data.data.data_post;
                                    //midtrans payment snap
                                    snap.pay(data.data.token, {

                                        onSuccess: function(result) {
                                            changeResult('success', result, transactionDa, dataPostta);
                                            return;
                                        },
                                        onPending: function(result) {
                                            changeResult('pending', result, transactionData, dataPost);
                                            return;
                                        },
                                        onError: function(result) {
                                            changeResult('error', result, transactionData, dataPost);
                                            return;
                                        }
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
                                btn.prop('disabled', false);
                            }
                        })
                    }
                })
            }
        });
    });

    function changeResult(status, snap, transactionData, dataPost) {
        Swal.showLoading();

        $.ajax({
            type: "POST",
            data: {
                status: status,
                snap: snap,
                transactionData: transactionData,
                dataPost: dataPost
            },
            url: "<?= base_url() . 'checkout/save_checkout'; ?>",
            dataType: "json",

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
        });
    };
</script>