<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_products extends CI_Model{
  public function __construct()
  {
    parent::__construct();

  }

  var $table = 'products';

  public function get_all(){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->order_by('product_id', 'DESC');
    $query  = $this->db->get();
    return $query;
  }
  public function get_base_all(){
    $this->db->select('*');
    $this->db->from('lumise_products');
    $this->db->order_by('name', 'ASC');
    $query  = $this->db->get();
    return $query;
  }
  public function get_join_all($join_datas){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->join($join_datas['table'],$join_datas['on']);
    $this->db->order_by('product_id', 'DESC');
    $query  = $this->db->get();
    return $query;
  }
  public function get_all_conditions($conditions){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->where($conditions);
    $this->db->order_by('product_id', 'DESC');
    $query  = $this->db->get();
    return $query;
  }
  public function get_conditions($conditions){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->join('product_sub_categorys','product_sub_categorys.product_sub_category_id = products.product_sub_category_id');
    $this->db->join('product_categorys','product_categorys.product_category_id = products.product_category_id');
    $this->db->where($conditions);
    $query  = $this->db->get();
    return $query;
  }
  public function get_sub_category($id_sub_category){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->join('product_sub_categorys','product_sub_categorys.product_sub_category_id = products.product_sub_category_id');
    $this->db->where('products.product_sub_category_id',$id_sub_category);
    $query  = $this->db->get();
    return $query;
  }
  public function get_limit($condition, $limit, $offset){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->where($condition);
    $this->db->order_by('product_name','DESC');
    $this->db->limit($limit, $offset);
    $query  = $this->db->get();
    return $query->result();
  }
  public function add($data){
    $this->db->insert($this->table, $data);
  }
  public function update($data){
    $this->db->where('product_id', $data['product_id']);
    $this->db->update($this->table, $data);
  }
  public function delete($product_id){
    $this->db->where('product_id', $product_id);
    $this->db->delete($this->table);
  }
  function jumlah_data(){
    $this->db->select('product_name, product_slug, product_image, product_start_price');
    $this->db->limit(100);
    $this->db->where('products.product_status !=', '0');
    $query  = $this->db->get('products')->num_rows();
    return $query;
  }
  function category_data($id){
    $this->db->select('product_name, product_slug, product_image, product_start_price');
    $this->db->where('product_category_id', $id);
    $this->db->where('product_status !=', '0');
    $query  = $this->db->get('products')->num_rows();
    return $query;
  }
  function sub_category_data($id){
    $this->db->select('product_name, product_slug, product_image, product_start_price');
    $this->db->where('product_sub_category_id', $id);
    $this->db->where('product_status !=', '0');
    $query  = $this->db->get('products')->num_rows();
    return $query;
  }
  function get_product_list($limit, $start){
    $this->db->select('product_name, product_slug, product_image, product_start_price');
    $this->db->order_by('products.product_id', 'DESC');
    $this->db->join('product_sub_categorys','product_sub_categorys.product_sub_category_id = products.product_sub_category_id');
    $this->db->where('products.product_status !=', '0');
    $this->db->limit(100);
    $query = $this->db->get('products', $limit, $start);
    return $query;
  }
  function get_category_list($id,$limit, $start){
    $this->db->select('product_name, product_slug, product_image, product_start_price');
    $this->db->order_by('products.product_id', 'DESC');
    $this->db->join('product_sub_categorys','product_sub_categorys.product_sub_category_id = products.product_sub_category_id');
    $this->db->where('products.product_status !=', '0');
    $this->db->where('products.product_category_id', $id);
    $query = $this->db->get('products', $limit, $start);
    return $query;
  }
  function get_sub_category_list($id,$limit, $start){
    $this->db->select('product_name, product_slug, product_image, product_start_price');
    $this->db->order_by('products.product_id', 'DESC');
    $this->db->join('product_sub_categorys','product_sub_categorys.product_sub_category_id = products.product_sub_category_id');
    $this->db->where('products.product_status !=', '0');
    $this->db->where('products.product_sub_category_id', $id);
    $query = $this->db->get('products', $limit, $start);
    return $query;
  }
  function get_search_list($keyword,$limit, $start){
    $this->db->select('product_name, product_slug, product_image, product_start_price');
    $this->db->order_by('products.product_id', 'DESC');
    $this->db->join('product_sub_categorys','product_sub_categorys.product_sub_category_id = products.product_sub_category_id');
    $this->db->join('product_categorys','product_categorys.product_category_id = products.product_category_id');
    $this->db->where('products.product_status !=', '0');
    $this->db->like('products.product_name', $keyword);
    $this->db->or_like('products.product_description', $keyword);
    $this->db->or_like('product_sub_categorys.product_sub_category_name', $keyword);
    $this->db->or_like('product_categorys.product_category_name', $keyword);
    $query = $this->db->get('products', $limit, $start);
    return $query;
  }
  function search_data($keyword){
    $this->db->select('product_name, product_slug, product_image, product_start_price');
    $this->db->join('product_sub_categorys','product_sub_categorys.product_sub_category_id = products.product_sub_category_id');
    $this->db->join('product_categorys','product_categorys.product_category_id = products.product_category_id');
    $this->db->where('products.product_status !=', '0');
    $this->db->like('products.product_name', $keyword);
    $this->db->where('products.product_status', '1');
    $this->db->or_like('products.product_description', $keyword);
    $this->db->or_like('product_sub_categorys.product_sub_category_name', $keyword);
    $this->db->or_like('product_categorys.product_category_name', $keyword);
    $query  = $this->db->get('products')->num_rows();
    return $query;
  }
}
