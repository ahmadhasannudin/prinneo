<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Blogs extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_blogs');
    $this->load->model('M_blog_tags');
    $this->load->model('M_blog_categorys');
  }
  function index()
  {
    $join_datas = array(
      'table'   =>  'blog_categorys',
      'on'      =>  'blog_categorys.blog_category_id = blogs.blog_category'
    );
    $blogs = $this->M_blogs->get_join_all($join_datas)->result();
    $data  =
    array(
      'title'   =>  'Blogs Management - Quick Corp',
      'isi'     =>  'pages/manage/blogs_v',
      'blogs'   =>  $blogs
    );
    $this->load->view("layouts/manage/wrapper", $data, false);
  }
  function add(){
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->
    set_rules(
      'blog_title',
      'blog_title',
      'required',
      array(
        'required'  =>  'Title blog harus diisi'
      )
    );
    if ($valid->run()===false)
    {
      $blog_categorys = $this->M_blog_categorys->get_all()->result();
      $data =
      array(
        'title'          =>  'Blogs Management Add - Quick Corp',
        'isi'            =>  'pages/manage/blogs_t',
        'blog_categorys' => $blog_categorys
      );
      $this->load->view("layouts/manage/wrapper", $data, false);
    }
    else
    {
      $config['upload_path']          = './assets/images/img_blogs/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 3000;
      $config['encrypt_name']         = TRUE;
      $this->upload->initialize($config);
      if ( ! $this->upload->do_upload('blog_image'))
      {
        $this->session->set_flashdata('notifikasi', '
          <div class="alert alert-danger alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
          <strong>Gagal Upload!</strong>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('/manage/blogs/add');
      }
      else
      {
        $data = array(
          'blog_title'  =>  $i->post('blog_title'),
          'blog_exerpt'  =>  $i->post('blog_exerpt'),
          'blog_description'  =>  $i->post('blog_description'),
          'blog_author'  =>  $i->post('blog_author'),
          'blog_category'  => $i->post('blog_category'),
          'blog_tags'  =>  $i->post('blog_tags'),
          'blog_status'  =>  $i->post('blog_status'),
          'blog_date'  =>  $i->post('blog_date'),
          'blog_image'      =>  $this->upload->data('file_name'),
          'blog_slug'  => url_title($this->input->post('blog_title',TRUE))
        );
        $this->M_blogs->add($data);
        $this->session->set_flashdata('notifikasi', '
          <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
          <strong>Data Berhasil Tersimpan!</strong>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('/manage/blogs');
      }
    }
  }
  function update($blog_id){
    $blog_datas = array(
      'blog_id' =>  $blog_id
    );
    $blog_details = $this->M_blogs->get_conditions($blog_datas)->row();
    $blog_categorys = $this->M_blog_categorys->get_all()->result();
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->
    set_rules(
      'blog_title',
      'blog_title',
      'required',
      array(
        'required'  =>  'Title blog harus diisi'
      )
    );
    if ($valid->run()===false)
    {
      $data =
      array(
        'title'         =>  'Blogs Management Update - Quick Corp',
        'isi'           =>  'pages/manage/blogs_e',
        'blog_details'  =>   $blog_details,
        'blog_categorys'=>   $blog_categorys,
      );
      $this->load->view("layouts/manage/wrapper", $data, false);
    }
    else
    {
     $config['upload_path']          = './assets/images/img_blogs/';
     $config['allowed_types']        = 'gif|jpg|png|jpeg';
     $config['max_size']             = 3000;
     $config['encrypt_name']         = TRUE;
     $this->upload->initialize($config);
     if ( ! $this->upload->do_upload('blog_image'))
     {
      $data = array(
        'blog_title'  =>  $i->post('blog_title'),
        'blog_exerpt'  =>  $i->post('blog_exerpt'),
        'blog_description'  =>  $i->post('blog_description'),
        'blog_author'  =>  $i->post('blog_author'),
        'blog_category'  => $i->post('blog_category'),
        'blog_tags'  =>  $i->post('blog_tags'),
        'blog_status'  =>  $i->post('blog_status'),
        'blog_date'  =>  $i->post('blog_date'),
        'blog_image'      =>  $i->post('blog_image_old'),
        'blog_slug'  => url_title($this->input->post('blog_title',TRUE)),
        'blog_id'  =>  $blog_id,
      );
      $this->M_blogs->update($data);
      $this->session->set_flashdata('notifikasi', '
        <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
        <strong>Data Berhasil Terhapus!</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
      redirect('manage/blogs');
    } else { 
      $data = array(
        'blog_title'  =>  $i->post('blog_title'),
        'blog_exerpt'  =>  $i->post('blog_exerpt'),
        'blog_description'  =>  $i->post('blog_description'),
        'blog_author'  =>  $i->post('blog_author'),
        'blog_category'  => $i->post('blog_category'),
        'blog_tags'  =>  $i->post('blog_tags'),
        'blog_status'  =>  $i->post('blog_status'),
        'blog_date'  =>  $i->post('blog_date'),
        'blog_image'      =>  $this->upload->data('file_name'),
        'blog_slug'  => url_title($this->input->post('blog_title',TRUE)),
        'blog_id'  =>  $blog_id,
      );
      $condition_blog = array('blog_id'  => $blog_id);
      $details = $this->M_blogs->get_conditions($condition_blog)->row();
      $path = $details->blog_image;
      unlink('assets/images/img_blogs/'.$path);
      $this->M_blogs->update($data);
      $this->session->set_flashdata('notifikasi', '
        <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
        <strong>Data Berhasil Terhapus!</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
      redirect('manage/blogs');
    }
  }
}
function delete($blog_id){
  $condition_blog = array('blog_id'  => $blog_id);
  $details = $this->M_blogs->get_conditions($condition_blog)->row();
  $path = $details->blog_image;
  unlink('assets/images/img_blogs/'.$path);
  $this->M_blogs->delete($blog_id);
  $this->session->set_flashdata('notifikasi', '
    <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
    <strong>Data Berhasil Terhapus!</strong>.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>');
  redirect('/manage/blogs');
}
}
