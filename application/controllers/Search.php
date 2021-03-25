<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_product_categorys');
    $this->load->model('M_product_sub_categorys');
    $this->load->model('M_products');
    $this->load->model('M_blog_categorys');
    $this->load->model('M_blogs');
    $this->load->model('M_contacts');
    $this->load->library('pagination');
  }

  function products()
  {
    $keyword = $this->input->get('keyword',TRUE);
    $product_categorys     =  $this->M_product_categorys->get_all()->result();
    $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
    $products              =  $this->M_products->get_all()->result();
    $contacts              =  $this->M_contacts->get_all()->row();
    $data  =
    array(
      'title'                 =>  'Pencarian : '.$keyword,
      'banner'                =>  'Hasil Pencarian Produk : "'.$keyword.'"',
      'isi'                   =>  'pages/guest/v_search_products',
      'product_categorys'     =>  $product_categorys,
      'product_sub_categorys' =>  $product_sub_categorys,
      'contacts'              =>  $contacts,
    );
        $jumlah_data = $this->M_products->search_data($keyword);
        $config['base_url'] = base_url('search/products'); //site url
        $config['total_rows'] = $jumlah_data; //total row
        $config['per_page'] = 20;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

         // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="col-md-12 justify-content-center"><nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['data'] = $this->M_products->get_search_list($keyword,$config["per_page"], $data['page']);           

        $data['pagination'] = $this->pagination->create_links();
        // echo "<pre>";
        // print_r($data);
        // exit();

        $this->load->view("layouts/guest/wrapper", $data, false);
  }
  function blogs()
  {
    $keyword               = $this->input->get('keyword',TRUE);
    $product_categorys     =  $this->M_product_categorys->get_all()->result();
    $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
    $products              =  $this->M_products->get_all()->result();
    $contacts              =  $this->M_contacts->get_all()->row();
    $blog_categorys        =  $this->M_blog_categorys->get_all()->result();
    $data  =
    array(
       'title'                =>  'Pencarian : '.$keyword,
      'banner'                =>  'Hasil Pencarian Artikel : "'.$keyword.'"',
      'isi'                   =>  'pages/guest/v_search_blogs',
      'product_categorys'     =>  $product_categorys,
      'product_sub_categorys' =>  $product_sub_categorys,
      'blog_categorys'        =>  $blog_categorys,
      'contacts'              =>  $contacts,
    );
        $jumlah_data = $this->M_blogs->search_data($keyword);
        $config['base_url'] = base_url('search/blogs'); //site url
        $config['total_rows'] = $jumlah_data; //total row
        $config['per_page'] = 20;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

         // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="col-md-12 justify-content-center"><nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['data'] = $this->M_blogs->get_search_list($keyword,$config["per_page"], $data['page']);           

        $data['pagination'] = $this->pagination->create_links();
        // echo "<pre>";
        // print_r($data);
        // exit();

        $this->load->view("layouts/guest/wrapper", $data, false);
  }
  
    }
