<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product_sub_categorys extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_product_categorys');
    $this->load->model('M_product_sub_categorys');
  }
  function index()
  {
    $product_categorys = $this->M_product_categorys->get_all()->result();
    $product_sub_categorys = $this->M_product_sub_categorys->get_all()->result();
    $data  =
    array(
      'title'            =>  'Product Sub-Categorys Management - Quick Corp',
      'isi'              =>  'pages/manage/product_sub_categorys_v',
      'product_categorys'   =>  $product_categorys,
      'product_sub_categorys'   =>  $product_sub_categorys
    );
    $this->load->view("layouts/manage/wrapper", $data, false);
  }
  function view($product_id)
  {
    $product_sub_category_datas = array(
      'product_category_id' => $product_id
    );
    $product_sub_categorys = $this->M_product_sub_categorys->get_conditions($product_sub_category_datas)->result();
    $data  =
    array(
      'title'            =>  'Product Sub-Categorys Management - Quick Corp',
      'isi'              =>  'pages/manage/product_sub_categorys_v',
      'product_sub_categorys'   =>  $product_sub_categorys
    );
    $this->load->view("layouts/manage/wrapper", $data, false);
  }
  function add(){
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->
    set_rules(
      'product_sub_category_name',
      'product_sub_category_name',
      'required',
      array(
        'required'  =>  'Nama kategori harus diisi'
      )
    );

    if ($valid->run()===false)
    {
      $product_categorys = $this->M_product_categorys->get_all()->result();
      $data =
      array(
        'title'   =>  'Product Sub-Categorys Management Add - Quick Corp',
        'product_categorys' => $product_categorys,
        'isi'     =>  'pages/manage/product_sub_categorys_t',
      );
      $this->load->view("layouts/manage/wrapper", $data, false);
    }
    else
    {
      $config['upload_path']          = './assets/images/img_product_sub_categorys/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 3000;
      $config['encrypt_name']         = TRUE;
      $this->upload->initialize($config);
      if ( ! $this->upload->do_upload('product_sub_category_image'))
      {
        $this->session->set_flashdata('notifikasi', '
          <div class="alert alert-danger alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
          <strong>Gagal !</strong> mengupload Gambar.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('/manage/product_sub_categorys/add');
      }
      else
      {
        $data = array(
          'product_sub_category_name'       =>  $i->post('product_sub_category_name'),
          'product_sub_category_slug'       =>  url_title($i->post('product_sub_category_name')),
          'product_sub_category_image'      =>  $this->upload->data('file_name'),
          'product_category_id'             =>  $i->post('product_category_id'),
        );
        $this->M_product_sub_categorys->add($data);
        $this->session->set_flashdata('notifikasi', '
          <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
          <strong>Tersimpan!</strong> Data berhasil disimpan.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('/manage/product_sub_categorys');
      }
    }
  }
  function update($product_sub_category_id){
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->
    set_rules(
      'product_sub_category_name',
      'product_sub_category_name',
      'required',
      array(
        'required'  =>  'Nama kategori harus diisi'
      )
    );
    if ($valid->run()===false)
    {
      $condition_product_sub_categorys = array(
        'product_sub_category_id'  => $product_sub_category_id
      );
      $product_sub_category_details = $this->M_product_sub_categorys->get_conditions($condition_product_sub_categorys)->row();
      $product_categorys = $this->M_product_categorys->get_all()->result();
      $data =
      array(
        'title'   =>  'Product Sub-Categorys Management Update - Quick Corp',
        'isi'     =>  'pages/manage/product_sub_categorys_e',
        'product_categorys'  =>  $product_categorys,
        'product_sub_category_details'  =>  $product_sub_category_details
      );
      $this->load->view("layouts/manage/wrapper", $data, false);
    }
    else
    {
      $config['upload_path']          = './assets/images/img_product_sub_categorys/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 3000;
      $config['encrypt_name']         = TRUE;
      $this->upload->initialize($config);
      if ( ! $this->upload->do_upload('product_sub_category_image'))
      {
        $data = array(
          'product_sub_category_name'       =>  $i->post('product_sub_category_name'),
          'product_sub_category_slug'       =>  url_title($i->post('product_sub_category_name')),
          'product_sub_category_image'      =>  $i->post('product_sub_category_image_old'),
          'product_sub_category_id'         =>  $product_sub_category_id
        );
      }
      else
      {
        $data = array(
          'product_sub_category_name'       =>  $i->post('product_sub_category_name'),
          'product_sub_category_slug'       =>  url_title($i->post('product_sub_category_name')),
          'product_sub_category_image'      =>  $this->upload->data('file_name'),
          'product_sub_category_id'         =>  $product_sub_category_id
        );
        $condition_product_sub_categorys = array('product_sub_category_id'  => $product_sub_category_id);
        $product_sub_category_details = $this->M_product_sub_categorys->get_conditions($condition_product_sub_categorys)->row();
        $path = $product_sub_category_details->product_sub_category_image;
        unlink('assets/images/img_product_sub_categorys/'.$path);
      }
      $this->M_product_sub_categorys->update($data);
      $this->session->set_flashdata('notifikasi', '
        <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
        <strong>Tersimpan!</strong> Data berhasil diubah.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
      redirect('/manage/product_sub_categorys');
    }
  }
  public function duplicate($product_sub_category_id)
  {
    $condition_product_sub_categorys = array('product_sub_category_id'  => $product_sub_category_id);
    $product_sub_category_details = $this->M_product_sub_categorys->get_conditions($condition_product_sub_categorys)->row();
    $this->_create_thumbs($product_sub_category_details->product_sub_category_image);
    $data = array(
      'product_sub_category_name'     =>  $product_sub_category_details->product_sub_category_name.' copy',
      'product_sub_category_slug'     =>  url_title($product_sub_category_details->product_sub_category_name.' copy'),
      'product_category_id'           =>  $product_sub_category_details->product_category_id,
      'product_sub_category_image'    =>  'copy-'.$product_sub_category_details->product_sub_category_image
    );
     // echo "<pre>";
     // print_r($data);
     // exit();
    $this->M_product_sub_categorys->add($data);
    $this->session->set_flashdata('notifikasi', '
      <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
      <strong>Tersimpan!</strong> Data berhasil Diduplikasi.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>');
    redirect('/manage/product_sub_categorys');
  }
  function _create_thumbs($file_name){
        // Image resizing config
    $config = array(
            // Image Large
      array(
        'image_library' => 'GD2',
        'source_image'  => './assets/images/img_product_sub_categorys/'.$file_name,
        'maintain_ratio'=> FALSE,
        'width'         => 1280,
        'height'        => 143,
        'new_image'     => './assets/images/img_product_sub_categorys/copy-'.$file_name
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
  function delete($product_sub_category_id){
    $condition_product_sub_categorys = array('product_sub_category_id'  => $product_sub_category_id);
    $product_sub_category_details = $this->M_product_sub_categorys->get_conditions($condition_product_sub_categorys)->row();
    $path = $product_sub_category_details->product_sub_category_image;
    unlink('assets/images/img_product_sub_categorys/'.$path);
    $this->M_product_sub_categorys->delete($product_sub_category_id);
    $this->session->set_flashdata('notifikasi', '
      <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
      <strong>Data Berhasil!</strong> terhapus.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>');
    redirect('/manage/product_sub_categorys');
  }
  function get_product_sub_category_id_selected($product_sub_category_id, $product_category_id){
    $product_sub_category_datas = array(
      'product_category_id' => $product_category_id
    );
    $product_sub_categorys = $this->M_product_sub_categorys->get_all_conditions($product_sub_category_datas)->result();
    echo "<option value='' disabled>Pilih Sub Kategori</option>" ;
    foreach ($product_sub_categorys as $product_sub_category) {
      if ($product_sub_category->product_sub_category_id == $product_sub_category_id) {
        echo "<option value='".$product_sub_category->product_sub_category_id."'selected>".$product_sub_category->product_sub_category_name."</option>";
      }else {
        echo "<option value='".$product_sub_category->product_sub_category_id."'>".$product_sub_category->product_sub_category_name."</option>";
      }
    }
  }
  function get_product_sub_category_id($product_category_id){
    $product_sub_category_datas = array(
      'product_category_id' => $product_category_id
    );
    $product_sub_categorys = $this->M_product_sub_categorys->get_all_conditions($product_sub_category_datas)->result();
    echo "<option value='' selected disabled>Pilih Sub Kategori</option>" ;
    foreach ($product_sub_categorys as $product_sub_category) {
      echo "<option value='".$product_sub_category->product_sub_category_id."'>".$product_sub_category->product_sub_category_name."</option>";
    }
  }
}
