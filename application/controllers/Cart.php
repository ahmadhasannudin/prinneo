<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_product_categorys');
    $this->load->model('M_product_sub_categorys');
    $this->load->model('M_contacts');
    $this->load->model('M_faqs');
    $this->load->model('M_orders');
  }

  function index()
  {

    $cart = $this->cart->contents();
    $product_categorys     =  $this->M_product_categorys->get_all()->result();
    $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
    $contacts              =  $this->M_contacts->get_all()->row();
    $faqs                  =  $this->M_faqs->get_all()->result();
    $data  =
    array(
      'title'                 =>  'Tinjauan Pesanan',
      'isi'                   =>  'pages/guest/v_cart',
      'product_categorys'     =>  $product_categorys,
      'product_sub_categorys' =>  $product_sub_categorys,

      'contacts'              =>  $contacts,
    );
    // echo "<pre>";
    // print_r($cart);
    // exit();
    $this->load->view("layouts/guest/wrapper", $data, false);
  }
  public function add_cart()
  {
    $input                    = $this->input;
    $config['upload_path']          = './assets/images/tmp_cart/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 3000;
    $this->upload->initialize($config);
    if ( ! $this->upload->do_upload('file_order'))
    {
      $this->session->set_flashdata('notifikasi', '
        <div class="alert alert-danger alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
        <strong>Gagal Upload!</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
      redirect('cart');
    }
    else
    {
      $data = array(
        'nama_order'               => $input->post('nama_order'),
        'nohp_order'               => $input->post('nohp_order'),
        'email_order'              => $input->post('email_order'),
        'jenis_order'              => $input->post('jenis_order'),
        'product_category_id'      => $input->post('product_category_id'),
        'product_sub_category_id'  => $input->post('product_sub_category_id'),
        'product_image'            => $input->post('product_image'),
        'product_spesifikasi'      => $input->post('product_spesifikasi'),
        'kode_order'               => $input->post('kode_order'),
        'file_order'               => $this->upload->data(),
        'keterangan_order'         => $input->post('keterangan_order'),
        'id'                       => $input->post('product_id'), 
        'name'                     => $input->post('product_name'),  
        'price'                    => $input->post('price'), 
        'qty'                      => $input->post('qty'),
      );
      $cart = $this->cart->contents();
      $tmp_file = array(
        'kode_order'               => $data['kode_order'],
        'file_tmp'               => $this->upload->data('file_name'),
      );
      $this->cart->insert($data);
      $this->M_orders->add($tmp_file);
    // echo "<pre>";
    // print_r($data);
    // print_r($tmp_file);
    // exit();

      $this->session->set_flashdata('notifikasi', '
        <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
        <strong>Data Berhasil Tersimpan!</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
      redirect('cart');
    }
  }
  public function add()
  {
    $input                    = $this->input;
    $data = array(
      'nama_order'               => '-',
      'nohp_order'               => '-',
      'email_order'              => '-',
      'jenis_order'              => 'beli',
      'product_category_id'      => $input->post('product_category_id'),
      'product_sub_category_id'  => $input->post('product_sub_category_id'),
      'product_image'  => $input->post('product_image'),
      'product_spesifikasi'      => $input->post('product_spesifikasi'),
      'kode_order'               => '-',
      'id'                       => $input->post('product_id'), 
      'name'                     => $input->post('product_name'),  
      'price'                    => $input->post('price'), 
      'qty'                      => $input->post('qty'),
    );
    $this->cart->insert($data);
    // echo "<pre>";
    // print_r($data);
    // exit();

    $this->session->set_flashdata('notifikasi', '
      <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
      <strong>Data Berhasil Tersimpan!</strong>.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>');
    redirect('cart');

  }
  public function delete_cart($id)
  {
    $data = array(
      'rowid' => $id, 
      'qty' => 0, 
    );
    $this->cart->update($data);
    redirect('cart');
  }
  public function add_qty()
  {
    $id   = $this->input->get('id',TRUE);
    $qty  = $this->input->get('qty',TRUE);
    $data = array(
      'rowid' => $id, 
      'qty' => $qty, 
    );
    // echo "<pre>";
    // print_r($data);
    // exit();
    $this->cart->update($data);
    redirect('cart');
  }

}
