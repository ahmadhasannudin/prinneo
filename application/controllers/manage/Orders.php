<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Orders extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_orders');
  }
  function index()
  {
    $orders = $this->M_orders->get_all()->result();
    $data  =
    array(
      'title'   =>  'Transaksi - Quick Corp',
      'isi'     =>  'pages/manage/transaksi_v',
      'orders'   =>  $orders
    );
    $this->load->view("layouts/manage/wrapper", $data, false);
  }
  function add(){
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->
    set_rules(
      'slider_title',
      'slider_title',
      'required',
      array(
        'required'  =>  'Title slider harus diisi'
      )
    );
    if ($valid->run()===false)
    {
      $data =
      array(
        'title'   =>  'orders Management Add - Quick Corp',
        'isi'     =>  'pages/manage/orders_t',
      );
      $this->load->view("layouts/manage/wrapper", $data, false);
    }
    else
    {
      $config['upload_path']          = './assets/images/img_orders/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 3000;
      $config['encrypt_name']         = TRUE;
      $this->upload->initialize($config);
      if ( ! $this->upload->do_upload('slider_image'))
      {
        $this->session->set_flashdata('notifikasi', '
          <div class="alert alert-danger alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
          <strong>Gagal Upload!</strong>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('/manage/orders/add');
      }
      else
      {
        $data = array(
          'slider_title'       =>  $i->post('slider_title'),
          'slider_image'       =>  $this->upload->data('file_name'),
          'slider_image_meta'  =>  url_title($i->post('slider_title'))
        );
        $this->M_orders->add($data);
        $this->session->set_flashdata('notifikasi', '
          <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
          <strong>Data Berhasil Tersimpan!</strong>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('/manage/orders');
      }
    }
  }
  function update($slider_id){
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->
    set_rules(
      'slider_title',
      'slider_title',
      'required',
      array(
        'required'  =>  'Title slider harus diisi'
      )
    );
    if ($valid->run()===false)
    {
      $condition_orders = array(
        'slider_id'  => $slider_id
      );
      $slider_details = $this->M_orders->get_conditions($condition_orders)->row();
      $data =
      array(
        'title'   =>  'orders Management Update - Quick Corp',
        'isi'     =>  'pages/manage/orders_e',
        'slider_details'  =>  $slider_details
      );
      $this->load->view("layouts/manage/wrapper", $data, false);
    }
    else
    {
      $config['upload_path']          = './assets/images/img_orders/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 3000;
      $config['encrypt_name']         = TRUE;
      $this->upload->initialize($config);
      if ( ! $this->upload->do_upload('slider_image'))
      {
        $data = array(
          'slider_title'       =>  $i->post('slider_title'),
          'slider_image'       =>  $i->post('slider_image_old'),
          'slider_image_meta'  =>  url_title($i->post('slider_title')),
          'slider_id'          =>  $slider_id
        );
      }
      else
      {
        $data = array(
          'slider_title'       =>  $i->post('slider_title'),
          'slider_image'       =>  $this->upload->data('file_name'),
          'slider_image_meta'  =>  url_title($i->post('slider_title')),
          'slider_id'          =>  $slider_id
        );
        $condition_orders = array('slider_id'  => $slider_id);
        $details = $this->M_orders->get_conditions($condition_orders)->row();
        $path = $details->slider_image;
        unlink('assets/images/img_orders/'.$path);
      }
      $this->M_orders->update($data);
      $this->session->set_flashdata('notifikasi', '
        <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
        <strong>Data Berhasil Di update!</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
      redirect('/manage/orders/update/'.$slider_id);
    }
  }
  function delete($slider_id){
    $condition_orders = array('slider_id'  => $slider_id);
    $details = $this->M_orders->get_conditions($condition_orders)->row();
    $path = $details->slider_image;
    unlink('assets/images/img_orders/'.$path);
    $this->M_orders->delete($slider_id);
    $this->session->set_flashdata('notifikasi', '
      <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
      <strong>Data Berhasil Di Hapus!</strong>.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>');
    redirect('/manage/orders/');
  }
}
