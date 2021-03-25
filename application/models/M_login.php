<?php
class M_login extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  
  public function login($email_user, $password_user)
  {
    $this->db->select('*');
    $this->db->from('users');
    // $this->db->join('address', 'address.address_id = users.address_id');
    $this->db->where('user_email', $email_user);
    $this->db->where('user_password', $password_user);
    $this->db->order_by('users.user_id', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get();
    return $query->row();
  }

  public function login_google($email){
    $this->db->select('*');
    $this->db->from('users');
    // $this->db->join('address', 'address.address_id = users.address_id');
    $this->db->where('user_email', $email);
    $this->db->order_by('users.user_id', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get();
    return $query->row();
  }
  
  public function login_facebook($email){
    $this->db->select('*');
    $this->db->from('users');
    // $this->db->join('address', 'address.address_id = users.address_id');
    $this->db->where('user_email', $email);
    $this->db->order_by('users.user_id', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get();
    return $query->row();
  }
}
