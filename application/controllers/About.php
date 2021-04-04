<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_product_categorys');
    $this->load->model('M_product_sub_categorys');
    $this->load->model('M_contacts');
    $this->load->model('M_faqs');
    $this->load->model('MKarir');
  }

  function index()
  {
    $product_categorys     =  $this->M_product_categorys->get_all()->result();
    $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
    $contacts              =  $this->M_contacts->get_all()->row();
    $data  =
      array(
        'title'                 =>  'Tentang Kami - Prinneo.com',
        'isi'                   =>  'pages/guest/v_about',
        'product_categorys'     =>  $product_categorys,
        'product_sub_categorys' =>  $product_sub_categorys,
        'contacts'              =>  $contacts,
      );
    $this->load->view("layouts/guest/wrapper", $data, false);
  }

  function dataTableKarir()
  {
    if (!$this->input->is_ajax_request()) {
      exit('No direct script access allowed');
    }


    return $this->output->set_output($this->sdatatable->set_tabel('career c')
      ->set_kolom("c.career_id,
              c.title,
              c.pendidikan,
              c.penempatan")
      ->cari_perkolom_where('c.is_active', true)
      ->order_by('c.career_id', 'DESC')
      ->get_datatable());
  }

  function karir($id = null)
  {
    if (!empty($id)) {
      $this->detailKarir($id);
    }
    $product_categorys     =  $this->M_product_categorys->get_all()->result();
    $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
    $contacts              =  $this->M_contacts->get_all()->row();
    $data  =
      array(
        'title'                 =>  'karir - Prinneo.com',
        'isi'                   =>  'pages/guest/karir/index',
        'pageFooter'            => 'pages/guest/karir/indexFooter',
        'product_categorys'     =>  $product_categorys,
        'product_sub_categorys' =>  $product_sub_categorys,
        'contacts'              =>  $contacts,
      );
    $this->load->view("layouts/guest/wrapper", $data, false);
  }

  function detailKarir($id)
  {
    if (empty($id)) {
      exit('No direct script access allowed');
    }
    $product_categorys     =  $this->M_product_categorys->get_all()->result();
    $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
    $contacts              =  $this->M_contacts->get_all()->row();
    $data  =
      array(
        'title'                 =>  'karir - Prinneo.com',
        'isi'                   =>  'pages/guest/karir/detailKarir',
        'product_categorys'     =>  $product_categorys,
        'product_sub_categorys' =>  $product_sub_categorys,
        'contacts'              =>  $contacts,
        'data' => $this->MKarir->getData($id)
      );
    $this->load->view("layouts/guest/wrapper", $data, false);
  }

  function dropship()
  {
    $product_categorys     =  $this->M_product_categorys->get_all()->result();
    $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
    $contacts              =  $this->M_contacts->get_all()->row();
    $data  =
      array(
        'title'                 =>  'Dropship - Prinneo.com',
        'isi'                   =>  'pages/guest/v_dropship',
        'product_categorys'     =>  $product_categorys,
        'product_sub_categorys' =>  $product_sub_categorys,
        'contacts'              =>  $contacts,
      );
    $this->load->view("layouts/guest/wrapper", $data, false);
  }
}
