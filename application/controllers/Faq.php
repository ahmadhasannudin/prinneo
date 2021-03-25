<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_product_categorys');
    $this->load->model('M_product_sub_categorys');
    $this->load->model('M_contacts');
    $this->load->model('M_faqs');
  }

  function index()
  {
    
    $product_categorys     =  $this->M_product_categorys->get_all()->result();
    $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
    $contacts              =  $this->M_contacts->get_all()->row();
    $faqs                  =  $this->M_faqs->get_all()->result();
    $data  =
    array(
      'title'                 =>  'Faq',
      'isi'                   =>  'pages/guest/v_faq',
      'product_categorys'     =>  $product_categorys,
      'product_sub_categorys' =>  $product_sub_categorys,

      'faqs'              =>  $faqs,

      'contacts'              =>  $contacts,
    );
    $this->load->view("layouts/guest/wrapper", $data, false);
  }

}
