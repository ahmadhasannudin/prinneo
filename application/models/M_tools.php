<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_tools extends CI_Model{
  public function __construct()
  {
    parent::__construct();

  }

  var $table = 'tools';

  public function get_all(){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->order_by('tool_id', 'DESC');
    $query  = $this->db->get();
    return $query;
  }
  public function get_all_conditions($conditions){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->where($conditions);
    $this->db->order_by('tool_id', 'DESC');
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
  public function update($data){
    $this->db->where('tool_id', $data['tool_id']);
    $this->db->update($this->table, $data);
  }
}
