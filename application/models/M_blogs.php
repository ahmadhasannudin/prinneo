<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_blogs extends CI_Model{
  public function __construct()
  {
    parent::__construct();

  }

  var $table = 'blogs';

  public function get_all(){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->order_by('blog_id', 'DESC');
    $query  = $this->db->get();
    return $query;
  }
  public function get_home(){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->where('blog_status', 'published');
    $this->db->order_by('blog_id', 'DESC');
    $this->db->limit(3);
    $query  = $this->db->get();
    return $query;
  }
  public function get_blogs(){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->where('blog_status', 'published');
    $this->db->join('blog_categorys', 'blogs.blog_category = blog_categorys.blog_category_id');
    $this->db->order_by('blog_id', 'DESC');
    $query  = $this->db->get();
    return $query;
  }
  public function get_blog_category($blog_category_slug){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->where('blog_status', 'published');
    $this->db->join('blog_categorys', 'blogs.blog_category = blog_categorys.blog_category_id');
    $this->db->where('blog_category_name', $blog_category_slug);
    $this->db->order_by('blog_id', 'DESC');
    $query  = $this->db->get();
    return $query;
  }
  public function get_details($blog_slug){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->join('blog_categorys', 'blogs.blog_category = blog_categorys.blog_category_id');
    $this->db->where('blog_slug', $blog_slug);
    $query  = $this->db->get();
    return $query;
  }
  public function get_prev($blog_id){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->where('blog_id >', $blog_id);
    $query  = $this->db->get();
    return $query;
  }
  public function get_next($blog_id){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->where('blog_id <', $blog_id);
    $query  = $this->db->get();
    return $query;
  }
  public function get_join_all($join_datas){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->join($join_datas['table'],$join_datas['on']);
    $this->db->order_by('blog_id', 'DESC');
    $query  = $this->db->get();
    return $query;
  }
  public function get_all_conditions($conditions){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->where($conditions);
    $this->db->order_by('blog_id', 'DESC');
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
    $this->db->where('blog_id', $data['blog_id']);
    $this->db->update($this->table, $data);
  }
  public function delete($blog_id){
    $this->db->where('blog_id', $blog_id);
    $this->db->delete($this->table);
  }
  function get_search_list($keyword,$limit, $start){
        $this->db->select('*');
        $this->db->order_by('blogs.blog_id', 'DESC');
        $this->db->join('blog_categorys','blog_categorys.blog_category_id = blogs.blog_category');
        $this->db->where('blogs.blog_status', 'published');
        $this->db->like('blogs.blog_title', $keyword);
        $this->db->or_like('blog_categorys.blog_category_name', $keyword);
        $this->db->or_like('blogs.blog_description', $keyword);
        $this->db->or_like('blogs.blog_tags', $keyword);
        $this->db->or_like('blogs.blog_author', $keyword);
        $query = $this->db->get('blogs', $limit, $start);
        return $query;
    }
    function search_data($keyword){
        $this->db->select('*');
        $this->db->join('blog_categorys','blog_categorys.blog_category_id = blogs.blog_category');
        $this->db->where('blogs.blog_status', 'published');
        $this->db->like('blogs.blog_title', $keyword);
        $this->db->or_like('blog_categorys.blog_category_name', $keyword);
        $this->db->or_like('blogs.blog_description', $keyword);
        $this->db->or_like('blogs.blog_tags', $keyword);
        $this->db->or_like('blogs.blog_author', $keyword);
        $query  = $this->db->get('blogs')->num_rows();
        return $query;
    }
}
