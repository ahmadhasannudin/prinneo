<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_product_categorys');
    $this->load->model('M_product_sub_categorys');
    $this->load->model('M_contacts');
    $this->load->model('M_users');
  }

  function index()
  {

    $product_categorys     =  $this->M_product_categorys->get_all()->result();
    $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
    $contacts              =  $this->M_contacts->get_all()->row();
    $data  =
    array(
      'title'                 =>  'Daftar',
      'isi'                   =>  'pages/guest/v_regis',
      'product_categorys'     =>  $product_categorys,
      'product_sub_categorys' =>  $product_sub_categorys,

      'contacts'              =>  $contacts,
    );
    $this->load->view("layouts/guest/wrapper", $data, false);
  }
  function baru(){
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->set_rules(
      'user_name',
      'user_name',
      'required',
      array(
        'required'  =>  'Nama harus diisi'
      )
    );
    $valid->set_rules(
      'user_email',
      'user_email',
      'required|is_unique[users.user_email]',
      array(
        'required'  =>  'Email harus diisi',
        'is_unique'  =>  'Username sudah dipakai'
      )
    );
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
      'confirm_password',
      'confirm_password',
      'required|matches[user_password]',
      array(
        'required'                =>  'Password konfirmasi harus diisi',
        'matches'     =>  'Password konfirmasi tidak sama'
      )
    );
    $valid->set_rules(
      'user_phone',
      'user_phone',
      'required',
      array(
        'required'  =>  'No. Handphone harus diisi'
      )
    );

    if ($valid->run()===false)
    {
      $product_categorys     =  $this->M_product_categorys->get_all()->result();
      $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
      $contacts              =  $this->M_contacts->get_all()->row();
      $data  =
      array(
        'title'                 =>  'Daftar',
        'isi'                   =>  'pages/guest/v_regis',
        'product_categorys'     =>  $product_categorys,
        'product_sub_categorys' =>  $product_sub_categorys,
        'contacts'              =>  $contacts,
      );
      $this->load->view("layouts/guest/wrapper", $data, false);
    }
    else
    {
      $data = array(
        'user_name'      =>  $i->post('user_name'),
        'user_email'      =>  $i->post('user_email'),
        'user_password'      =>  md5($i->post('user_password')),
        'user_phone'      =>  $i->post('user_phone'),
        'user_gender'      =>  '-',
        'address_id'      =>  '0',
        'user_role'      =>  '5',
        'user_photo'      =>  'user.jpg',
      );
      $this->send_konfirmasi($data['user_email'],$data['user_name']);
      // echo $data['user_email'].$data['user_name'];
      // exit();
      $this->M_users->add_user($data);
      // $this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;z-index:999">
      //   <strong>Pendaftaran akun berhasil!</strong>, Kami akan mengirimkan balasan melalui email '.$i->post('user_email').' anda
      //   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      //   <span aria-hidden="true">&times;</span>
      //   </button>
      //   </div>');
      redirect('/home');
    }
  }
  function forgot(){
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->set_rules(
      'user_email',
      'user_email',
      'required|callback_email_check',
      array(
        'required'  =>  'Email harus diisi'
      )
    );

    if ($valid->run()===false)
    {
      $product_categorys     =  $this->M_product_categorys->get_all()->result();
      $product_sub_categorys =  $this->M_product_sub_categorys->get_all()->result();
      $contacts              =  $this->M_contacts->get_all()->row();
      $data  =
      array(
        'title'                 =>  'Daftar',
        'isi'                   =>  'pages/guest/v_forgot_pass',
        'product_categorys'     =>  $product_categorys,
        'product_sub_categorys' =>  $product_sub_categorys,
        'contacts'              =>  $contacts,
      );
      $this->load->view("layouts/guest/wrapper", $data, false);
    }
    else
    {
      $data = array(
        'user_email'      =>  $i->post('user_email'),
      );
      $this->M_users->add_forgot($data);
      $this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;z-index:999">
        <strong>Pendaftaran akun berhasil!</strong>, Kami akan mengirimkan balasan melalui email '.$i->post('user_email').' anda
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div><center>');
      redirect('/home');
    }
  }
  public function email_check($email)
  {
    $str = $this->M_users->email_check($email);
    if (!isset($str))
    {
      $this->form_validation->set_message('email_check', 'Email Anda Belum Terdaftar');
      return FALSE;
    }
    else
    {
      return TRUE;
    }
  }
  public function send_konfirmasi($email,$nama_lengkap)
  { 
    $data['email'] = $email;
    $data['nama_lengkap'] = $nama_lengkap;
    // echo "<pre>";
    // print_r($data);
    // $this->load->view('email/email_register_', $data);
    // exit();
    $subject  = "Pendaftaran Akun Prinneo";
    $message  = $this->load->view('email/email_registrasi',$data,true);
    $config   = array(
      'protocol'    => 'smtp',
      'smtp_host'   => 'ssl://mail.prinneo.com',
      'smtp_port'   => '465',
      'smtp_user'   => 'info@prinneo.com',
      'smtp_pass'   => '@Prinneo123',
      'mailtype'    => 'html',
      'charset'     => 'utf-8',
      'wordwrap'    => TRUE
    );
    $this->load->library('email');
    $this->email->initialize($config); 
    $this->email->set_newline("\r\n");
    $this->email->from('info@prinneo.com','Customer Service Prinneo');
    $this->email->to($data['email']);
    $this->email->subject($subject);
    $this->email->message($message);
    if($this->email->send()){
      $this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;z-index:999">
        <strong>Pendaftaran akun berhasil!</strong>, Kami akan mengirimkan balasan melalui email '.$data['email'].' anda
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
    } else {
      # code...
      $this->session->set_flashdata('notifikasi', '<div class="alert alert-danger alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;z-index:999">
       Pengiriman Email Gagal!!
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
       </button>
       </div>');
      // echo $this->email->print_debugger();
      // exit();  
    }
  }
  public function cek_email()
  {
    $config['mailtype'] = 'text';
    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'ssl://mail.prinneo.com';
    $config['smtp_user'] = 'info@prinneo.com';
    $config['smtp_pass'] = '@Prinneo123';
    $config['smtp_port'] = 465;
    $config['newline'] = "\r\n";

    $this->load->library('email');
    $this->email->initialize($config);

    $this->email->from('info@prinneo.com', 'Uji Coba');
    $this->email->to('virgianfajar@gmail.com');
    $this->email->subject('Contoh Kirim Email Dengan Codeigniter');
    $this->email->message('Contoh pesan yang dikirim dengan codeigniter');

    if($this->email->send()) {
     echo 'Email berhasil dikirim';
   }  else {
     echo 'Email tidak berhasil dikirim';
     echo '<br />';
     echo $this->email->print_debugger();
   }

 } 

}
