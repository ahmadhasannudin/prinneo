<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tools extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_tools');
  }
  function fbpixel(){
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->
    set_rules(
      'tool_script',
      'tool_script',
      'required',
      array(
        'required'  =>  'Script harus diisi'
      )
    );
    if ($valid->run()===false)
    {
      $condition_tools = array(
        'tool_id'  => '2'
      );
      $tool_details = $this->M_tools->get_conditions($condition_tools)->row();
      $data =
      array(
        'title'   =>  'Facebook Pixels Management Update - Quick Corp',
        'isi'     =>  'pages/manage/tools_e',
        'tool_details'  =>  $tool_details
      );
      $this->load->view("layouts/manage/wrapper", $data, false);
    }
    else
    {
      $this->M_tools->update($i->post());
      $this->session->set_flashdata('success', '<center>Berhasil</center>');
      redirect('/manage/tools/fbpixel');
    }
  }
  function googleanalytics(){
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->
    set_rules(
      'tool_script',
      'tool_script',
      'required',
      array(
        'required'  =>  'Script harus diisi'
      )
    );
    if ($valid->run()===false)
    {
      $condition_tools = array(
        'tool_id'  => '1'
      );
      $tool_details = $this->M_tools->get_conditions($condition_tools)->row();
      $data =
      array(
        'title'   =>  'Googel Analytics Management Update - Quick Corp',
        'isi'     =>  'pages/manage/tools_e',
        'tool_details'  =>  $tool_details
      );
      $this->load->view("layouts/manage/wrapper", $data, false);
    }
    else
    {
      $this->M_tools->update($i->post());
      $this->session->set_flashdata('success', '<center>Berhasil</center>');
      redirect('/manage/tools/googleanalytics');
    }
  }
}
