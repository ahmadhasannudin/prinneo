<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'models/ModelBase.php';

class MCareerApplicant extends ModelBase
{
    public function __construct()
    {
        parent::__construct();
    }

    var $table = 'career_applicant';

    public function apply($data)
    {
        // check if title exist
        $this->db->where('email', $data['email']);
        $this->db->where('career_id', $data['career_id']);
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $this->message = 'Email Already Exist !';
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
