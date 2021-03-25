<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_product_categorys');
    $this->load->model('M_product_sub_categorys');
    $this->load->model('M_contacts');
    $this->load->model('M_banks');
  }

  function index()
  {
    
    $product_categorys     =  $this->M_product_categorys->get_all()->result();
    $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
    $contacts              =  $this->M_contacts->get_all()->row();
    $data  =
    array(
      'title'                 =>  'Daftar',
      'isi'                   =>  'pages/guest/v_confirms',
      'product_categorys'     =>  $product_categorys,
      'product_sub_categorys' =>  $product_sub_categorys,

      'contacts'              =>  $contacts,
    );
    $this->load->view("layouts/guest/wrapper", $data, false);
  }
  function metode_pembayaran()
  {
    
    $product_categorys     =  $this->M_product_categorys->get_all()->result();
    $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
    $banks                 =  $this->M_banks->get_all()->result();
    $contacts              =  $this->M_contacts->get_all()->row();
    $data  =  array(
      'title'                 =>  'Metode Pembayaran',
      'isi'                   =>  'pages/guest/v_metode_pembayaran',
      'product_categorys'     =>  $product_categorys,
      'product_sub_categorys' =>  $product_sub_categorys,
      'banks'                 =>  $banks,

      'contacts'              =>  $contacts,
    );
    $this->load->view("layouts/guest/wrapper", $data, false);
  }
  function pembayaran()
  {
    $condition_banks = array(
      'bank_id'  => '2'
    );
    $bank = $this->M_banks->get_conditions($condition_banks)->row();
    $product_categorys     =  $this->M_product_categorys->get_all()->result();
    $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
    $contacts              =  $this->M_contacts->get_all()->row();
    $data  =  array(
      'title'                 =>  'Pembayaran',
      'isi'                   =>  'pages/guest/v_nota_pembayaran',
      'product_categorys'     =>  $product_categorys,
      'product_sub_categorys' =>  $product_sub_categorys,
      'bank'                  =>  $bank,

      'contacts'              =>  $contacts,
    );
    $this->load->view("layouts/guest/wrapper", $data, false);
  }

}
