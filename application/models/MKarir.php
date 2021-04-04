<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'models/ModelBase.php';

class MKarir extends ModelBase
{
    public function __construct()
    {
        parent::__construct();
    }

    var $table = 'career';

    public function create($data)
    {
        // check if title exist
        $this->db->where('title', $data['title']);
        $this->db->where('is_active', true);
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $this->message = 'Posisi Already Exist !';
            return false;
        }

        // insert data
        return  $this->db->insert($this->table, $data);
    }

    // update data
    public function update($id, $data)
    {
        $this->db->where('career_id', $id);
        return $this->db->update($this->table, $data);
    }

    //get blog by type
    public function getData($id)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('career_id', $id);
        $query  = $this->db->get()->row();
        return $query;
    }
}
