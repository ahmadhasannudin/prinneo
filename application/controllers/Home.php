<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_product_categorys');
    $this->load->model('M_product_sub_categorys');
    $this->load->model('M_contacts');

    $this->load->model('M_sliders');
    $this->load->model('M_testimonials');
    $this->load->model('M_blogs');
    $this->load->model('M_popups');
  }

  function index()
  {
    $product_categorys     =  $this->M_product_categorys->get_all()->result();
    $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
    $testimonials          =  $this->M_testimonials->get_home()->result();
    $blog_newest          =  $this->M_blogs->get_home()->result();
    $sliders               =  $this->M_sliders->get_all()->result();
    $contacts              =  $this->M_contacts->get_all()->row();
    $data  =
      array(
        'title'                 =>  'Home',
        'isi'                   =>  'pages/guest/v_home',
        'product_categorys'     =>  $product_categorys,
        'product_sub_categorys' =>  $product_sub_categorys,
        'testimonials'          =>  $testimonials,
        'blog_newest'           =>  $blog_newest,
        'sliders'               =>  $sliders,
        'contacts'              =>  $contacts,
        'pageFooter'            => 'pages/guest/v_home_footer',
        'popup' => $this->M_popups->get_conditions(['popup_show' => '1'])->row()
      );

    $this->load->view("layouts/guest/wrapper", $data, false);
  }
  function subscribe()
  {
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->set_rules(
      'subscriber_email',
      'subscriber_email',
      'required',
      array(
        'required'  =>  'Email harus diisi'
      )
    );
    if ($valid->run() === false) {

      $product_categorys     =  $this->M_product_categorys->get_all()->result();
      $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
      $testimonials          =  $this->M_testimonials->get_home()->result();
      $blog_newest          =  $this->M_blogs->get_home()->result();
      $sliders               =  $this->M_sliders->get_all()->result();
      $contacts              =  $this->M_contacts->get_all()->row();
      $data  =
        array(
          'title'                 =>  'Home',
          'isi'                   =>  'pages/guest/v_home',
          'product_categorys'     =>  $product_categorys,
          'product_sub_categorys' =>  $product_sub_categorys,
          'testimonials'          =>  $testimonials,
          'blog_newest'           =>  $blog_newest,
          'sliders'               =>  $sliders,
          'contacts'              =>  $contacts,
        );
      $this->load->view("layouts/guest/wrapper", $data, false);
    } else {
      $data = array(
        'subscriber_email'      =>  $i->post('subscriber_email'),
      );
      $this->M_contacts->add_subscribe($data);
      $this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;z-index:999">
        <strong>Email Berhasil Ditambahkan!</strong>, Kami akan mengirimkan promo ke email anda.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div><center></center>');
      redirect('/home');
    }
  }
  public function soon()
  {
    $data  = array(
      'title'                 =>  'Home',
    );
    $this->load->view("pages/guest/v_soon", $data, false);
  }
  function kosong()
  {
    $product_categorys     =  $this->M_product_categorys->get_all()->result();
    $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
    $contacts              =  $this->M_contacts->get_all()->row();
    $data  =
      array(
        'title'                 =>  'Halaman Tidak Ditemukan',
        'isi'                   =>  'pages/guest/v_404',
        'product_categorys'     =>  $product_categorys,
        'product_sub_categorys' =>  $product_sub_categorys,
        'contacts'              =>  $contacts,
      );
    $this->load->view("layouts/guest/wrapper", $data, false);
  }
}
