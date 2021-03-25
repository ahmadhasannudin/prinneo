<?php
Class M_dasbor extends CI_Model{
  Public function __construct()
  {
    parent::__construct();
  }
  public function count_product_categorys(){
    $this->db->from('product_categorys');
    $query  = $this->db->count_all_results();
    return $query;
  }
  public function count_product_sub_categorys(){
    $this->db->from('product_sub_categorys');
    $query  = $this->db->count_all_results();
    return $query;
  }
  public function count_products(){
    $this->db->from('products');
    $query  = $this->db->count_all_results();
    return $query;
  }
  public function count_blog_categorys(){
    $this->db->from('blog_categorys');
    $query  = $this->db->count_all_results();
    return $query;
  }
  public function count_blog_published(){
    $this->db->from('blogs');
    $this->db->where('blog_status','Published');
    $query  = $this->db->count_all_results();
    return $query;
  }
  public function count_blog_pending(){
    $this->db->from('blogs');
     $this->db->where('blog_status','Pending');
    $query  = $this->db->count_all_results();
    return $query;
  }
  public function count_lumise_categories(){
    $this->db->from('lumise_categories');
    $query  = $this->db->count_all_results();
    return $query;
  }
  public function count_lumise_products(){
    $this->db->from('lumise_products');
    $query  = $this->db->count_all_results();
    return $query;
  }
  public function count_contact_us(){
    $this->db->from('contact_us');
    $query  = $this->db->count_all_results();
    return $query;
  }
  public function count_user_customers(){
    $this->db->from('users');
    $this->db->where('user_role','5');
    $query  = $this->db->count_all_results();
    return $query;
  }
  public function count_user_desainers(){
    $this->db->from('users');
    $this->db->where('user_role','4');
    $query  = $this->db->count_all_results();
    return $query;
  }
  public function count_user_productions(){
    $this->db->from('users');
    $this->db->where('user_role','3');
    $query  = $this->db->count_all_results();
    return $query;
  }
  public function count_user_admins(){
    $this->db->from('users');
    $this->db->where('user_role','2');
    $query  = $this->db->count_all_results();
    return $query;
  }


}
