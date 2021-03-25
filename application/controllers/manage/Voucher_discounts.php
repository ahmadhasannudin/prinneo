<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Voucher_discounts extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_voucher_discounts');
  }
  function index()
  {
    $voucher_discounts = $this->M_voucher_discounts->get_all()->result();
    $data  =
    array(
      'title'   =>  'Voucher Discounts Management - Quick Corp',
      'isi'     =>  'pages/manage/voucher_discounts_v',
      'voucher_discounts'   =>  $voucher_discounts
    );
    $this->load->view("layouts/manage/wrapper", $data, false);
  }
  function add(){
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->
    set_rules(
      'voucher_discount_name',
      'voucher_discount_name',
      'required',
      array(
        'required'  =>  'Nama voucher diskon harus diisi'
      )
    );
    $valid->
    set_rules(
      'voucher_discount_code',
      'voucher_discount_code',
      'required',
      array(
        'required'  =>  'Kode voucher diskon harus diisi'
      )
    );
    $valid->
    set_rules(
      'voucher_discount_quota',
      'voucher_discount_quota',
      'required',
      array(
        'required'  =>  'Kuota voucher diskon harus diisi'
      )
    );
    $valid->
    set_rules(
      'voucher_discount_value',
      'voucher_discount_value',
      'required',
      array(
        'required'  =>  'Value voucher diskon harus diisi'
      )
    );
    $valid->
    set_rules(
      'voucher_discount_type',
      'voucher_discount_type',
      'required',
      array(
        'required'  =>  'Type voucher diskon harus diisi'
      )
    );
    if ($valid->run()===false)
    {
      $data =
      array(
        'title'   =>  'Voucher Discounts Management Add - Quick Corp',
        'isi'     =>  'pages/manage/voucher_discounts_t',
      );
      $this->load->view("layouts/manage/wrapper", $data, false);
    }
    else
    {
      $this->M_voucher_discounts->add($i->post());
      $this->session->set_flashdata('success', '<center>Berhasil</center>');
      redirect('/manage/voucher_discounts');
    }
  }
function update($voucher_discount_id){
  $valid = $this->form_validation;
  $i  = $this->input;
  $valid->
  set_rules(
    'voucher_discount_name',
    'voucher_discount_name',
    'required',
    array(
      'required'  =>  'Nama voucher_discount harus diisi'
    )
  );
  $valid->
  set_rules(
    'voucher_discount_code',
    'voucher_discount_code',
    'required',
    array(
      'required'  =>  'No. rekening voucher_discount harus diisi'
    )
  );
  $valid->
  set_rules(
    'voucher_discount_quota',
    'voucher_discount_quota',
    'required',
    array(
      'required'  =>  'Nama pemilik rekening voucher_discount harus diisi'
    )
  );
  $valid->
  set_rules(
    'voucher_discount_value',
    'voucher_discount_value',
    'required',
    array(
      'required'  =>  'Value voucher diskon harus diisi'
    )
  );
  $valid->
  set_rules(
    'voucher_discount_type',
    'voucher_discount_type',
    'required',
    array(
      'required'  =>  'Type voucher diskon harus diisi'
    )
  );
  if ($valid->run()===false)
  {
    $condition_voucher_discounts = array(
      'voucher_discount_id'  => $voucher_discount_id
    );
    $voucher_discount_details = $this->M_voucher_discounts->get_conditions($condition_voucher_discounts)->row();
    $data =
    array(
      'title'   =>  'Voucher Discounts Management Update - Quick Corp',
      'isi'     =>  'pages/manage/voucher_discounts_e',
      'voucher_discount_details'  =>  $voucher_discount_details
    );
    $this->load->view("layouts/manage/wrapper", $data, false);
  }
  else
  {
    $this->M_voucher_discounts->update($i->post());
    $this->session->set_flashdata('success', '<center>Berhasil</center>');
    redirect('/manage/voucher_discounts/update/'.$voucher_discount_id);
  }
}
function delete($voucher_discount_id){
  $this->M_voucher_discounts->delete($voucher_discount_id);
  $this->session->set_flashdata('success', '<center>Berhasil</center>');
  redirect('/manage/voucher_discounts/');
}
}
