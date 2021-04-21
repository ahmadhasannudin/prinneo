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
      'product_categorys'     =>  $product_categorys,
      'product_sub_categorys' =>  $product_sub_categorys,
      'customer'              =>  $customer,

      'contacts'              =>  $contacts,
    );

    $this->load->view("layouts/guest/wrapper", $data, false);
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
