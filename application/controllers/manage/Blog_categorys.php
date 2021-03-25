<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Blog_categorys extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_blog_categorys');
    $this->load->model('M_blogs');
  }
  function index()
  {
    $blog_categorys = $this->M_blog_categorys->get_all()->result();
    $blogs = $this->M_blogs->get_all()->result();
    $data  =
    array(
      'title'            =>  'Blog Categorys Management - Quick Corp',
      'isi'              =>  'pages/manage/blog_categorys_v',
      'blog_categorys'   =>  $blog_categorys,
      'blogs'            =>  $blogs
    );
    $this->load->view("layouts/manage/wrapper", $data, false);
  }
  function add(){
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->
    set_rules(
      'blog_category_name',
      'blog_category_name',
      'required',
      array(
        'required'  =>  'Nama kategori harus diisi'
      )
    );

    if ($valid->run()===false)
    {
      $data =
      array(
        'title'   =>  'Blog Categorys Management Add - Quick Corp',
        'isi'     =>  'pages/manage/blog_categorys_t',
      );
      $this->load->view("layouts/manage/wrapper", $data, false);
    }
    else
    {
      $this->M_blog_categorys->add($i->post());
      $this->session->set_flashdata('success', '<center>Berhasil</center>');
      redirect('/manage/blog_categorys');
    }
  }
function update($blog_category_id){
  $valid = $this->form_validation;
  $i  = $this->input;
  $valid->
  set_rules(
    'blog_category_name',
    'blog_category_name',
    'required',
    array(
      'required'  =>  'Nama kategori harus diisi'
    )
  );
  if ($valid->run()===false)
  {
    $condition_blog_categorys = array(
      'blog_category_id'  => $blog_category_id
    );
    $blog_category_details = $this->M_blog_categorys->get_conditions($condition_blog_categorys)->row();
    $data =
    array(
      'title'   =>  'Blog Categorys Management Update - Quick Corp',
      'isi'     =>  'pages/manage/blog_categorys_e',
      'blog_category_details'  =>  $blog_category_details
    );
    $this->load->view("layouts/manage/wrapper", $data, false);
  }
  else
  {
    $this->M_blog_categorys->update($i->post());
    $this->session->set_flashdata('success', '<center>Berhasil</center>');
    redirect('/manage/blog_categorys/update/'.$blog_category_id);
  }
}
function delete($blog_category_id){
  $this->M_blog_categorys->delete($blog_category_id);
  $this->session->set_flashdata('success', '<center>Berhasil</center>');
  redirect('/manage/blog_categorys/');
}
}
