<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_orders extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  var $table = 'tmp_cart';

  public function get_all()
  {
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->order_by('bank_id', 'DESC');
    $query  = $this->db->get();
    return $query;
  }
  public function get_all_conditions($conditions)
  {
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->where($conditions);
    $this->db->order_by('bank_id', 'DESC');
    $query  = $this->db->get();
    return $query;
  }
  public function get_conditions($conditions)
  {
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->where($conditions);
    $query  = $this->db->get();
    return $query;
  }
  public function add($data)
  {
    $this->db->insert($this->table, $data);
  }
  public function update($data)
  {
    $this->db->where('bank_id', $data['bank_id']);
    $this->db->update($this->table, $data);
  }
  public function delete($bank_id)
  {
    $this->db->where('bank_id', $bank_id);
    $this->db->delete($this->table);
  }

  public function insertOrders($data)
  {
    $checkRows = $this->db->get_where('orders', array(
      'order_code' => $data['order']['order_code']
    ));

    $count = $checkRows->num_rows();

    if ($count > 1) {
      $this->message = 'Data added successfully.';
      return true;
    }

    $this->db->trans_begin();

    //insert orders
    $this->db->insert('orders', $data['order']);
    $orderID = $this->db->insert_id();


    //insert orders details
    foreach ($data['order_details'] as $key => $value) {
      $data['order_details'][$key]['order_id'] = $orderID;
    }
    $this->db->insert_batch('order_details', $data['order_details']);

    // insert order payment
    $data['order_payment']['order_id'] = $orderID;
    $this->db->insert('order_payment', $data['order_payment']);

    if ($this->db->trans_status() === false) {
      $this->db->trans_rollback();
      $this->message = 'Failed to add data. <br>Error: ' . (!empty($error_message['message']) ? $error_message['message'] : 'Unknown Error.');
      return false;
    } else {
      $this->db->trans_commit();
      $this->message = 'Data added successfully.';
      return true;
    }
  }

  public function  getDetailOrder($orderID)
  {
    $data['order'] = $this->db->select('*')
      ->from('orders')
      ->where('order_id', $orderID)
      ->get()
      ->row();

    if (empty($data['order'])) {
      return [];
    }

    $data['payment'] = $this->db->select('*')
      ->from('order_payment')
      ->where('order_id', $orderID)
      ->get()
      ->row();


    $data['detail'] = $this->db->select('*')
      ->from('order_details')
      ->where('order_id', $orderID)
      ->get()
      ->result_array();

    return $data;
  }
}
