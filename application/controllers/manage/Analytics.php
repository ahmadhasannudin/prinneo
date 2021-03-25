<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Analytics extends CI_Controller{
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
      'fb_script',
      'fb_script',
      'required',
      array(
        'required'  =>  'Facebook Pixel harus diisi'
      )
    );
    $valid->
    set_rules(
      'google_script',
      'google_script',
      'required',
      array(
        'required'  =>  'Google Analytic harus diisi'
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
        'title'   =>  'Analytic Management Update - Quick Corp',
        'isi'     =>  'pages/manage/analytics_e',
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
      redirect('/manage/analytics/');
    }
  }
  
  
}
