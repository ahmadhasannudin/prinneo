<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
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
    if ($this->session->userdata('email_user') == "" && $this->session->userdata('password_user') == "") {
      redirect(site_url('login'), 'refresh');
    } else {
      $product_categorys     =  $this->M_product_categorys->get_all()->result();
      $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
      $contacts              =  $this->M_contacts->get_all()->row();
      $faqs                  =  $this->M_faqs->get_all()->result();
      $condition_users = array(
        'users.user_id'  => $this->session->userdata('user_id')
      );
      $user_details = $this->M_users->get_conditions($condition_users)->row();
      $data = array(
        'title'                 => 'Dashboard',
        'isi'                   => 'pages/user/dasbor_v',
        'user_details'          =>  $user_details,
        'product_categorys'     =>  $product_categorys,
        'product_sub_categorys' =>  $product_sub_categorys,

        'contacts'              =>  $contacts,
      );
      // echo "<pre>";
      // print_r($data);
      // exit();
      $this->load->view("layouts/guest/wrapper", $data, false);
    }
  }
}
