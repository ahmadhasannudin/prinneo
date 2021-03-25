<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Banks extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_banks');
  }
  function index()
  {
    $banks = $this->M_banks->get_all()->result();
    $data  =
    array(
      'title'   =>  'Banks Management - Quick Corp',
      'isi'     =>  'pages/manage/banks_v',
      'banks'   =>  $banks
    );
    $this->load->view("layouts/manage/wrapper", $data, false);
  }
  function add(){
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->
    set_rules(
      'bank_name',
      'bank_name',
      'required',
      array(
        'required'  =>  'Nama bank harus diisi'
      )
    );
    $valid->
    set_rules(
      'bank_account_number',
      'bank_account_number',
      'required',
      array(
        'required'  =>  'No. rekening bank harus diisi'
      )
    );
    $valid->
    set_rules(
      'bank_account_name',
      'bank_account_name',
      'required',
      array(
        'required'  =>  'Nama pemilik rekening bank harus diisi'
      )
    );
    if ($valid->run()===false)
    {
      $data =
      array(
        'title'   =>  'Banks Management Add - Quick Corp',
        'isi'     =>  'pages/manage/banks_t',
      );
      $this->load->view("layouts/manage/wrapper", $data, false);
    }
    else
    {
      $config['upload_path']          = './assets/images/img_banks/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 3000;
      $config['encrypt_name']         = TRUE;
      $this->upload->initialize($config);
      if ( ! $this->upload->do_upload('bank_img'))
      {
        $this->session->set_flashdata('notifikasi', '
          <div class="alert alert-danger alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
          <strong>Gagal Upload!</strong>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('/manage/banks/add');
      }
      else
      {
        $data = array(
          'bank_name'             =>  $i->post('bank_name'),
          'bank_account_name'     =>  $i->post('bank_account_name'),
          'bank_account_number'   =>  $i->post('bank_account_number'),
          'bank_img'              =>  $this->upload->data('file_name')
        );
        $this->M_banks->add($data);
        $this->session->set_flashdata('notifikasi', '
          <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
          <strong>Data Berhasil Tersimpan!</strong>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('/manage/banks');
      }     
    }
  }
  function update($bank_id){
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->
    set_rules(
      'bank_name',
      'bank_name',
      'required',
      array(
        'required'  =>  'Nama bank harus diisi'
      )
    );
    $valid->
    set_rules(
      'bank_account_number',
      'bank_account_number',
      'required',
      array(
        'required'  =>  'No. rekening bank harus diisi'
      )
    );
    $valid->
    set_rules(
      'bank_account_name',
      'bank_account_name',
      'required',
      array(
        'required'  =>  'Nama pemilik rekening bank harus diisi'
      )
    );
    if ($valid->run()===false)
    {
      $condition_banks = array(
        'bank_id'  => $bank_id
      );
      $bank_details = $this->M_banks->get_conditions($condition_banks)->row();
      $data =
      array(
        'title'   =>  'Banks Management Update - Quick Corp',
        'isi'     =>  'pages/manage/banks_e',
        'bank_details'  =>  $bank_details
      );
      $this->load->view("layouts/manage/wrapper", $data, false);
    }
    else
    {
      $config['upload_path']          = './assets/images/img_banks/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 3000;
      $config['encrypt_name']         = TRUE;
      $this->upload->initialize($config);
      if ( ! $this->upload->do_upload('bank_img'))
      {
        $data = array(
          'bank_name'             =>  $i->post('bank_name'),
          'bank_account_name'     =>  $i->post('bank_account_name'),
          'bank_account_number'   =>  $i->post('bank_account_number'),
          'bank_img'              =>  $i->post('bank_img_old'),
          'bank_id'               =>  $bank_id,
        );
        $this->M_banks->update($data);
        $this->session->set_flashdata('notifikasi', '
          <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
          <strong>Data Berhasil Terhapus!</strong>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('/manage/banks/update/'.$bank_id);
      } else { 
        $data = array(
          'bank_name'             =>  $i->post('bank_name'),
          'bank_account_name'     =>  $i->post('bank_account_name'),
          'bank_account_number'   =>  $i->post('bank_account_number'),
          'bank_img'              =>  $this->upload->data('file_name'),
          'bank_id'               =>  $bank_id,
        );
        $condition_bank = array('bank_id'  => $bank_id);
        $details = $this->M_banks->get_conditions($condition_bank)->row();
        $path = $details->bank_img;
        unlink('assets/images/img_banks/'.$path);
        $this->M_banks->update($data);
        $this->session->set_flashdata('notifikasi', '
          <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
          <strong>Data Berhasil Terhapus!</strong>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('/manage/banks/update/'.$bank_id);
      }      
    }
  }
  function delete($bank_id){
    $condition_bank = array('bank_id'  => $bank_id);
    $details = $this->M_banks->get_conditions($condition_bank)->row();
    $path = $details->bank_img;
    unlink('assets/images/img_banks/'.$path);
    $this->M_banks->delete($bank_id);
    $this->session->set_flashdata('notifikasi', '
    <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
    <strong>Data Berhasil Terhapus!</strong>.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>');
    redirect('/manage/banks/');
  }
}
