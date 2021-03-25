<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product_categorys extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_product_categorys');
  }
  function index()
  {
    $product_categorys = $this->M_product_categorys->get_all()->result();
    $data  =
    array(
      'title'            =>  'Product Categorys Management - Quick Corp',
      'isi'              =>  'pages/manage/product_categorys_v',
      'product_categorys'   =>  $product_categorys
    );
    $this->load->view("layouts/manage/wrapper", $data, false);
  }
  function add(){
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->
    set_rules(
      'product_category_name',
      'product_category_name',
      'required',
      array(
        'required'  =>  'Nama kategori harus diisi'
      )
    );

    if ($valid->run()===false)
    {
      $data =
      array(
        'title'   =>  'Product Categorys Management Add - Quick Corp',
        'isi'     =>  'pages/manage/product_categorys_t',
      );
      $this->load->view("layouts/manage/wrapper", $data, false);
    }
    else
    {
      $config['upload_path']          = './assets/images/img_product_categorys/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 3000;
      $config['encrypt_name']         = TRUE;
      $this->upload->initialize($config);
      if ( ! $this->upload->do_upload('product_category_image'))
      {
        $this->session->set_flashdata('notifikasi', '
          <div class="alert alert-danger alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
          <strong>Gagal Upload!</strong>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('/manage/product_categorys/add');
      }
      else
      {
        $data = array(
          'product_category_name'       =>  $i->post('product_category_name'),
          'product_category_desk'       =>  $i->post('product_category_desk'),
          'product_category_image'      =>  $this->upload->data('file_name'),
          'product_category_slug'       =>  url_title($i->post('product_category_name'))
        );
        $this->M_product_categorys->add($data);
        $this->session->set_flashdata('notifikasi', '
          <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
          <strong>Data Berhasil Tersimpan!</strong>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('/manage/product_categorys');
      }
    }
  }
  function update($product_category_id){
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->
    set_rules(
      'product_category_name',
      'product_category_name',
      'required',
      array(
        'required'  =>  'Nama kategori harus diisi'
      )
    );
    if ($valid->run()===false)
    {
      $condition_product_categorys = array(
        'product_category_id'  => $product_category_id
      );
      $product_category_details = $this->M_product_categorys->get_conditions($condition_product_categorys)->row();
      $data =
      array(
        'title'                     =>  'Product Categorys Management Update - Quick Corp',
        'isi'                       =>  'pages/manage/product_categorys_e',
        'product_category_details'  =>  $product_category_details
      );
      $this->load->view("layouts/manage/wrapper", $data, false);
    }
    else
    {

      $config['upload_path']          = './assets/images/img_product_categorys/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 3000;
      $config['encrypt_name']         = TRUE;
      $this->upload->initialize($config);
      if ( ! $this->upload->do_upload('product_category_image'))
      {
        $data = array(
          'product_category_name'       =>  $i->post('product_category_name'),
          'product_category_desk'       =>  $i->post('product_category_desk'),
          'product_category_image'      =>  $i->post('product_category_image_old'),
          'product_category_slug'       =>  url_title($i->post('product_category_name')),
          'product_category_id'         =>  $i->post('product_category_id')
        );
      }
      else
      {
        $data = array(
          'product_category_name'       =>  $i->post('product_category_name'),
          'product_category_desk'       =>  $i->post('product_category_desk'),
          'product_category_image'      =>  $this->upload->data('file_name'),
          'product_category_slug'       =>  url_title($i->post('product_category_name')),
          'product_category_id'         =>  $i->post('product_category_id')
        );

        $condition_product_categorys = array('product_category_id'  => $product_category_id);
        $details = $this->M_product_categorys->get_conditions($condition_product_categorys)->row();
        $path = $details->product_category_image;
        unlink('assets/images/img_product_categorys/'.$path);
      }
      $this->M_product_categorys->update($data);
      $this->session->set_flashdata('notifikasi', '
        <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
        <strong>Data Berhasil Di update!</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
      redirect('/manage/product_categorys');
    }
  }
  public function duplicate($product_category_id)
  {
    $condition_product_categorys = array('product_category_id'  => $product_category_id);
    $product_category_details = $this->M_product_categorys->get_conditions($condition_product_categorys)->row();
    $this->_create_thumbs($product_category_details->product_category_image);
    $data = array(
      'product_category_name'     =>  $product_category_details->product_category_name.' copy',
      'product_category_slug'     =>  url_title($product_category_details->product_category_name.' copy'),
      'product_category_desk'     =>  $product_category_details->product_category_desk,
      'product_category_image'    =>  'copy-'.$product_category_details->product_category_image
    );
     // echo "<pre>";
     // print_r($data);
     // exit();
    $this->M_product_categorys->add($data);
    $this->session->set_flashdata('notifikasi', '
      <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
      <strong>Tersimpan!</strong> Data berhasil Diduplikasi.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>');
    redirect('/manage/product_categorys');
  }
  function _create_thumbs($file_name){
        // Image resizing config
    $config = array(
            // Image Large
      array(
        'image_library' => 'GD2',
        'source_image'  => './assets/images/img_product_categorys/'.$file_name,
        'maintain_ratio'=> FALSE,
        'width'         => 310,
        'height'        => 250,
        'new_image'     => './assets/images/img_product_categorys/copy-'.$file_name
      )
    );

    $this->load->library('image_lib', $config[0]);
    foreach ($config as $item){
      $this->image_lib->initialize($item);
      if(!$this->image_lib->resize()){
        return false;
      }
      $this->image_lib->clear();
    }
  }
  function delete($product_category_id){
    $condition_product_categorys = array('product_category_id'  => $product_category_id);
    $product_category_details = $this->M_product_categorys->get_conditions($condition_product_categorys)->row();
    $path = $product_category_details->product_category_image;
    unlink('assets/images/img_product_categorys/'.$path);
    $this->M_product_categorys->delete($product_category_id);
    $this->session->set_flashdata('notifikasi', '
      <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
      <strong>Data Berhasil Di Hapus!</strong>.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>');
    redirect('/manage/product_categorys/');
  }
}
