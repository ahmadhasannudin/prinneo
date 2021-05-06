<script>
    $(document).ready(function() {

        $('.detail-order').click(function() {
            // data-toggle="modal" data-target="#modal-detail-order"
            var btn = $(this);
            Swal.fire({
                title: 'Loading Data...',
                showConfirmButton: false
            });

            $.ajax({
                type: "GET",
                url: "<?= base_url() . '/manage/orders/getDetailOrder?orderID='; ?>" + btn.attr('data-id'),
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    Swal.showLoading();
                    if (data.status) {
                        Swal.close();
                        var v = data.data,
                            transaction_status = `<span class="badge badge-info">pending</span>`;

                        $('#section-payment-information [name="order_code"]').html(v.order.order_code);
                        $('#section-payment-information [name="order_total"]').html(format_currency(v.order.order_total));
                        $('#section-payment-information [name="payment_type"]').html(humanize(v.payment.payment_type));
                        if (v.payment.transaction_status == 'pending') {
                            transaction_status = `<span class="badge badge-info">${v.payment.transaction_status}</span>`;
                        };
                        if (v.payment.transaction_status == 'cancel' ||
                            v.payment.transaction_status == 'deny' ||
                            v.payment.transaction_status == 'expire' ||
                            v.payment.transaction_status == 'refund') {
                            transaction_status = `<span class="badge badge-danger">${v.payment.transaction_status}</span>`;
                        }
                        if (v.payment.transaction_status == 'settlement' ||
                            v.payment.transaction_status == 'capture') {
                            transaction_status = `<span class="badge badge-success">${v.payment.transaction_status}</span>`;
                        }
                        $('#section-payment-information [name="transaction_status"]').html(transaction_status);

                        $('#section-order-details [name="order_code"]').html(v.order.order_code);
                        $('#section-order-details [name="payment_type"]').html(v.payment.payment_type);
                        $('#section-order-details [name="order_total"]').html(format_currency(v.order.order_total));
                        $('#section-order-details [name="transaction_time"]').html(v.payment.transaction_time);
                        $('#section-order-details [name="transaction_status"]').html(transaction_status);

                        $('#section-customer-details [name="order_name"]').html(v.order.order_name);
                        $('#section-customer-details [name="order_phone"]').html(v.order.order_phone);
                        $('#section-customer-details [name="order_email"]').html(v.order.order_email);
                        $('#section-customer-details [name="order_alamat"]').html(v.order.order_alamat);

                        $('#section-payment-details [name="va_number"]').html(v.payment.va_number);
                        $('#section-payment-details [name="va_bank"]').html(v.payment.va_bank);

                        let tbody = '',
                            subtotal = 0;
                        $('#table-item-details tbody').html(tbody);

                        $.each(v.detail, function(key, val) {
                            tbody += `<tr>
                            <td>
                            ${val.product_name}
                            </td>
                            <td>
                            ${val.jenis_order}
                            </td>
                            <td class="text-center">
                            ${val.order_detail_qty}
                            </td>
                            <td class="text-right">
                            ${format_currency(val.order_detail_subtotal)}
                            </td>
                            <td class="text-right">
                            ${format_currency(val.order_detail_subtotal*val.order_detail_qty)}
                            </td>
                            </tr>`;
                            subtotal += val.order_detail_subtotal * val.order_detail_qty;
                        });
                        $('#table-item-details tbody').html(tbody);
                        $('#table-item-details [name="sub_total"]').html(format_currency(subtotal));
                        $('#table-item-details [name="ongkir"]').html(format_currency(v.order.order_ongkir));
                        $('#table-item-details [name="total"]').html(format_currency(v.order.order_total));

                        $('#modal-detail-order').modal('show');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed',
                            text: data.message,
                        });
                    }
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
        });
    });

    $('#search_transaction_status').change(function() {
        dtOrder.ajax.reload(null, false);
    })
    var dtOrder = $('#table-order').DataTable({
        aaSorting: [],
        processing: true,
        serverSide: true,
        ordering: false,
        ajax: {
            url: "<?= base_url(); ?>manage/orders/datatable",
            type: 'POST',
            data: function(d) {
                d.transaction_status = $('#search_transaction_status').val()
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
                        return `<span class="badge badge-info">${data}</span>`;
                    };
                    if (data == 'cancel' || data == 'deny' || data == 'expire' || data == 'refund') {
                        return `<span class="badge badge-danger">${data}</span>`;
                    }
                    if (data == 'settlement' || data == 'capture') {
                        return `<span class="badge badge-success">${data}</span>`;
                    }
                }
            },
            {
                data: 'order_id',
                className: 'text-center',
                render: function(data, type, row, btn) {
                    return `<button class="btn btn-sm btn-outline-info detail-order" data-id="${data}"> <i class="fas fa-eye"></i></button>`;
                }
            }
        ]
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

    function humanize(str) {
        return str
            .replace(/^[\s_]+|[\s_]+$/g, '')
            .replace(/[_\s]+/g, ' ')
            .replace(/^[a-z]/, function(m) {
                return m.toUpperCase();
            });
    }
</script>