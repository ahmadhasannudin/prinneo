<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller{

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
    $data  =
    array(
      'title'                 =>  'Kontak | Prinneo',
      'isi'                   =>  'pages/guest/v_kontak',
      'product_categorys'     =>  $product_categorys,
      'product_sub_categorys' =>  $product_sub_categorys,
      'contacts'              =>  $contacts,
    );
    $this->load->view("layouts/guest/wrapper", $data, false);
  }
  function saran(){
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->
    set_rules(
      'contact_us_name',
      'contact_us_name',
      'required',
      array(
        'required'  =>  'Nama kategori harus diisi'
      )
    );

    if ($valid->run()===false)
    {
      $product_categorys     =  $this->M_product_categorys->get_all()->result();
      $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
      $contacts              =  $this->M_contacts->get_all()->row();
      $data  =
      array(
        'title'                 =>  'Kontak | Prinneo',
        'isi'                   =>  'pages/guest/v_kontak',
        'product_categorys'     =>  $product_categorys,
        'product_sub_categorys' =>  $product_sub_categorys,
        'contacts'              =>  $contacts,
      );
      $this->load->view("layouts/guest/wrapper", $data, false);
    }
    else
    {
      $this->M_contacts->add_saran($i->post());
      $this->session->set_flashdata('notifikasi', '<center>Pengisian saran berhasil dilakukan, Kami akan mengirimkan balasan melalui '.$i->post('contact_us_reply').' anda</center>');
      redirect('/kontak');
    }
  }

}
