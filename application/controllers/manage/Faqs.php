<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Faqs extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_faqs');
  }
  function index()
  {
    $faqs = $this->M_faqs->get_all()->result();
    $data  =
    array(
      'title'   =>  'FAQs Management - Quick Corp',
      'isi'     =>  'pages/manage/faqs_v',
      'faqs'   =>  $faqs
    );
    $this->load->view("layouts/manage/wrapper", $data, false);
  }
  function add(){
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->
    set_rules(
      'faq_question',
      'faq_question',
      'required',
      array(
        'required'  =>  'Pertanyaan harus diisi'
      )
    );
    $valid->
    set_rules(
      'faq_answer',
      'faq_answer',
      'required',
      array(
        'required'  =>  'Jawaban harus diisi'
      )
    );
    if ($valid->run()===false)
    {
      $data =
      array(
        'title'   =>  'FAQs Management Add - Quick Corp',
        'isi'     =>  'pages/manage/faqs_t',
      );
      $this->load->view("layouts/manage/wrapper", $data, false);
    }
    else
    {
      $this->M_faqs->add($i->post());
      $this->session->set_flashdata('success', '<center>Berhasil</center>');
      redirect('/manage/faqs');
    }
  }
function update($faq_id){
  $valid = $this->form_validation;
  $i  = $this->input;
  $valid->
  set_rules(
    'faq_question',
    'faq_question',
    'required',
    array(
      'required'  =>  'Pertanyaan harus diisi'
    )
  );
  $valid->
  set_rules(
    'faq_answer',
    'faq_answer',
    'required',
    array(
      'required'  =>  'Jawaban harus diisi'
    )
  );
  if ($valid->run()===false)
  {
    $condition_faqs = array(
      'faq_id'  => $faq_id
    );
    $faq_details = $this->M_faqs->get_conditions($condition_faqs)->row();
    $data =
    array(
      'title'   =>  'FAQs Management Update - Quick Corp',
      'isi'     =>  'pages/manage/faqs_e',
      'faq_details'  =>  $faq_details
    );
    $this->load->view("layouts/manage/wrapper", $data, false);
  }
  else
  {
    $this->M_faqs->update($i->post());
    $this->session->set_flashdata('success', '<center>Berhasil</center>');
    redirect('/manage/faqs/update/'.$faq_id);
  }
}
function delete($faq_id){
  $this->M_faqs->delete($faq_id);
  $this->session->set_flashdata('success', '<center>Berhasil</center>');
  redirect('/manage/faqs/');
}
}
