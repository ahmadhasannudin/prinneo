<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contacts extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_contacts');
  }

  function index(){
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->
    set_rules(
      'contact_phone',
      'contact_phone',
      'required',
      array(
        'required'  =>  'Nomor harus diisi'
      )
    );
    if ($valid->run()===false)
    {
      $condition_contacts = array(
        'contact_id'  => '1'
      );
      $contact_details = $this->M_contacts->get_conditions($condition_contacts)->row();
      $data =
      array(
        'title'   =>  'Contacts Management Update - Quick Corp',
        'isi'     =>  'pages/manage/contacts_e',
        'contact_details'  =>  $contact_details
      );
      $this->load->view("layouts/manage/wrapper", $data, false);
    }
    else
    {
      $this->M_contacts->update($i->post());
      $this->session->set_flashdata('notifikasi', '
        <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
        <strong>Data Berhasil Tersimpan!</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
      redirect('/manage/contacts/');
    }
  }
  public function update_header(){
    $config['upload_path']          = './assets/images/home/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 3000;
    $config['encrypt_name']         = TRUE;
    $this->upload->initialize($config);
    if ( ! $this->upload->do_upload('contact_logo_header'))
    {
      $this->session->set_flashdata('notifikasi', '
        <div class="alert alert-danger alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
        <strong>Gagal Upload!</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
      redirect('/manage/contacts');
    }
    else
    {
      $data = array(
        'contact_logo_header'  =>  $this->upload->data('file_name'),
        'contact_id'           =>  '1',
      );
      $condition_product_categorys = array('contact_id'  => '1');
      $details = $this->M_contacts->get_conditions($condition_product_categorys)->row();
      $path = $details->contact_logo_header;
      unlink('assets/images/home/'.$path);
      $this->M_contacts->update($data);

      $this->session->set_flashdata('notifikasi', '
        <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
        <strong>Data Berhasil Tersimpan!</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
      redirect('/manage/contacts');
    }
  }
  public function update_footer(){
    $config['upload_path']          = './assets/images/home/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 3000;
    $config['encrypt_name']         = TRUE;
    $this->upload->initialize($config);
    if ( ! $this->upload->do_upload('contact_logo_footer'))
    {
      $this->session->set_flashdata('notifikasi', '
        <div class="alert alert-danger alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
        <strong>Gagal Upload!</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
      redirect('/manage/contacts');
    }
    else
    {
      $data = array(
        'contact_logo_footer'  =>  $this->upload->data('file_name'),
        'contact_id'           =>  '1',
      );
      $condition_product_categorys = array('contact_id'  => '1');
      $details = $this->M_contacts->get_conditions($condition_product_categorys)->row();
      $path = $details->contact_logo_footer;
      unlink('assets/images/home/'.$path);
      $this->M_contacts->update($data);

      $this->session->set_flashdata('notifikasi', '
        <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
        <strong>Data Berhasil Tersimpan!</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
      redirect('/manage/contacts');
    }
  }
  function saran()
  {
    $contacts = $this->M_contacts->get_saran()->result();
    $data  =
    array(
      'title'            =>  'Kritik & Saran Management - Quick Corp',
      'isi'              =>  'pages/manage/contact_us_v',
      'contacts'         =>  $contacts
    );
    $this->load->view("layouts/manage/wrapper", $data, false);
  }
  function delete($contact_us_id){
    $this->M_contacts->delete($contact_us_id);
    $this->session->set_flashdata('notifikasi', '
      <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
      <strong>Data Saran Berhasil Terhapus!</strong>.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>');
    redirect('/manage/contacts/saran');
  }

}
