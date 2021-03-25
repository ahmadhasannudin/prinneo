<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Voucher_cashbacks extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_voucher_cashbacks');
  }
  function index()
  {
    $voucher_cashbacks = $this->M_voucher_cashbacks->get_all()->result();
    $data  =
    array(
      'title'   =>  'Voucher Cashbacks Management - Quick Corp',
      'isi'     =>  'pages/manage/voucher_cashbacks_v',
      'voucher_cashbacks'   =>  $voucher_cashbacks
    );
    $this->load->view("layouts/manage/wrapper", $data, false);
  }
  function add(){
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->
    set_rules(
      'voucher_cashback_name',
      'voucher_cashback_name',
      'required',
      array(
        'required'  =>  'Nama voucher diskon harus diisi'
      )
    );
    $valid->
    set_rules(
      'voucher_cashback_code',
      'voucher_cashback_code',
      'required',
      array(
        'required'  =>  'Kode voucher diskon harus diisi'
      )
    );
    $valid->
    set_rules(
      'voucher_cashback_quota',
      'voucher_cashback_quota',
      'required',
      array(
        'required'  =>  'Kuota voucher diskon harus diisi'
      )
    );
    $valid->
    set_rules(
      'voucher_cashback_value',
      'voucher_cashback_value',
      'required',
      array(
        'required'  =>  'Value voucher diskon harus diisi'
      )
    );
    $valid->
    set_rules(
      'voucher_cashback_type',
      'voucher_cashback_type',
      'required',
      array(
        'required'  =>  'Type voucher diskon harus diisi'
      )
    );
    if ($valid->run()===false)
    {
      $data =
      array(
        'title'   =>  'Voucher Cashbacks Management Add - Quick Corp',
        'isi'     =>  'pages/manage/voucher_cashbacks_t',
      );
      $this->load->view("layouts/manage/wrapper", $data, false);
    }
    else
    {
      $this->M_voucher_cashbacks->add($i->post());
      $this->session->set_flashdata('success', '<center>Berhasil</center>');
      redirect('/manage/voucher_cashbacks');
    }
  }
function update($voucher_cashback_id){
  $valid = $this->form_validation;
  $i  = $this->input;
  $valid->
  set_rules(
    'voucher_cashback_name',
    'voucher_cashback_name',
    'required',
    array(
      'required'  =>  'Nama voucher_cashback harus diisi'
    )
  );
  $valid->
  set_rules(
    'voucher_cashback_code',
    'voucher_cashback_code',
    'required',
    array(
      'required'  =>  'No. rekening voucher_cashback harus diisi'
    )
  );
  $valid->
  set_rules(
    'voucher_cashback_quota',
    'voucher_cashback_quota',
    'required',
    array(
      'required'  =>  'Nama pemilik rekening voucher_cashback harus diisi'
    )
  );
  $valid->
  set_rules(
    'voucher_cashback_value',
    'voucher_cashback_value',
    'required',
    array(
      'required'  =>  'Value voucher diskon harus diisi'
    )
  );
  $valid->
  set_rules(
    'voucher_cashback_type',
    'voucher_cashback_type',
    'required',
    array(
      'required'  =>  'Type voucher diskon harus diisi'
    )
  );
  if ($valid->run()===false)
  {
    $condition_voucher_cashbacks = array(
      'voucher_cashback_id'  => $voucher_cashback_id
    );
    $voucher_cashback_details = $this->M_voucher_cashbacks->get_conditions($condition_voucher_cashbacks)->row();
    $data =
    array(
      'title'   =>  'Voucher Cashbacks Management Update - Quick Corp',
      'isi'     =>  'pages/manage/voucher_cashbacks_e',
      'voucher_cashback_details'  =>  $voucher_cashback_details
    );
    $this->load->view("layouts/manage/wrapper", $data, false);
  }
  else
  {
    $this->M_voucher_cashbacks->update($i->post());
    $this->session->set_flashdata('success', '<center>Berhasil</center>');
    redirect('/manage/voucher_cashbacks/update/'.$voucher_cashback_id);
  }
}
function delete($voucher_cashback_id){
  $this->M_voucher_cashbacks->delete($voucher_cashback_id);
  $this->session->set_flashdata('success', '<center>Berhasil</center>');
  redirect('/manage/voucher_cashbacks/');
}
}
