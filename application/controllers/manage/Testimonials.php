<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Testimonials extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_testimonials');
  }
  function index()
  {
    $testimonials = $this->M_testimonials->get_all()->result();
    $data  =
    array(
      'title'   =>  'Testimonials Management - Quick Corp',
      'isi'     =>  'pages/manage/testimonials_v',
      'testimonials'   =>  $testimonials
    );
    $this->load->view("layouts/manage/wrapper", $data, false);
  }
  function add(){
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->
    set_rules(
      'testimonial_name',
      'testimonial_name',
      'required',
      array(
        'required'  =>  'Pertanyaan harus diisi'
      )
    );
    $valid->
    set_rules(
      'testimonial_description',
      'testimonial_description',
      'required',
      array(
        'required'  =>  'Jawaban harus diisi'
      )
    );
    if ($valid->run()===false)
    {
      $data =
      array(
        'title'   =>  'Testimonials Management Add - Quick Corp',
        'isi'     =>  'pages/manage/testimonials_t',
      );
      $this->load->view("layouts/manage/wrapper", $data, false);
    }
    else
    {

      $config['upload_path']          = './assets/images/img_testimonials/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 3000;
      $config['encrypt_name']         = TRUE;
      $this->upload->initialize($config);
      if ( ! $this->upload->do_upload('testimonial_images'))
      {
        $this->session->set_flashdata('notifikasi', '
          <div class="alert alert-danger alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
          <strong>Gagal Upload!</strong>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('/manage/testimonials/add');
      }
      else
      {
        $data = array(
          'testimonial_name'       =>  $i->post('testimonial_name'),
          'testimonial_image'       =>  $this->upload->data('file_name'),
          'testimonial_description'  =>  $i->post('testimonial_description')
        );
        $this->M_testimonials->add($data);
        $this->session->set_flashdata('notifikasi', '
          <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
          <strong>Data Berhasil Tersimpan!</strong>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('/manage/testimonials');
      }
    }
  }
  function update($testimonial_id){
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->
    set_rules(
      'testimonial_name',
      'testimonial_name',
      'required',
      array(
        'required'  =>  'Pertanyaan harus diisi'
      )
    );
    $valid->
    set_rules(
      'testimonial_description',
      'testimonial_description',
      'required',
      array(
        'required'  =>  'Jawaban harus diisi'
      )
    );
    if ($valid->run()===false)
    {
      $condition_testimonials = array(
        'testimonial_id'  => $testimonial_id
      );
      $testimonial_details = $this->M_testimonials->get_conditions($condition_testimonials)->row();
      $data =
      array(
        'title'   =>  'Testimonials Management Update - Quick Corp',
        'isi'     =>  'pages/manage/testimonials_e',
        'testimonial_details'  =>  $testimonial_details
      );
      $this->load->view("layouts/manage/wrapper", $data, false);
    }
    else
    {

      $config['upload_path']          = './assets/images/img_testimonials/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 3000;
      $config['encrypt_name']         = TRUE;
      $this->upload->initialize($config);
      if ( ! $this->upload->do_upload('testimonial_images'))
      {
        $data = array(
          'testimonial_name'       =>  $i->post('testimonial_name'),
          'testimonial_image'       =>  $i->post('testimonial_image_old'),
          'testimonial_description'  =>  $i->post('testimonial_description'),
          'testimonial_id'          =>  $testimonial_id
        );
      }
      else
      {
        $data = array(
          'testimonial_name'       =>  $i->post('testimonial_name'),
          'testimonial_image'       =>  $this->upload->data('file_name'),
          'testimonial_description'  =>  $i->post('testimonial_description'),
          'testimonial_id'          =>  $testimonial_id
        );
        $condition_testimonials = array('testimonial_id'  => $testimonial_id);
        $details = $this->M_testimonials->get_conditions($condition_testimonials)->row();
        $path = $details->testimonial_image;
        unlink('assets/images/img_testimonials/'.$path);
      }
      $this->M_testimonials->update($data);
      $this->session->set_flashdata('notifikasi', '
        <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
        <strong>Data Berhasil Di update!</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
      redirect('/manage/testimonials/update/'.$testimonial_id);
    }
  }
  function delete($testimonial_id){
    $condition_testimonials = array('testimonial_id'  => $testimonial_id);
    $details = $this->M_testimonials->get_conditions($condition_testimonials)->row();
    $path = $details->testimonial_image;
    unlink('assets/images/img_testimonials/'.$path);
    $this->M_testimonials->delete($testimonial_id);
    $this->session->set_flashdata('success', '<center>Berhasil</center>');
    redirect('/manage/testimonials/');
  }
}
