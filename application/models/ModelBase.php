<?php

class ModelBase extends CI_Model
{

    protected $insert_id;
    protected $message = '';
    protected $error   = [];

    public $pesan_error = array(
        1451 => 'Data is being used by system. Please check data usage.',
    );

    public function __construct()
    {
        parent::__construct();
        // $this->db->trans_begin();
    }

    public function get_transaction_db_error()
    {
        $error['code']    = '';
        $error['message'] = '';

        foreach ($this->error as $key => $value) {
            $error['code'] .= $value['code'];
            $message = $value['message'];
            if (isset($this->pesan_error[$value['code']])) {
                $message = $this->pesan_error[$value['code']];
            }
            $error['message'] .= $message . '<br>';
        }

        return $error;
    }

    public function ubah_data($tabel, $kolom, $id = null, $data)
    {
        if (empty($tabel) || empty($data) || empty($kolom)) {
            return false;
        }

        $this->db->trans_begin();


        if (is_array($kolom)) {
            $this->db->update($tabel, $data, $kolom);
            // return $this->db->affected_rows();
        }
        $this->db->where($kolom, $id);
        $this->db->update($tabel, $data);

        // jika transaksi gagal dilakukan atau
        // approval gagal dieksekusi
        // do transaction rollback
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $error_message = $this->get_transaction_db_error();
            // Error Approval
            $this->message = 'Failed to edit data. <br>Error: ' . (!empty($error_message['message']) ? $error_message['message'] : 'Unknown Error.');

            return false;
        } else {
            $this->db->trans_commit();
            $this->message = 'Data edited successfully.';
            return true;
        }
    }

    public function get_db_error()
    {
        return $this->db->error();
    }

    public function get_message()
    {
        return $this->message;
    }

    // function __destruct()
    // {
    //     if ($this->db->trans_status() === false) {
    //         $this->db->trans_rollback();
    //         $error_message = $this->get_transaction_db_error();
    //         $this->message = 'Failed to add data. <br>Error: ' . (!empty($error_message['message']) ? $error_message['message'] : 'Unknown Error.');
    //         return false;
    //     } else {
    //         $this->db->trans_commit();
    //         $this->message = 'Data added successfully.';
    //         return true;
    //     }
    // }
}
