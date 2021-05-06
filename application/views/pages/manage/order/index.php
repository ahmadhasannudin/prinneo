<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= $title; ?></h1>
    </div>

    <div class="table-responsive">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-10 col-form-label text-right">Status</label>
            <div class="col-sm-2">
                <select name="search_transaction_status" class="custom-select custom-select float-right mr-3" style="width: 100px;" id="search_transaction_status">
                    <option value="">All</option>
                    <option value="pending">Pending</option>
                    <option value="success">Success</option>
                    <option value="failed">Failed</option>
                </select>
            </div>
        </div>
        <table class="table table-striped table-bordered" id="table-order" style="width:100%">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th class="text-center">Order Code</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Phone Number</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

        </table>
    </div>
</main>

<div class="modal fade " id="modal-detail-order" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card" id="section-payment-information">
                    <div class="card-header">
                        Payment Information
                    </div>
                    <div class="card-body row">
                        <div class="col-sm-4">
                            <div class="form-group row">
                                <label class="col-sm-12">Order Code</label>
                                <span class="col-sm-12" name="order_code"></span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group row">
                                <label class="col-sm-12">Amount</label>
                                <span class="col-sm-12" name="order_total"></span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group row">
                                <label class="col-sm-12">Payment Method</label>
                                <span class="col-sm-12" name="payment_type"></span>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group row">
                                <label class="col-sm-12">Status</label>
                                <span class="col-sm-12" name="transaction_status"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2 mb-2">
                    <div class='col-md-6' id="section-order-details">
                        <div class="card mt-2 mb-2">
                            <div class="card-header">
                                Order Details
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>
                                            Order Code
                                        </td>
                                        <td name="order_code">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Payment Type
                                        </td>
                                        <td name="payment_type">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Amount
                                        </td>
                                        <td name="order_total">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Time
                                        </td>
                                        <td name="transaction_time">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Status
                                        </td>
                                        <td name="transaction_status">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-6' id="section-customer-details">
                        <div class="card mt-2 mb-2">
                            <div class="card-header">
                                Customer Details
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>
                                            Name
                                        </td>
                                        <td name="order_name">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Phone
                                        </td>
                                        <td name="order_phone">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Email
                                        </td>
                                        <td name="order_email">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Address
                                        </td>
                                        <td name="order_alamat">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-6' id="section-payment-details">
                        <div class="card mt-2 mb-2">
                            <div class="card-header">
                                Payment Details
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>
                                            Virtual Account
                                        </td>
                                        <td name="va_number">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Acquiring Bank
                                        </td>
                                        <td name="va_bank">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-12'>
                        <div class="card mt-2 mb-2">
                            <div class="card-header">
                                Item Details
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table" id="table-item-details">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Product Name</th>
                                            <th class="text-center">Jenis Order</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Unit Price</th>
                                            <th class="text-center">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="text-right" colspan="4"> Sub Total</td>
                                            <td class="text-right" name="sub_total"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-right" colspan="4"> Ongkir</td>
                                            <td class="text-right" name="ongkir"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-right" colspan="4"> Total</td>
                                            <td class="text-right" name="total"></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>