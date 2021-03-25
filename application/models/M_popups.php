<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_popups extends CI_Model{
  public function __construct()
  {
    parent::__construct();

  }

  var $table = 'popups';

  public function get_all(){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->order_by('popup_id', 'DESC');
    $query  = $this->db->get();
    return $query;
  }
  public function get_all_conditions($conditions){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->where($conditions);
    $this->db->order_by('popup_id', 'DESC');
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
  public function reset($data){
    $this->db->where('popup_show', '1');
    $this->db->update($this->table, $data);
  }
  public function update($data){
    $this->db->where('popup_id', $data['popup_id']);
    $this->db->update($this->table, $data);
  }
  public function delete($popup_id){
    $this->db->where('popup_id', $popup_id);
    $this->db->delete($this->table);
  }
}
