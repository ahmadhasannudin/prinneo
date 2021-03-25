<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_voucher_discounts extends CI_Model{
  public function __construct()
  {
    parent::__construct();

  }

  var $table = 'voucher_discounts';

  public function get_all(){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->order_by('voucher_discount_id', 'DESC');
    $query  = $this->db->get();
    return $query;
  }
  public function get_all_conditions($conditions){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->where($conditions);
    $this->db->order_by('voucher_discount_id', 'DESC');
    $query  = $this->db->get();
    return $query;
  }
  public function get_conditions($conditions){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->where($conditions);
    $query  = $this->db->get();
    return $query;
  }
  public function add($data){
    $this->db->insert($this->table, $data);
  }
  public function update($data){
    $this->db->where('voucher_discount_id', $data['voucher_discount_id']);
    $this->db->update($this->table, $data);
  }
  public function delete($voucher_discount_id){
    $this->db->where('voucher_discount_id', $voucher_discount_id);
    $this->db->delete($this->table);
  }
}
