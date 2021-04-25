<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_product_categorys');
    $this->load->model('M_product_sub_categorys');
    $this->load->model('M_contacts');
    $this->load->model('M_faqs');
    $this->load->model('M_orders');
    $this->load->model('M_users');
  }

  function index()
  {

    $cart = $this->cart->contents();
    $product_categorys     =  $this->M_product_categorys->get_all()->result();
    $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
    $contacts              =  $this->M_contacts->get_all()->row();
    $faqs                  =  $this->M_faqs->get_all()->result();
    $customer = [];
    foreach ($cart as $key => $value) {
      $customer = array(
        'nama_order' => $value['nama_order'],
        'nohp_order' => $value['nohp_order'],
        'email_order' => $value['email_order'],
      );
    }
    if ($this->session->userdata('user_id') == null) {
      $checkout_v = 'pages/guest/v_checkout_login';
    } else {
      $condition_users = array(
        'users.user_id'  => $this->session->userdata('user_id')
      );
      $user_details = $this->M_users->get_conditions($condition_users)->row();
      $customer = array(
        'nama_order' => $user_details->user_name,
        'nohp_order' => $user_details->user_phone,
        'email_order' => $user_details->user_email,
      );
      $checkout_v = 'pages/guest/v_checkout';
    }
    $data = array(
      'title'                 =>  'Checkout',
      'isi'                   =>  $checkout_v,
      'pageFooter'            => 'pages/guest/v_checkout_footer',
      'product_categorys'     =>  $product_categorys,
      'product_sub_categorys' =>  $product_sub_categorys,
      'customer'              =>  $customer,
      'contacts'              =>  $contacts,
    );

    $this->load->view("layouts/guest/wrapper", $data, false);
  }

  // proses checkout
  function proses_checkout()
  {
    $params = array('server_key' => getenv('MIDTRANS_SERVER_KEY'), 'production' => getenv('MIDTRANS_PRODUCTION_STATUS'));
    $this->load->library('midtrans');
    $this->midtrans->config($params);

    $valid = $this->form_validation;
    $valid->set_error_delimiters('', "");
    $valid->set_rules('user_name', 'Nama Lengkap', 'required');
    $valid->set_rules('user_email', 'Email', 'required|valid_email');
    $valid->set_rules('user_phone', 'NO HP', 'required');
    $valid->set_rules('address', 'Alamat', 'required');

    $valid->set_rules('provinsi', 'Provinsi', 'required');
    $valid->set_rules('kota', 'Kota', 'required');
    $valid->set_rules('kurir', 'Kurir', 'required');
    $valid->set_rules('layanan', 'Layanan', 'required');

    if ($valid->run() == FALSE) {
      return resp(false,  validation_errors());
    }
    // Required
    $transaction_details = array(
      'order_id' => rand() . date('dmYHis'),
      'gross_amount' => (int) $this->input->post('order_grand_total'),
    );

    $item_details = [];

    foreach ($this->input->post('order_product_id') as $key => $value) {
      $item_details[] = [
        'id' => $value,
        'price' => (int) $this->input->post('order_subtotal')[$key],
        'quantity' => (int) $this->input->post('order_qty')[$key],
        'name' => $this->input->post('order_name')[$key]
      ];
    }

    $item_details[] = [
      'id' => 0,
      'price' => (int) $this->input->post('order_ongkir'),
      'quantity' => (int) 1,
      'name' => 'ongkir'
    ];

    $customer_details = [
      'first_name' => $this->input->post('user_name'),
      'last_name' => "-",
      'email' => $this->input->post('user_email'),
      'phone' => $this->input->post('user_phone'),
      'address' => $this->input->post('address')
    ];

    $credit_card['secure'] = true;

    $time = time();
    $custom_expiry = array(
      'start_time' => date("Y-m-d H:i:s O", $time),
      'unit' => 'minute',
      'duration'  => 2
    );

    $transaction_data = array(
      'transaction_details' => $transaction_details,
      'item_details'       => $item_details,
      'customer_details'   => $customer_details,
      'credit_card'        => $credit_card,
      'expiry'             => $custom_expiry
    );

    $midtrans = $this->midtrans->getSnapToken($transaction_data);

    if (!$midtrans['status']) {
      return resp(false, $midtrans['message']);
    }

    $midtrans['data']['transaction_data'] = $transaction_data;
    return resp(true, $midtrans['message'], $midtrans['data']);
  }

  function save_checkout()
  {
    // print_r(json_decode($_POST));
    print_r($this->input->post());
  }

  function add()
  {
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->set_rules(
      'blog_category_name',
      'blog_category_name',
      'required',
      array(
        'required'  =>  'Nama kategori harus diisi'
      )
    );

    if ($valid->run() === false) {
      $product_categorys     =  $this->M_product_categorys->get_all()->result();
      $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
      $contacts              =  $this->M_contacts->get_all()->row();
      $faqs                  =  $this->M_faqs->get_all()->result();
      $data = array(
        'title'                 =>  'Checkout',
        'isi'                   =>  $checkout_v,
        'product_categorys'     =>  $product_categorys,
        'product_sub_categorys' =>  $product_sub_categorys,
        'customer'              =>  $customer,

        'contacts'              =>  $contacts,
      );
      $this->load->view("layouts/guest/wrapper", $data, false);
    } else {
      $data = array(
        'order_name'            =>  $i->post('order_name'),
        'order_email'           =>  $i->post('order_email'),
        'order_nohp'            =>  $i->post('order_nohp'),
        'order_address'         =>  $i->post('order_address'),
        'order_provinsi'        =>  $i->post('order_provinsi'),
        'order_kabupaten'       =>  $i->post('order_kabupaten'),
        'order_kurir'           =>  $i->post('order_kurir'),
        'order_layanan'         =>  $i->post('order_layanan'),
        'order_note'            =>  $i->post('order_note'),
        'order_ongkir'          =>  $i->post('order_ongkir'),
        'order_total'           =>  $i->post('order_total'),
      );
      $this->session->set_userdata($data);
      echo "<pre>";
      print_r($data);
      exit();
      $this->session->set_flashdata('success', '<center>Berhasil</center>');
      redirect('/metode-pembayaran');
    }
  }
}
