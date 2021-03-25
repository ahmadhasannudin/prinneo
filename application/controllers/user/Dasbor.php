<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dasbor extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_product_categorys');
    $this->load->model('M_product_sub_categorys');
    $this->load->model('M_contacts');
    $this->load->model('M_faqs');
    $this->load->model('M_orders');
    $this->load->model('M_users');
  }

  function index()  {
    if ($this->session->userdata('email_user') == "" && $this->session->userdata('password_user') == "") {
      redirect(site_url('login'), 'refresh');
    } else {
      $product_categorys     =  $this->M_product_categorys->get_all()->result();
      $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
      $contacts              =  $this->M_contacts->get_all()->row();
      $faqs                  =  $this->M_faqs->get_all()->result();
      $condition_users = array(
        'users.user_id'  => $this->session->userdata('user_id')
      );
      $user_details = $this->M_users->get_conditions($condition_users)->row();
      $data = array(
        'title'                 => 'Dashboard | '.$user_details->user_name,
        'isi'                   => 'pages/user/dasbor_v',
        'user_details'          =>  $user_details,
        'product_categorys'     =>  $product_categorys,
        'product_sub_categorys' =>  $product_sub_categorys,

        'contacts'              =>  $contacts,
      );
      // echo "<pre>";
      // print_r($data);
      // exit();
      $this->load->view("layouts/guest/wrapper", $data, false);
    }
  }
  function edit()  {
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->set_rules(
      'user_name',
      'user_name',
      'required',
      array(
        'required'  =>  'Nama lengkap harus diisi'
      )
    );
    $valid->set_rules(
      'user_email',
      'user_email',
      'required',
      array(
        'required'  =>  'Email harus diisi'
      )
    );
    $valid->set_rules(
      'user_phone',
      'user_phone',
      'required',
      array(
        'required'  =>  'Nomor Hp harus diisi'
      )
    );
    $valid->set_rules(
      'user_gender',
      'user_gender',
      'required',
      array(
        'required'  =>  'Gender harus diisi'
      )
    );
    if ($this->session->userdata('email_user') == "" && $this->session->userdata('password_user') == "") {
      redirect(site_url('login'), 'refresh');
    } else {
      if ($valid->run()===false)
      {
       $product_categorys     =  $this->M_product_categorys->get_all()->result();
       $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
       $contacts              =  $this->M_contacts->get_all()->row();
       $faqs                  =  $this->M_faqs->get_all()->result();
       $condition_users = array( 'users.user_id'  => $this->session->userdata('user_id') );
       $user_details = $this->M_users->get_conditions($condition_users)->row();
       $data = array(
        'title'                 => 'Profil',
        'isi'                   => 'pages/user/profil_e',
        'user_details'          =>  $user_details,
        'product_categorys'     =>  $product_categorys,
        'product_sub_categorys' =>  $product_sub_categorys,

        'contacts'              =>  $contacts,
      );
        // echo "<pre>";
        // print_r($data);
        // exit();
       $this->load->view("layouts/guest/wrapper", $data, false);
     } else {
       $config['upload_path']          = './assets/images/img_users/';
       $config['allowed_types']        = 'gif|jpg|png|jpeg';
       $config['max_size']             = 3000;
       $config['encrypt_name']         = TRUE;
       $this->upload->initialize($config);
       if ( ! $this->upload->do_upload('user_photo')) {
        $data = array(
          'user_name'         =>  $i->post('user_name'),
          'user_email'        =>  $i->post('user_email'),
          'user_phone'        =>  $i->post('user_phone'),
          'user_gender'       =>  $i->post('user_gender'),
          'user_photo'        =>  $i->post('user_photo_old'),
          'user_id'           =>  $this->session->userdata('user_id'),
        );
        $this->M_users->update($data);
        $this->session->set_flashdata('notifikasi', '
          <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
          <strong>Data Berhasil Diubah!</strong>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('profil/edit');
      } else { 
        $data = array(
          'user_name'         =>  $i->post('user_name'),
          'user_email'        =>  $i->post('user_email'),
          'user_phone'        =>  $i->post('user_phone'),
          'user_gender'       =>  $i->post('user_gender'),
          'user_photo'        =>  $this->upload->data('file_name'),
          'user_id'           =>  $this->session->userdata('user_id'),
        );
        $condition_users = array( 'users.user_id'  => $this->session->userdata('user_id') );
        $user_details = $this->M_users->get_conditions($condition_users)->row();
        if ($user_details->user_photo != 'user.jpg') {
          $path = $user_details->user_photo;
          unlink('assets/images/img_users/'.$path);
        }
        $this->M_users->update($data);
        $this->session->set_flashdata('notifikasi', '
          <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
          <strong>Data Berhasil diubah!</strong>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('profil/edit');
      }
    }
  }
}
function new_password()  {
  $valid = $this->form_validation;
  $i  = $this->input;
  $valid->set_rules(
    'user_password',
    'user_password',
    'required|min_length[6]',
    array(
      'required'  =>  'Password harus diisi',
      'min_length' =>  'Password minimal 6 karakter'
    )
  );
  $valid->set_rules(
    'konfirmasi_password',
    'konfirmasi_password',
    'required|matches[user_password]',
    array(
      'required'    =>  'Password konfirmasi harus diisi',
      'matches'     =>  'Password konfirmasi tidak sama'
    )
  );
  if ($valid->run()===false) {
   $product_categorys     =  $this->M_product_categorys->get_all()->result();
   $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
   $contacts              =  $this->M_contacts->get_all()->row();
   $faqs                  =  $this->M_faqs->get_all()->result();
   $condition_users = array( 'users.user_id'  => $this->session->userdata('user_id') );
   $user_details = $this->M_users->get_conditions($condition_users)->row();
   $data = array(
    'title'                 => 'Dashboard',
    'isi'                   => 'pages/user/profil_e',
    'user_details'          =>  $user_details,
    'product_categorys'     =>  $product_categorys,
    'product_sub_categorys' =>  $product_sub_categorys,

    'contacts'              =>  $contacts,
  );
        // echo "<pre>";
        // print_r($data);
        // exit();
   $this->load->view("layouts/guest/wrapper", $data, false);
 } else {
  $data = array(
    'user_password'     =>  md5($i->post('user_password')),
    'user_id'           =>  $this->session->userdata('user_id'),
  );
  $this->M_users->update($data);
  $this->session->set_flashdata('notifikasi', '
    <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
    <strong>Data Berhasil Diubah!</strong>.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>');
  redirect('profil/edit');
} 

}

function history()  {
  if ($this->session->userdata('email_user') == "" && $this->session->userdata('password_user') == "") {
    redirect(site_url('login'), 'refresh');
  } else {
    $product_categorys     =  $this->M_product_categorys->get_all()->result();
    $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
    $contacts              =  $this->M_contacts->get_all()->row();
    $faqs                  =  $this->M_faqs->get_all()->result();
    $condition_users = array(
      'users.user_id'  => $this->session->userdata('user_id')
    );
    $user_details = $this->M_users->get_conditions($condition_users)->row();
    $data = array(
      'title'                 => 'Transaksi | '.$user_details->user_name,
      'isi'                   => 'pages/user/transaksi_v',
      'user_details'          =>  $user_details,
      'product_categorys'     =>  $product_categorys,
      'product_sub_categorys' =>  $product_sub_categorys,

      'contacts'              =>  $contacts,
    );
      // echo "<pre>";
      // print_r($data);
      // exit();
    $this->load->view("layouts/guest/wrapper", $data, false);
  }
}
function saran()  {
  if ($this->session->userdata('email_user') == "" && $this->session->userdata('password_user') == "") {
    redirect(site_url('login'), 'refresh');
  } else {
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->
    set_rules(
      'contact_us_name',
      'contact_us_name',
      'required',
      array(
        'required'  =>  'Nama kategori harus diisi'
      )
    );

    if ($valid->run()===false)
    {
     $product_categorys     =  $this->M_product_categorys->get_all()->result();
     $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
     $contacts              =  $this->M_contacts->get_all()->row();
     $faqs                  =  $this->M_faqs->get_all()->result();
     $condition_users = array(
      'users.user_id'  => $this->session->userdata('user_id')
    );
     $user_details = $this->M_users->get_conditions($condition_users)->row();
     $data = array(
      'title'                 => 'Saran | '.$user_details->user_name,
      'isi'                   => 'pages/user/saran_v',
      'user_details'          =>  $user_details,
      'product_categorys'     =>  $product_categorys,
      'product_sub_categorys' =>  $product_sub_categorys,

      'contacts'              =>  $contacts,
    );
     $this->load->view("layouts/guest/wrapper", $data, false);
   }
   else
   {
    $this->M_contacts->add_saran($i->post());
    $this->session->set_flashdata('notifikasi', '<center>Pengisian saran berhasil dilakukan, Kami akan mengirimkan balasan melalui '.$i->post('contact_us_reply').' anda</center>');
    redirect('/profil/saran');
  }

}
}
function testimoni()  {
  if ($this->session->userdata('email_user') == "" && $this->session->userdata('password_user') == "") {
    redirect(site_url('login'), 'refresh');
  } else {
    $product_categorys     =  $this->M_product_categorys->get_all()->result();
    $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
    $contacts              =  $this->M_contacts->get_all()->row();
    $faqs                  =  $this->M_faqs->get_all()->result();
    $condition_users = array(
      'users.user_id'  => $this->session->userdata('user_id')
    );
    $user_details = $this->M_users->get_conditions($condition_users)->row();
    $data = array(
      'title'                 => 'Testimoni | '.$user_details->user_name,
      'isi'                   => 'pages/user/testimoni_v',
      'user_details'          =>  $user_details,
      'product_categorys'     =>  $product_categorys,
      'product_sub_categorys' =>  $product_sub_categorys,

      'contacts'              =>  $contacts,
    );
      // echo "<pre>";
      // print_r($data);
      // exit();
    $this->load->view("layouts/guest/wrapper", $data, false);
  }
}



}
