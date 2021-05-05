<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blogs extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_product_categorys');
    $this->load->model('M_product_sub_categorys');
    $this->load->model('M_contacts');

    $this->load->model('M_blogs');
    $this->load->model('M_blog_categorys');
  }

  function index()
  {
    $product_categorys     =  $this->M_product_categorys->get_all()->result();
    $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
    $blog_list             =  $this->M_blogs->get_blogs()->result();
    $blog_categorys        =  $this->M_blog_categorys->get_all()->result();
    $contacts              =  $this->M_contacts->get_all()->row();
    $data  =
      array(
        'title'                 =>  'Blogs | Prinneo',
        'isi'                   =>  'pages/guest/v_blogs',
        'product_categorys'     =>  $product_categorys,
        'product_sub_categorys' =>  $product_sub_categorys,
        'blog_list'             =>  $blog_list,
        'blog_categorys'        =>  $blog_categorys,
        'contacts'              =>  $contacts,
      );
    $this->load->view("layouts/guest/wrapper", $data, false);
  }
  function categorys($blog_category_slug)
  {
    $product_categorys     =  $this->M_product_categorys->get_all()->result();
    $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
    $blog_list             =  $this->M_blogs->get_blog_category($blog_category_slug)->result();
    $blog_categorys        =  $this->M_blog_categorys->get_all()->result();
    $contacts              =  $this->M_contacts->get_all()->row();
    $data  =
      array(
        'title'                 =>  'Blogs | Prinneo',
        'isi'                   =>  'pages/guest/v_blogs',
        'product_categorys'     =>  $product_categorys,
        'product_sub_categorys' =>  $product_sub_categorys,
        'blog_list'             =>  $blog_list,
        'blog_categorys'        =>  $blog_categorys,
        'contacts'              =>  $contacts,
      );
    $this->load->view("layouts/guest/wrapper", $data, false);
  }
  public function detail($blog_slug)
  {
    $product_categorys     =  $this->M_product_categorys->get_all()->result();
    $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
    $blog_detail           =  $this->M_blogs->get_details($blog_slug)->row();
    $blog_next             =  $this->M_blogs->get_next($blog_detail->blog_id)->row();
    $blog_prev             =  $this->M_blogs->get_prev($blog_detail->blog_id)->row();
    $contacts              =  $this->M_contacts->get_all()->row();
    $data  =
      array(
        'title'                 =>  $blog_detail->blog_title,
        'isi'                   =>  'pages/guest/v_blog_details',
        'product_categorys'     =>  $product_categorys,
        'product_sub_categorys' =>  $product_sub_categorys,
        'blog_next'             =>  $blog_next,
        'blog_prev'             =>  $blog_prev,
        'blog_detail'           =>  $blog_detail,
        'contacts'              =>  $contacts,
      );

    $this->load->view("layouts/guest/wrapper", $data, false);
  }
}
