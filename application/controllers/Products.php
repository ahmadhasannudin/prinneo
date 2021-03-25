<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_product_categorys');
    $this->load->model('M_product_sub_categorys');
    $this->load->model('M_products');
    $this->load->model('M_contacts');
    $this->load->library('pagination');
  }

  function index()
  {

    $product_categorys     =  $this->M_product_categorys->get_all()->result();
    $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
    $products              =  $this->M_products->get_all()->result();
    $contacts              =  $this->M_contacts->get_all()->row();
    $data  =
    array(
      'title'                 =>  'List Product',
      'banner'                =>  'Pilihan Product',
      'img_banner'            =>  'banner.jpg',
      'isi'                   =>  'pages/guest/v_products',
      'product_categorys'     =>  $product_categorys,
      'product_sub_categorys' =>  $product_sub_categorys,
      'contacts'              =>  $contacts,
    );
        $jumlah_data = $this->M_products->jumlah_data();
        $config['base_url'] = base_url('products/index'); //site url
        $config['total_rows'] = $jumlah_data; //total row
        $config['per_page'] = 9;  //show record per halaman
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
        $data['data'] = $this->M_products->get_product_list($config["per_page"], $data['page']);           

        $data['pagination'] = $this->pagination->create_links();
        // echo "<pre>";
        // print_r($data);
        // exit();

        $this->load->view("layouts/guest/wrapper", $data, false);
      }
      function sub_category($product_sub_category_slug)
      {
        $product_datas  = array(
          'product_sub_categorys.product_sub_category_slug' =>  $product_sub_category_slug
        );
        $product_categorys     =  $this->M_product_categorys->get_all()->result();
        $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
        $products              =  $this->M_products->get_all()->result();
        $contacts              =  $this->M_contacts->get_all()->row();
        $product_sub_details   =  $this->M_product_sub_categorys->get_conditions($product_datas)->row();
        $data  =
        array(
          'title'                 =>  $product_sub_details->product_sub_category_name,
          'banner'                =>  $product_sub_details->product_sub_category_name,
          'img_banner'            =>  $product_sub_details->product_sub_category_image,
          'isi'                   =>  'pages/guest/v_products',
          'product_categorys'     =>  $product_categorys,
          'product_sub_categorys' =>  $product_sub_categorys,
          'contacts'              =>  $contacts,
          'product_category_id'   =>  $product_sub_details->product_category_id
        );
        
        $jumlah_data = $this->M_products->sub_category_data($product_sub_details->product_sub_category_id);
        $config['base_url'] = base_url('products/sub_category/'.$product_sub_category_slug); //site url
        $config['total_rows'] = $jumlah_data; //total row
        $config['per_page'] = 9;  //show record per halaman
        $config["uri_segment"] = 4;  // uri parameter
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
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['data'] = $this->M_products->get_sub_category_list($product_sub_details->product_sub_category_id,$config["per_page"], $data['page']);           

        $data['pagination'] = $this->pagination->create_links();
        // echo "<pre>";
        // print_r($data);
        // exit();

        $this->load->view("layouts/guest/wrapper", $data, false);
      } 
      function category($product_category_slug)
      {
        $product_datas  = array(
          'product_categorys.product_category_slug' =>  $product_category_slug
        );
        $product_categorys     =  $this->M_product_categorys->get_all()->result();
        $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
        $products              =  $this->M_products->get_all()->result();
        $contacts              =  $this->M_contacts->get_all()->row();
        $product_sub_details   =  $this->M_product_sub_categorys->get_conditions($product_datas)->row();
        $data  =
        array(
          'title'                 =>  $product_sub_details->product_category_name,
          'banner'                =>  $product_sub_details->product_category_name,
          'img_banner'            =>  $product_sub_details->product_sub_category_image,
          'isi'                   =>  'pages/guest/v_products',
          'product_categorys'     =>  $product_categorys,
          'product_sub_categorys' =>  $product_sub_categorys,
          'contacts'              =>  $contacts,
          'product_category_id'   =>  $product_sub_details->product_category_id
        );
        $jumlah_data = $this->M_products->category_data($product_sub_details->product_category_id);
        $config['base_url'] = base_url('products/category/'.$product_category_slug); //site url
        $config['total_rows'] = $jumlah_data; //total row
        $config['per_page'] = 9;  //show record per halaman
        $config["uri_segment"] = 4;  // uri parameter
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
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['data'] = $this->M_products->get_category_list($product_sub_details->product_category_id,$config["per_page"], $data['page']);           

        $data['pagination'] = $this->pagination->create_links();
        // echo "<pre>";
        // print_r($data);
        // exit();

        $this->load->view("layouts/guest/wrapper", $data, false);
      }

      function detail($product_slug)
      {
        $product_datas  = array(
          'product_slug' =>  $product_slug,
          'product_status !=' =>  '0'
        );
        $product_details       =  $this->M_products->get_conditions($product_datas)->row();
        $product_categorys     =  $this->M_product_categorys->get_all()->result();
        $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
        $product_sub_category_datas = array(
          'product_sub_category_id' =>  $product_details->product_sub_category_id
        );
        $product_sub_category_join = array(
          'table' =>  'product_categorys',
          'on'    =>  'product_sub_categorys.product_category_id = product_categorys.product_category_id'
        );
        $product_sub_category_details = $this->M_product_sub_categorys->get_join_all($product_sub_category_datas, $product_sub_category_join)->row();
        $contacts              =  $this->M_contacts->get_all()->row();
        $data  =
        array(
          'title'                        =>  $product_details->product_name,
          'isi'                          =>  'pages/guest/v_product_details',
          'product_categorys'            =>  $product_categorys,
          'product_sub_categorys'        =>  $product_sub_categorys,
          'product_sub_category_details' =>  $product_sub_category_details,
          'contacts'                     =>  $contacts,
          'product_details'              =>  $product_details
        );
        $this->load->view("layouts/guest/wrapper", $data, false);
      }
      function get_city($province){   
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://pro.rajaongkir.com/api/city?province=$province",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: 8c8b054430c2296afa1acdd3d874d69f"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
        //echo $response;
          $data = json_decode($response, true);
        //echo json_encode($k['rajaongkir']['results']);

          for ($j=0; $j < count($data['rajaongkir']['results']); $j++){

            echo "<option value='".$data['rajaongkir']['results'][$j]['city_id']."' kot='".$data['rajaongkir']['results'][$j]['city_name']."'>".$data['rajaongkir']['results'][$j]['city_name']."</option>";


          }

        }
      }
      function ongkir()
      {
        $origin = $this->input->get('origin');
        $originType = $this->input->get('originType');
        $destination = $this->input->get('destination');
        $destinationType = $this->input->get('destinationType');
        $berat = $this->input->get('berat');
        $courier = $this->input->get('courier');
        $harga = $this->input->get('harga');

        $data = array(
          'origin' => $origin,
          'originType' => $originType,
          'destination' => $destination,
          'destinationType' => $destinationType,
          'berat' => $berat,
          'courier' => $courier,
          'harga' => $harga,
        );
        $this->load->view('api/rj_get_cost', $data);
      }
      function checkout_ongkir()
      {
        $origin = $this->input->get('origin');
        $originType = $this->input->get('originType');
        $destination = $this->input->get('destination');
        $destinationType = $this->input->get('destinationType');
        $berat = $this->input->get('berat');
        $courier = $this->input->get('courier');
        $harga = $this->input->get('harga');

        $data = array(
          'origin' => $origin,
          'originType' => $originType,
          'destination' => $destination,
          'destinationType' => $destinationType,
          'berat' => $berat,
          'courier' => $courier,
          'harga' => $harga,
        );
        $this->load->view('api/rj_get_service', $data);
      }

    }
