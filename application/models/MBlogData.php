<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MBlogData extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    var $table = 'blog_data';

    public function update($data)
    {
        $this->db->where('type', $data['type']);
        $this->db->where('is_active', true);
        $q = $this->db->get($this->table);

        if ($q->num_rows() > 0) {
            $this->db->set('content', $data['content']);
            $this->db->update($this->table);
        } else {
            $this->db->insert($this->table, $data);
        }
    }

    //get blog by type
    public function getData($type)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('type', $type);
        $this->db->where('is_active', true);
        $query  = $this->db->get()->row();
        return $query;
    }
}
