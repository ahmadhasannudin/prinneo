<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_products');
    $this->load->model('M_product_categorys');
    $this->load->model('M_product_sub_categorys');
    $this->load->library('upload');
  }
  function index()
  {
    $join_datas = array(
      'table'   =>  'product_sub_categorys',
      'on'      =>  'product_sub_categorys.product_sub_category_id = products.product_sub_category_id'
    );
    $product_categorys = $this->M_product_categorys->get_all()->result();
    $products = $this->M_products->get_join_all($join_datas)->result();
    $data  =
    array(
      'title'   =>  'Products Management - Quick Corp',
      'isi'     =>  'pages/manage/products_v',
      'product_categorys'   =>  $product_categorys,
      'products'   =>  $products
    );
    $this->load->view("layouts/manage/wrapper", $data, false);
  }
  function list($id_sub_category)
  {
    $products = $this->M_products->get_sub_category($id_sub_category)->result();
    $data  =
    array(
      'title'   =>  'Products Management - Quick Corp',
      'isi'     =>  'pages/manage/products_v',
      'products'   =>  $products
    );
    $this->load->view("layouts/manage/wrapper", $data, false);
  }
  function add(){
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->
    set_rules(
      'product_name',
      'product_name',
      'required',
      array(
        'required'  =>  'Nama produk harus diisi'
      )
    );
    if ($valid->run()===false)
    {
      $product_categorys = $this->M_product_categorys->get_all()->result();
      $product_base = $this->M_products->get_base_all()->result();
      $data =
      array(
        'title'             =>  'Products Management Add - Quick Corp',
        'isi'               =>  'pages/manage/products_t',
        'product_categorys' =>  $product_categorys,
        'product_base' =>  $product_base
      );
      $this->load->view("layouts/manage/wrapper", $data, false);
    }
    else
    {
      $config['upload_path']          = './assets/images/img_products/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 3000;
      $config['encrypt_name']         = TRUE;
      $this->upload->initialize($config);
      if ( ! $this->upload->do_upload('product_image'))
      {
        $this->session->set_flashdata('notifikasi', '
          <div class="alert alert-danger alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
          <strong>Gagal Upload!</strong>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('/manage/products/add');
      }
      else
      {
        $data = array(
          'product_name'                  =>  $i->post('product_name'),
          'product_slug'                  =>  url_title($i->post('product_name')),
          'product_category_id'           =>  $i->post('product_category_id'),
          'product_sub_category_id'       =>  $i->post('product_sub_category_id'),
          'product_description'           =>  $i->post('product_description'),
          'product_determination_price'   =>  $i->post('product_determination_price'),
          'product_usability'             =>  $i->post('product_usability'),
          'product_start_price'           =>  $i->post('product_start_price'),
          'product_calc_html'             =>  $i->post('product_calc_html'),
          'product_calc_js'               =>  $i->post('product_calc_js'),
          'product_lumise_link'           =>  $i->post('product_lumise_link'),
          'product_weight'                =>  $i->post('product_weight'),
          'product_service'               =>  $i->post('product_service'),
          'product_status'                =>  $i->post('product_status'),
          'product_image'                 =>  $this->upload->data('file_name')
        );
        // echo "<pre>";
        // print_r($data);
        // exit();
        $this->M_products->add($data);
        $this->session->set_flashdata('notifikasi', '
          <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
          <strong>Tersimpan!</strong> Data berhasil ditambahkan.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('/manage/products');
      }
    }
  }
  function update($product_id){
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->
    set_rules(
      'product_name',
      'product_name',
      'required',
      array(
        'required'  =>  'Nama produk harus diisi'
      )
    );
    if ($valid->run()===false)
    {
      $condition_products = array(
        'product_id'  => $product_id
      );
      $product_categorys = $this->M_product_categorys->get_all()->result();
      $product_details = $this->M_products->get_conditions($condition_products)->row();
      $product_base = $this->M_products->get_base_all()->result();
      $data =
      array(
        'title'   =>  'Products Management Update - Quick Corp',
        'isi'     =>  'pages/manage/products_e',
        'product_categorys' =>  $product_categorys,
        'product_base' =>  $product_base,
        'product_details'  =>  $product_details
      );
      $this->load->view("layouts/manage/wrapper", $data, false);
    }
    else
    {
      $config['upload_path']          = './assets/images/img_products/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 3000;
      $config['encrypt_name']         = TRUE;
      $this->upload->initialize($config);
      if ( ! $this->upload->do_upload('product_image'))
      {
        $data = array(
          'product_name'                  =>  $i->post('product_name'),
          'product_slug'                  =>  url_title($i->post('product_name')),
          'product_category_id'           =>  $i->post('product_category_id'),
          'product_sub_category_id'       =>  $i->post('product_sub_category_id'),
          'product_description'           =>  $i->post('product_description'),
          'product_determination_price'   =>  $i->post('product_determination_price'),
          'product_usability'             =>  $i->post('product_usability'),
          'product_start_price'           =>  $i->post('product_start_price'),
          'product_lumise_link'           =>  $i->post('product_lumise_link'),
          'product_weight'                =>  $i->post('product_weight'),
          'product_service'                =>  $i->post('product_service'),
          'product_status'                =>  $i->post('product_status'),
          'product_image'                 =>  $i->post('product_image_old'),
          'product_id'                    =>  $product_id
        );
      }
      else
      {
        $data = array(
          'product_name'                  =>  $i->post('product_name'),
          'product_slug'                  =>  url_title($i->post('product_name')),
          'product_category_id'           =>  $i->post('product_category_id'),
          'product_sub_category_id'       =>  $i->post('product_sub_category_id'),
          'product_description'           =>  $i->post('product_description'),
          'product_determination_price'   =>  $i->post('product_determination_price'),
          'product_usability'             =>  $i->post('product_usability'),
          'product_start_price'           =>  $i->post('product_start_price'),
          'product_lumise_link'           =>  $i->post('product_lumise_link'),
          'product_weight'                =>  $i->post('product_weight'),
          'product_service'               =>  $i->post('product_service'),
          'product_status'                =>  $i->post('product_status'),
          'product_image'                 =>  $this->upload->data('file_name'),
          'product_id'                    =>  $product_id
        );
        $condition_products = array('product_id'  => $product_id);
        $product_details = $this->M_products->get_conditions($condition_products)->row();
        $path = $product_details->product_image;
        unlink('assets/images/img_products/'.$path);
      }
      $this->M_products->update($data);
      $this->session->set_flashdata('notifikasi', '
        <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
        <strong>Tersimpan!</strong> Data berhasil diubah.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
      redirect('/manage/products/update/'.$product_id);
    }
  }
  public function duplicate_product($product_id)
  {
   $condition_products = array(
    'product_id'  => $product_id
  );
   $product_details = $this->M_products->get_conditions($condition_products)->row();
   $this->_create_thumbs($product_details->product_image);
   $data = array(
    'product_name'                  =>  $product_details->product_name.' copy',
    'product_slug'                  =>  url_title($product_details->product_name.' copy'),
    'product_category_id'           =>  $product_details->product_category_id,
    'product_sub_category_id'       =>  $product_details->product_sub_category_id,
    'product_description'           =>  $product_details->product_description,
    'product_determination_price'   =>  $product_details->product_determination_price,
    'product_usability'             =>  $product_details->product_usability,
    'product_start_price'           =>  $product_details->product_start_price,
    'product_calc_html'             =>  $product_details->product_calc_html,
    'product_calc_js'               =>  $product_details->product_calc_js,
    'product_lumise_link'           =>  $product_details->product_lumise_link,
    'product_weight'                =>  $product_details->product_weight,
    'product_service'               =>  $product_details->product_service,
    'product_status'                =>  $product_details->product_status,
    'product_image'                 =>  'copy-'.$product_details->product_image
  );
     // echo "<pre>";
     // print_r($data);
     // exit();
   $this->M_products->add($data);
   $this->session->set_flashdata('notifikasi', '
    <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
    <strong>Tersimpan!</strong> Data berhasil Diduplikasi.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>');
   redirect('/manage/products');
 }
 function _create_thumbs($file_name){
        // Image resizing config
  $config = array(
            // Image Large
    array(
      'image_library' => 'GD2',
      'source_image'  => './assets/images/img_products/'.$file_name,
      'maintain_ratio'=> FALSE,
      'width'         => 620,
      'height'        => 500,
      'new_image'     => './assets/images/img_products/copy-'.$file_name
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
public function update_script($product_id)
{
  $i  = $this->input;
  $data = array(
    'product_calc_html'             =>  $i->post('product_calc_html'),
    'product_calc_js'               =>  $i->post('product_calc_js'),
    'product_id'                    =>  $product_id
  );
  $this->M_products->update($data);
  $this->session->set_flashdata('notifikasi', '
    <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
    <strong>Tersimpan!</strong> Data berhasil diubah.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>');
  redirect('/manage/products/update/'.$product_id);
}
function delete($product_id){
  $condition_products = array('product_id'  => $product_id);
  $product_details = $this->M_products->get_conditions($condition_products)->row();
  $path = $product_details->product_image;
  unlink('assets/images/img_products/'.$path);
  $this->M_products->delete($product_id);
  $this->session->set_flashdata('notifikasi', '
    <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
    <strong>Tersimpan!</strong> Data berhasil dihapus.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>');
  redirect('/manage/products/');
}
}
