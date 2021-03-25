<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dasbor extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_dasbor');
  }

  function index()
  {
    if ($this->session->userdata('email_user') == "" && $this->session->userdata('password_user') == "") {
      redirect(site_url('login'), 'refresh');
    } else {
      $count = array(
        'product_categorys' =>  $this->M_dasbor->count_product_categorys(),
        'product_sub_categorys' =>  $this->M_dasbor->count_product_sub_categorys(),
        'products' =>  $this->M_dasbor->count_products(),
        'base_categorys' =>  $this->M_dasbor->count_lumise_categories(),
        'base_products' =>  $this->M_dasbor->count_lumise_products(),
        'blog_categorys' =>  $this->M_dasbor->count_blog_categorys(),
        'published' =>  $this->M_dasbor->count_blog_published(),
        'pending' =>  $this->M_dasbor->count_blog_pending(),
        'saran' =>  $this->M_dasbor->count_contact_us(),
        'customer' =>  $this->M_dasbor->count_user_customers(),
        'desainer' =>  $this->M_dasbor->count_user_desainers(),
        'production' =>  $this->M_dasbor->count_user_productions(),
        'admin' =>  $this->M_dasbor->count_user_admins(),
        'pemesanan' =>  '0',
        'konfirmasi' =>  '0',
      );
      $data = array(
        'title' => 'Dashboard',
        'count' => $count,
        'isi' => 'pages/manage/dasbor_super_admin'
      );
      // echo "<pre>";
      // print_r($data);
      // exit();
      $this->load->view("layouts/manage/wrapper", $data, false);
    }
  }
}
