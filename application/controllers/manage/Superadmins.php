<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Superadmins extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_users');
  }
  function index()
  {
    $condition_users = array(
      'user_role' => '1'
    );
    $users = $this->M_users->get_all_conditions($condition_users)->result();
    $data  =
    array(
      'title'   =>  'Superadmins Management - Quick Corp',
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
        'required'  =>  'Email harus diisi',
        'is_unique[users.user_email]'  =>  'Username sudah dipakai'
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
        'title'   =>  'Superadmins Management Add - Quick Corp',
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
          'address_name'      =>  $i->post('address_name'),
          // 'address_city'      =>  $i->post('address_city'),
          // 'address_province'  =>  $i->post('address_province'),
          // 'city_id'           =>  $i->post('city_id'),
          // 'province_id'       =>  $i->post('province_id'),
        );
        $address_id = $this->M_users->add_address($data);
        $data = array(
          'user_name'      =>  $i->post('user_name'),
          'user_email'     =>  $i->post('user_email'),
          'user_phone'     =>  $i->post('user_phone'),
          'user_gender'    =>  $i->post('user_gender'),
          'user_photo'     =>  'user.jpg',
          'user_password'  =>  md5($i->post('user_password')),
          'address_id'     =>  $address_id,
          'user_role'      =>  '1'
        );
        $user_id = $this->M_users->add($data);
        $this->M_users->address_id($address_id,$user_id);
        $this->session->set_flashdata('success', '<center>Berhasil</center>');
        redirect('/manage/superadmins');
      }
      else
      {
        $data = array(
          'address_name'      =>  $i->post('address_name'),
          // 'address_city'      =>  $i->post('address_city'),
          // 'address_province'  =>  $i->post('address_province'),
          // 'city_id'           =>  $i->post('city_id'),
          // 'province_id'       =>  $i->post('province_id'),
        );
        $address_id = $this->M_users->add_address($data);
        $data = array(
          'user_name'      =>  $i->post('user_name'),
          'user_email'     =>  $i->post('user_email'),
          'user_phone'     =>  $i->post('user_phone'),
          'user_gender'    =>  $i->post('user_gender'),
          'user_photo'     =>  $this->upload->data('file_name'),
          'user_password'  =>  md5($i->post('user_password')),
          'address_id'     =>  $address_id,
          'user_role'      =>  '1'
        );
        $user_id = $this->M_users->add($data);
        $this->M_users->address_id($address_id,$user_id);
        $this->session->set_flashdata('success', '<center>Berhasil</center>');
        redirect('/manage/superadmins');
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
      'address_name',
      'address_name',
      'required',
      array(
        'required'  =>  'Alamat harus diisi'
      )
    );
    if ($valid->run()===false)
    {
      $user_details = $this->M_users->get_conditions($user_id);
      $data =
      array(
        'title'   =>  'Superadmins Management Update - Quick Corp',
        'isi'     =>  'pages/manage/users_e',
        'user_details'  =>  $user_details
      );
      // echo "<pre>";
      // print_r($data);
      // exit();
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
          'user_photo'     =>  $i->post('user_photo_old'),
          'user_role'      =>  '1',
          'user_id'        =>  $user_id
        );
      }
      else
      {
        $data = array(
          'user_name'      =>  $i->post('user_name'),
          'user_email'     =>  $i->post('user_email'),
          'user_phone'     =>  $i->post('user_phone'),
          'user_gender'    =>  $i->post('user_gender'),
          'user_photo'     =>  $this->upload->data('file_name'),
          'user_role'      =>  '1',
          'user_id'        =>  $user_id
        );
      }
      $this->M_users->update($data);
      $this->session->set_flashdata('notifikasi', '
        <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
        <strong>Data Berhasil diubah!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
      redirect('/manage/superadmins');
    }
  }
  public function edit_password($id){
    $this->form_validation->set_rules('user_password', 'user_password', 'required|trim|min_length[3]', [
      'min_length' => 'Password terlalu pendek!',
      'required' => '<span class="text-danger"> Password tidak boleh kosong</span>'
    ]);
    $this->form_validation->set_rules('user_password_conf', 'user_password_conf', 'required|trim|matches[user_password],', ['matches' => 'Password Tidak cocok!', 'required' => '<span class="text-danger"> Konfirmasi password tidak boleh kosong</span>']);

    if ($this->form_validation->run()) {
      $data = array(
        'user_password' => md5($this->input->post('password')),
      );
      $this->M_users->editPassword($id, $data);
      $this->session->set_flashdata('notifikasi', '
        <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
        <strong>Tersimpan!</strong> Password berhasil diubah.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
      redirect(site_url('/manage/superadmins/update/'). $id);
    } else {
      $this->session->set_flashdata('notifikasi', '
        <div class="alert alert-danger alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
        <strong>Gagal!</strong> Password tidak tersimpan.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
      redirect(site_url('/manage/superadmins/update/') . $id);
    }
  }
  function delete($user_id){
    $this->M_users->delete($user_id);
    $this->M_users->delete_address($user_id);
    $this->session->set_flashdata('notifikasi', '
      <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
      <strong>Data!</strong> Berhasil dihapus.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>');
    redirect('/manage/superadmins/');
  }
}
