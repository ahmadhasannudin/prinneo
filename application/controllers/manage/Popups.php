<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Popups extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_popups');
  }
  function index()
  {
    $popups = $this->M_popups->get_all()->result();
    $data  =
    array(
      'title'   =>  'Popups Management - Quick Corp',
      'isi'     =>  'pages/manage/popups_v',
      'popups'   =>  $popups
    );
    $this->load->view("layouts/manage/wrapper", $data, false);
  }
  function add(){
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->
    set_rules(
      'popup_link',
      'popup_link',
      'required',
      array(
        'required'  =>  'Title popup harus diisi'
      )
    );
    if ($valid->run()===false)
    {
      $data =
      array(
        'title'   =>  'Popups Management Add - Quick Corp',
        'isi'     =>  'pages/manage/popups_t',
      );
      $this->load->view("layouts/manage/wrapper", $data, false);
    }
    else
    {
      $config['upload_path']          = './assets/images/img_popups/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 3000;
      $config['encrypt_name']         = TRUE;
      $this->upload->initialize($config);
      if ( ! $this->upload->do_upload('popup_image'))
      {
        $this->session->set_flashdata('notifikasi', '
          <div class="alert alert-danger alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
          <strong>Gagal Upload!</strong> .
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('/manage/popups/add');
      }
      else
      {
        $data = array(
          'popup_link'       =>  $i->post('popup_link'),
          'popup_image'       =>  $this->upload->data('file_name'),
          'popup_image_meta'  =>  $i->post('popup_image_meta')
        );
        $this->M_popups->add($data);
        $this->session->set_flashdata('notifikasi', '
          <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
          <strong>Berhasil!</strong> menambahkan data baru.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('/manage/popups');
      }
    }
  }
  function update($popup_id){
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->
    set_rules(
      'popup_link',
      'popup_link',
      'required',
      array(
        'required'  =>  'Title popup harus diisi'
      )
    );
    if ($valid->run()===false)
    {
      $condition_popups = array(
        'popup_id'  => $popup_id
      );
      $popup_details = $this->M_popups->get_conditions($condition_popups)->row();
      $data =
      array(
        'title'   =>  'Popups Management Update - Quick Corp',
        'isi'     =>  'pages/manage/popups_e',
        'popup_details'  =>  $popup_details
      );
      $this->load->view("layouts/manage/wrapper", $data, false);
    }
    else
    {
      $config['upload_path']          = './assets/images/img_popups/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 3000;
      $config['encrypt_name']         = TRUE;
      $this->upload->initialize($config);
      if ( ! $this->upload->do_upload('popup_image'))
      {
        $data = array(
          'popup_link'       =>  $i->post('popup_link'),
          'popup_image'       =>  $i->post('popup_image_old'),
          'popup_image_meta'  =>  $i->post('popup_image_meta'),
          'popup_id'          =>  $popup_id
        );
      }
      else
      {
        $data = array(
          'popup_link'       =>  $i->post('popup_link'),
          'popup_image'       =>  $this->upload->data('file_name'),
          'popup_image_meta'  =>  $i->post('popup_image_meta'),
          'popup_id'          =>  $popup_id
        );
      }
      $this->M_popups->update($data);
      $this->session->set_flashdata('notifikasi', '
        <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
        <strong>Berhasil!</strong> Perubahan telah disimpan.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
      redirect('/manage/popups/update/'.$popup_id);
    }
  }
  function delete($popup_id){
    $this->M_popups->delete($popup_id);
    $this->session->set_flashdata('notifikasi', '
      <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
      <strong>Berhasil!</strong> Data berhasil Dihapus.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>');
    redirect('/manage/popups/');
  }
  public function modal()
  {
    $data = array(
      'popup_show'  =>  '0'
    );
    $this->M_popups->reset($data);
    $popup_id = $this->input->get('popup_id',TRUE);
    $modal = $this->input->get('modal',TRUE);
    $data = array(
      'popup_id'  =>  $popup_id,
      'popup_show'  =>  $modal
    );
    $this->M_popups->update($data);
    $this->session->set_flashdata('notifikasi', '
      <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
      <strong>Berhasil!</strong> Perubahan telah disimpan.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>');
    redirect('manage/popups');
  }
}
