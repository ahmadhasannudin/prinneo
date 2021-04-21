<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_products');
    $this->load->model('M_product_categorys');
    $this->load->model('M_product_sub_categorys');
    $this->load->model('M_contacts');
  }

  function jasa($product_slug)
  {
    $product_datas  = array(
      'product_slug' =>  $product_slug,
      'product_status !=' =>  '0'
    );
    $product_details       =  $this->M_products->get_conditions($product_datas)->row();
    $product_categorys     =  $this->M_product_categorys->get_all()->result();
    $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
    $contacts              =  $this->M_contacts->get_all()->row();
    $data  =
      array(
        'title'                 =>  'Jasa Desain',
        'isi'                   =>  'pages/guest/v_design_jasa',
        'pageFooter'            =>  'pages/guest/v_design_jasa_footer',
        'product_categorys'     =>  $product_categorys,
        'product_details'       =>  $product_details,
        'product_sub_categorys' =>  $product_sub_categorys,

        'contacts'              =>  $contacts,
      );
    $this->load->view("layouts/guest/wrapper", $data, false);
  }

  function upload($product_slug)
  {
    $product_datas  = array(
      'product_slug' =>  $product_slug,
      'product_status !=' =>  '0'
    );
    $product_details       =  $this->M_products->get_conditions($product_datas)->row();
    $product_categorys     =  $this->M_product_categorys->get_all()->result();
    $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
    $contacts              =  $this->M_contacts->get_all()->row();
    $data  =
      array(
        'title'                 =>  'Upload Desain',
        'isi'                   =>  'pages/guest/v_design_upload',
        'product_details'       =>  $product_details,
        'product_categorys'     =>  $product_categorys,
        'product_sub_categorys' =>  $product_sub_categorys,

        'contacts'              =>  $contacts,
      );
    $this->load->view("layouts/guest/wrapper", $data, false);
  }
}
