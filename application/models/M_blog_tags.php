<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_blog_tags extends CI_Model{
  public function __construct()
  {
    parent::__construct();

  }

  var $table = 'blog_tags';

  public function get_all(){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->order_by('blog_tag_id', 'DESC');
    $query  = $this->db->get();
    return $query;
  }
  public function get_all_conditions($conditions){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->where($conditions);
    $this->db->order_by('blog_tag_id', 'DESC');
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
    $this->db->where('blog_tag_id', $data['blog_tag_id']);
    $this->db->update($this->table, $data);
  }
  public function delete($blog_tag_id){
    $this->db->where('blog_tag_id', $blog_tag_id);
    $this->db->delete($this->table);
  }
}
