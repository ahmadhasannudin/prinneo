<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_users extends CI_Model{
  public function __construct()
  {
    parent::__construct();

  }

  var $table = 'users';

  public function get_all(){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->order_by('user_id', 'DESC');
    $query  = $this->db->get();
    return $query;
  }
  public function get_all_conditions($conditions){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->where($conditions);
    $this->db->order_by('user_id', 'DESC');
    $query  = $this->db->get();
    return $query;
  }
  public function get_conditions($conditions){
    $this->db->select('*, users.user_id AS user_id');
    $this->db->from($this->table);
    $this->db->where($conditions);
    $this->db->join('address', 'users.address_id = address.address_id');
    $query  = $this->db->get();
    return $query;
  }
  public function email_check($email){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->where('users.user_email', $email);
    $query  = $this->db->get();
    return $query->row();
  }
  public function add($data){
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }
  public function add_user($data){
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }
  public function add_address($data){
    $this->db->insert('address', $data);
    return $this->db->insert_id();
  }
  public function address_id($address_id,$user_id){
    $this->db->set('user_id',  $user_id);
    $this->db->where('address_id', $address_id);
    $this->db->update('address');
  }
  public function update($data){
    $this->db->where('user_id', $data['user_id']);
    $this->db->update($this->table, $data);
  }
  public function delete($user_id){
    $this->db->where('user_id', $user_id);
    $this->db->delete($this->table);
  }
  public function delete_address($user_id){
    $this->db->where('user_id', $user_id);
    $this->db->delete('address');
  }
  public function editPassword($id, $data)
  {
    $this->db->where('user_id', $id);
    $this->db->update($this->table, $data);

  }
}
