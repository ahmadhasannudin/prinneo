<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Orders extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_orders');
  }
  function index()
  {
    $data = [
      'title' =>  'Management Transaksi',
      'isi' =>  'pages/manage/order/index',
      'pageFooter' =>  'pages/manage/order/indexFooter',
    ];
    $this->load->view("layouts/manage/wrapper", $data, false);
  }

  function datatable()
  {
    if (!$this->input->is_ajax_request()) {
      exit('No direct script access allowed');
    }

    $datatable =  $this->sdatatable->set_tabel('orders o')
      ->set_kolom("
      o.order_id,
      o.order_code,
      o.order_email,
      o.order_phone,
      o.order_alamat,
      o.order_kabupaten,
      o.order_provinsi,
      o.order_kurir,
      o.order_kurir_service,
      o.order_ongkir,
      o.order_total,
      o.user_id,
      o.order_status,
      o.order_date,
      o.order_name,
      op.transaction_status")
      ->join_tabel(
        'order_payment op',
        'op.order_id = o.order_id',
        'left'
      );

    if ($this->input->post('transaction_status') != null) {
      $datatable->cari_perkolom_where('op.transaction_status', $this->input->post('transaction_status'));
    }

    $datatable->order_by('o.order_id', 'DESC');
    return $this->output->set_output($datatable->get_datatable());
  }

  public function getDetailOrder()
  {
    if (!$this->input->is_ajax_request()) {
      exit('No direct script access allowed');
    }

    $data = $this->M_orders->getDetailOrder($this->input->get('orderID'));

    if (empty($data)) {
      return resp(false,  'Order Not Found');
    }
    return resp(true, 'success', $data);
  }

  public function midtransNotification()
  {

    $params = array('server_key' => getenv('MIDTRANS_SERVER_KEY'), 'production' => getenv('MIDTRANS_PRODUCTION_STATUS'));
    $this->load->library('midtrans');
    $this->midtrans->config($params);

    $json = json_decode(file_get_contents('php://input'), true);

    $orderCode = $json['order_id'];

    $checkRows = $this->db->get_where('order_payment', array(
      'order_code' => $orderCode
    ));

    $count = $checkRows->num_rows();

    if ($count = 0) {
      return;
    }

    $data = array(
      'transaction_status' => $json['transaction_status'],
      'status_code' => $json['status_code']
    );

    $this->db->where('order_code', $orderCode);
    if (!$this->db->update('order_payment', $data)) {
      $this->output
        ->set_content_type('application/json')
        ->set_status_header(500)
        ->set_output(json_encode(array(
          'message' => 'Error 500',
        )));
    };

    return $this->output
      ->set_status_header('200')
      ->set_content_type('application/json')
      ->set_output(json_encode(array(
        'message' => 'Success',
      )));
  }
}
