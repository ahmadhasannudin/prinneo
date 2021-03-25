<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admins extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_users');
  }
  function index()
  {
    $condition_users = array(
      'user_role' => '2'
    );
    $users = $this->M_users->get_all_conditions($condition_users)->result();
    $data  =
    array(
      'title'   =>  'Admins Management - Quick Corp',
      'isi'     =>  'pages/manage/users_v',
      'users'   =>  $users
    );
    $this->load->view("layouts/manage/wrapper", $data, false);
  }
  function add(){
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->
    set_rules(
      'user_name',
      'user_name',
      'required',
      array(
        'required'  =>  'Nama lengkap harus diisi'
      )
    );
    $valid->
    set_rules(
      'user_email',
      'user_email',
      'required',
      array(
        'required'  =>  'Email harus diisi'
      )
    );
    $valid->
    set_rules(
      'user_phone',
      'user_phone',
      'required',
      array(
        'required'  =>  'No. Handphone harus diisi'
      )
    );
    $valid->
    set_rules(
      'user_gender',
      'user_gender',
      'required',
      array(
        'required'  =>  'Jenis kelamin harus dipilih'
      )
    );
    $valid->
    set_rules(
      'user_address_1',
      'user_address_1',
      'required',
      array(
        'required'  =>  'Alamat harus diisi'
      )
    );
    $valid->
    set_rules(
      'user_zip',
      'user_zip',
      'required',
      array(
        'required'  =>  'Kode POS harus diisi'
      )
    );
    $valid->
    set_rules(
      'user_username',
      'user_username',
      'required|is_unique[users.user_username]',
      array(
        'required'                        =>  'Username harus diisi',
        'is_unique[users.user_username]'  =>  'Username sudah dipakai'
      )
    );
    $valid->
    set_rules(
      'user_password',
      'user_password',
      'required',
      array(
        'required'  =>  'Password harus diisi'
      )
    );
    $valid->
    set_rules(
      'user_password_conf',
      'user_password_conf',
      'required|matches[user_password]',
      array(
        'matches[user_password]'  =>  'Password konfirmasi tidak sama',
        'required'                =>  'Password konfirmasi harus diisi',
      )
    );
    if ($valid->run()===false)
    {
      $data =
      array(
        'title'   =>  'Admins Management Add - Quick Corp',
        'isi'     =>  'pages/manage/users_t',
      );
      $this->load->view("layouts/manage/wrapper", $data, false);
    }
    else
    {
      $config['upload_path']          = './assets/images/img_users/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 3000;
      $config['encrypt_name']         = TRUE;
      $this->upload->initialize($config);
      if ( ! $this->upload->do_upload('user_photo'))
      {
        $data = array(
          'user_name'      =>  $i->post('user_name'),
          'user_email'     =>  $i->post('user_email'),
          'user_phone'     =>  $i->post('user_phone'),
          'user_gender'    =>  $i->post('user_gender'),
          'user_address_1' =>  $i->post('user_address_1'),
          'user_address_2' =>  $i->post('user_address_2'),
          'user_zip'       =>  $i->post('user_zip'),
          'user_photo'     =>  'default.png',
          'user_username'  =>  $i->post('user_username'),
          'user_password'  =>  md5($i->post('user_password')),
          'user_role'      =>  '2'
        );
        $this->M_users->add($data);
        $this->session->set_flashdata('success', '<center>Berhasil</center>');
        redirect('/manage/admins');
      }
      else
      {
        $data = array(
          'user_name'      =>  $i->post('user_name'),
          'user_email'     =>  $i->post('user_email'),
          'user_phone'     =>  $i->post('user_phone'),
          'user_gender'    =>  $i->post('user_gender'),
          'user_address_1' =>  $i->post('user_address_1'),
          'user_address_2' =>  $i->post('user_address_2'),
          'user_zip'       =>  $i->post('user_zip'),
          'user_photo'     =>  $this->upload->data('file_name'),
          'user_username'  =>  $i->post('user_username'),
          'user_password'  =>  md5($i->post('user_password')),
          'user_role'      =>  '2'
        );
        $this->M_users->add($data);
        $this->session->set_flashdata('success', '<center>Berhasil</center>');
        redirect('/manage/admins');
      }
    }
  }
  function update($user_id){
    $valid = $this->form_validation;
    $i  = $this->input;
    $valid->
    set_rules(
      'user_name',
      'user_name',
      'required',
      array(
        'required'  =>  'Nama lengkap harus diisi'
      )
    );
    $valid->
    set_rules(
      'user_email',
      'user_email',
      'required',
      array(
        'required'  =>  'Email harus diisi'
      )
    );
    $valid->
    set_rules(
      'user_phone',
      'user_phone',
      'required',
      array(
        'required'  =>  'No. Handphone harus diisi'
      )
    );
    $valid->
    set_rules(
      'user_gender',
      'user_gender',
      'required',
      array(
        'required'  =>  'Jenis kelamin harus dipilih'
      )
    );
    $valid->
    set_rules(
      'user_address_1',
      'user_address_1',
      'required',
      array(
        'required'  =>  'Alamat harus diisi'
      )
    );
    $valid->
    set_rules(
      'user_zip',
      'user_zip',
      'required',
      array(
        'required'  =>  'Kode POS harus diisi'
      )
    );
    $valid->
    set_rules(
      'user_password',
      'user_password',
      'required',
      array(
        'required'  =>  'Password harus diisi'
      )
    );
    $valid->
    set_rules(
      'user_password_conf',
      'user_password_conf',
      'required|matches[user_password]',
      array(
        'matches[user_password]'  =>  'Password konfirmasi tidak sama',
        'required'                =>  'Password konfirmasi harus diisi',
      )
    );
    if ($valid->run()===false)
    {
      $condition_users = array(
        'user_id'  => $user_id
      );
      $user_details = $this->M_users->get_conditions($condition_users)->row();
      $data =
      array(
        'title'   =>  'Admins Management Update - Quick Corp',
        'isi'     =>  'pages/manage/users_e',
        'user_details'  =>  $user_details
      );
      $this->load->view("layouts/manage/wrapper", $data, false);
    }
    else
    {
      $config['upload_path']          = './assets/images/img_users/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 3000;
      $config['encrypt_name']         = TRUE;
      $this->upload->initialize($config);
      if ( ! $this->upload->do_upload('user_photo'))
      {
        $data = array(
          'user_name'      =>  $i->post('user_name'),
          'user_email'     =>  $i->post('user_email'),
          'user_phone'     =>  $i->post('user_phone'),
          'user_gender'    =>  $i->post('user_gender'),
          'user_address_1' =>  $i->post('user_address_1'),
          'user_address_2' =>  $i->post('user_address_2'),
          'user_zip'       =>  $i->post('user_zip'),
          'user_photo'     =>  $i->post('user_photo_old'),
          'user_password'  =>  md5($i->post('user_password')),
          'user_role'      =>  '2'
        );
      }
      else
      {
        $data = array(
          'user_name'      =>  $i->post('user_name'),
          'user_email'     =>  $i->post('user_email'),
          'user_phone'     =>  $i->post('user_phone'),
          'user_gender'    =>  $i->post('user_gender'),
          'user_address_1' =>  $i->post('user_address_1'),
          'user_address_2' =>  $i->post('user_address_2'),
          'user_zip'       =>  $i->post('user_zip'),
          'user_photo'     =>  $this->upload->data('file_name'),
          'user_password'  =>  md5($i->post('user_password')),
          'user_role'      =>  '2',
          'user_id'        =>  $user_id
        );
      }
      $this->M_users->update($data);
      $this->session->set_flashdata('success', '<center>Berhasil</center>');
      redirect('/manage/admins/update/'.$user_id);
    }
  }
  function delete($user_id){
    $this->M_users->delete($user_id);
    $this->session->set_flashdata('success', '<center>Berhasil</center>');
    redirect('/manage/admins/');
  }
}
