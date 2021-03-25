<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_contacts extends CI_Model{
  public function __construct()
  {
    parent::__construct();

  }

  var $table = 'contacts';

  public function get_all(){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->order_by('contact_id', 'DESC');
    $query  = $this->db->get();
    return $query;
  }
  public function get_subs(){
    $this->db->select('*');
    $this->db->from('subscribers');
    $this->db->order_by('subscriber_id', 'DESC');
    $query  = $this->db->get();
    return $query;
  }
  public function get_saran(){
    $this->db->select('*');
    $this->db->from('contact_us');
    $this->db->order_by('contact_us_id', 'DESC');
    $query  = $this->db->get();
    return $query;
  }
  public function get_all_conditions($conditions){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->where($conditions);
    $this->db->order_by('contact_id', 'DESC');
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
  public function add_saran($data){
    $this->db->insert('contact_us', $data);
  }
  public function add_subscribe($data){
    $this->db->insert('subscribers', $data);
  }
  public function update($data){
    $this->db->where('contact_id', $data['contact_id']);
    $this->db->update($this->table, $data);
  }
  public function delete($contact_us_id){
    $this->db->where('contact_us_id', $contact_us_id);
    $this->db->delete('contact_us');
  }
  public function delete_subs($subscriber_id){
    $this->db->where('subscriber_id', $subscriber_id);
    $this->db->delete('subscribers');
  }
}
