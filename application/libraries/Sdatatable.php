<?php

/*
 * By : Ahmad Hasanudin
 *
 * - Seven Pion -
 *
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Sdatatable
{

    protected $CI;
    // variabel untuk tabel
    protected $tabel;
    // variabel untuk kolom yang di select
    protected $kolom;
    // variabel untuk join tabel
    protected $tabel_join = array();
    // variabel untuk kolom yang di filter
    protected $kolom_cari;
    // variabel untuk blacklist kolom pencarian
    protected $blacklist_kolom_cari;
    // variabel pencarian per kolom
    protected $cari_kolom_where = array();
    // variabel pencarian per kolom
    protected $cari_kolom_like = array();
    // variabel penyaringan data awal
    protected $filter_dasar;
    // variabel untuk menampung kolom tambahan
    protected $kolom_tambah = array();
    // variabel untuk menampung hasil query
    protected $rs_data = array();
    protected $sql_row_count;
    // variabel untuk kolom order
    protected $order_by = array();

    public function __construct($parameter = null)
    {
        // Assign the CodeIgniter super-object
        $this->CI = &get_instance();

        if (!empty($parameter)) {
            $this->tabel      = isset($parameter['tabel']) ? $parameter['tabel'] : '';
            $this->kolom      = isset($parameter['kolom']) ? $parameter['kolom'] : '';
            $this->kolom_cari = isset($parameter['kolom_cari']) ? $parameter['kolom_cari'] : '';
        }
    }

    public function set_tabel($tabel = null)
    {
        $this->tabel = $tabel;
        return $this;
    }

    /*
     * Fungsi untuk menentukan kolom mana saja yang akan di pilih / ditampilkan
     */

    public function set_kolom($kolom = null)
    {
        $this->kolom = $kolom;
        return $this;
    }

    /*
     * Fungsi untuk join antar tabel
     */

    public function join_tabel($tabel = null, $kolom_id = null, $type = '')
    {
        if (!empty($tabel) && !empty($kolom_id)) {
            $val['tabel']       = $tabel;
            $val['kolom_id']    = $kolom_id;
            $val['type']        = $type;
            $this->tabel_join[] = $val;
        }
        return $this;
    }

    //fungsi order

    public function order_by($kolom = null,  $type = 'ASC')
    {
        if (!empty($kolom)) {
            $val['kolom']       = $kolom;
            $val['type']        = $type;
            $this->order_by[] = $val;
        }
        return $this;
    }

    /*
     * Fungsi untuk menentukan kolom yang digunakan pencarian
     */

    public function set_kolom_cari($kolom_cari = null)
    {
        $this->kolom_cari = $kolom_cari;
        return $this;
    }

    /*
     * Fungsi untuk menentukan pencarian per kolom where
     */

    public function cari_perkolom_where($kolom = null, $val = null)
    {
        if (!empty($kolom)) {
            $this->cari_kolom_where[$kolom] = $val;
        }
        return $this;
    }

    /*
     * Fungsi untuk menentukan pencarian per kolom like
     */

    public function cari_perkolom_like($kolom = null, $var = null, $type = null)
    {
        if (!empty($kolom) && !empty($var)) {
            $val['kolom']            = $kolom;
            $val['value']            = $var;
            $val['type']             = $type;
            $this->cari_kolom_like[] = $val;
        }
        return $this;
    }

    /*
     * Fungsi untuk menentukan filter dasar
     */

    public function saring_data($kolom = null, $val = null)
    {
        if (!empty($kolom) && !empty($val)) {
            $this->filter_dasar[$kolom] = $val;
        }
        if (!empty($kolom) && empty($val)) {
            $this->filter_dasar = $kolom;
        }
        return $this;
    }

    /*
     * Fungsi untuk menambah kolom
     */

    public function tambah_kolom($nama_kolom = null, $isi_kolom = null)
    {
        $this->kolom_tambah[$nama_kolom] = $isi_kolom;
        return $this;
    }

    /*
     * Fungsi untuk mengabaikan kolom yang digunakan untuk pencarian
     */

    public function abaikan_kolom_cari($nama_kolom = null)
    {
        $this->blacklist_kolom_cari = $nama_kolom;
        return $this;
    }

    protected function _get_data()
    {

        if (empty($this->tabel)) {
            return false;
        }

        $parameter = array(
            'kolom_select' => $this->kolom,
            'kolom_cari'   => $this->_get_kolom_cari(),
            'tabel'        => $this->tabel,
            'join_tabel'   => $this->tabel_join,
            'orderBy'   => $this->order_by,
        );
        //        $this->rs_data = $this->CI->m_cldatatable->get_datatable($parameter);
        $this->rs_data = $this->_get_data_datatable($parameter);
    }

    /*
     * Fungsi untuk memanipulasi nilai berdasarkan nama kolom yang di select
     * Parameter yang digunakan kolom dan fungsi
     *
     * fungsi menggunakan unnamed function
     */

    public function modif_data($kolom = null, $funct = null)
    {
        if (empty($this->rs_data)) {
            $this->_get_data();
        }

        foreach ($this->rs_data['data'] as $i => $vdata) {
            $this->rs_data['data'][$i][$kolom] = $funct($vdata);
        }
        return $this;
    }

    public function get_datatable()
    {

        if (empty($this->rs_data)) {
            $this->_get_data();
        }

        // nomor
        $no      = $this->CI->input->post('start') + 1;
        $lskolom = isset($this->rs_data['data'][0]) ? array_keys($this->rs_data['data'][0]) : array();
        foreach ($this->rs_data['data'] as $idata => $vdata) {
            $arraykol = array();
            // tambah kolom nomor
            $arraykol['no'] = $no++ . '.';
            // loop data
            foreach ($lskolom as $ivkol => $vkol) {
                $arraykol[$vkol] = isset($vdata[$vkol]) ? $vdata[$vkol] : '';
                ${$ivkol}        = $vdata[$vkol];
            }

            // cek jika ada kolom tambahan sekaligus memparsing variabel sesuai nama kolom
            foreach ($this->kolom_tambah as $itambahkol => $vtambahkolom) {
                $arraykol[$itambahkol] = $this->_parse_var($vtambahkolom, $lskolom, $vdata);
            }
            $this->rs_data['data'][$idata] = $arraykol;
        }
        return json_encode($this->rs_data);
    }

    protected function _get_kolom_cari()
    {

        // jika tidak ada kolom blacklist dan kolom cari tidak diisi
        // maka otomatis kolom yang dipilih akan menjadi target kolom pencarian
        if (empty($this->blacklist_kolom_cari) && empty($this->kolom_cari)) {
            return $this->kolom;
        }

        $blacklist  = (!empty($this->blacklist_kolom_cari)) ? explode(',', str_replace(' ', '', $this->blacklist_kolom_cari)) : array();
        $kolom      = explode(',', str_replace(' ', '', $this->kolom));
        $kolom_cari = (!empty($this->kolom_cari)) ? explode(',', str_replace(' ', '', $this->kolom_cari)) : array();

        // jika kolom cari kosong maka kolom yang dipilih dikurangi kolom blacklist
        if (empty($kolom_cari)) {
            return array_diff($kolom, $blacklist);
        }

        return array_diff($kolom_cari, $blacklist);
    }

    protected function _parse_var($vtambahkolom = null, $data = null, $vdata)
    {
        // membuat variabel baru dengan nama kolom
        foreach ($data as $ivkol => $vkol) {
            ${$vkol} = $vdata[$vkol];
        }

        // mencari variable
        preg_match_all('/\{{(.*?)\}}/', $vtambahkolom, $match);

        // konversi variabel
        foreach ($match[0] as $i => $vmatch) {
            $vtambahkolom = str_replace($vmatch, ${$match[1][$i]}, $vtambahkolom);
        }
        return $vtambahkolom;
    }

    protected function _cek_pencarian_perkolom()
    {
        foreach ($this->CI->input->post('columns') as $vcols) {
            if ($vcols['searchable'] == 'true' && $vcols['search']['value'] != '' && !array_key_exists($vcols['data'], $this->kolom_tambah)) {
                $this->cari_perkolom_like($vcols['data'], $vcols['search']['value'], 'both');
            }
        }
    }

    protected function _get_data_datatable($parameter)
    {
        if (empty($parameter)) {
            return false;
        }

        $db = $this->CI->load->database('', true);

        // cek pencarian perkolom
        $this->_cek_pencarian_perkolom();
        // select data
        $db->select($parameter['kolom_select'])->from($parameter['tabel']);

        // join tabel jika ada
        if (!empty($parameter['join_tabel'])) {
            if (is_array($parameter['join_tabel'])) {
                foreach ($parameter['join_tabel'] as $vjoin) {
                    $db->join($vjoin['tabel'], $vjoin['kolom_id'], $vjoin['type']);
                }
            }
        }

        // order table default
        if (!empty($parameter['orderBy']) && is_array($parameter['orderBy']) && $this->CI->input->post('order') == null) {
            foreach ($parameter['orderBy'] as $vorder) {
                $db->order_by($vorder['kolom'], $vorder['type']);
            }
        } else {
            // deteksi nama kolom yang di urutkan
            foreach ($this->CI->input->post('order') as $vorder) {
                $db->order_by($this->CI->input->post('columns')[$vorder['column']]['data'], $vorder['dir']);
            }
        }


        // jika hanya menggunakan kolom tertentu pada keseluruhan data
        if (!empty($this->filter_dasar)) {
            $db->group_start();
            $db->where($this->filter_dasar);
            $db->group_end();
        }

        $option['recordsTotal'] = $db->count_all_results('', false);

        // jika ada pencarian per kolom
        if (!empty($this->cari_kolom_where) || !empty($this->cari_kolom_like)) {
            $db->group_start();
            if (!empty($this->cari_kolom_where)) {
                $db->where($this->cari_kolom_where);
            }

            if (!empty($this->cari_kolom_like)) {
                foreach ($this->cari_kolom_like as $vlike) {
                    $db->like($vlike['kolom'], $vlike['value'], $vlike['type']);
                }
            }
            $db->group_end();
        }

        // jika kolom pencarian diisi
        $cari = $this->CI->input->post('search')['value'] != '' ? $this->CI->input->post('search')['value'] : '';

        // jika kolom cari ada
        if (!empty($cari) && !empty($parameter['kolom_cari'])) {
            // get list colomn
            $lskolom = (!is_array($parameter['kolom_cari'])) ? explode(',', $parameter['kolom_cari']) : $parameter['kolom_cari'];
            $db->group_start();
            foreach ($lskolom as $vkolom) {
                // membersihkan nama kolom dari alias
                $db->or_like(current(array_slice(explode(' as ', strtolower($vkolom)), 0, 1)), $cari, 'both');
            }
            $db->group_end();
        }
        // hitung data setelah filter
        $option['recordsFiltered'] = $db->count_all_results('', false);

        // limit data
        if ($this->CI->input->post('length') > -1) {
            $db->limit($this->CI->input->post('length', true), $this->CI->input->post('start', true));
        }

        $option['draw'] = $this->CI->input->post('draw');
        $option['data'] = $db->get()->result_array();
        return $option;
    }

    public function get_sql_order()
    {
        $sql_order = '';
        $dt        = $this->CI->input->post();
        if (!empty($dt['order'])) {
            $sql_order = ' ORDER BY ';
            foreach ($dt['order'] as $korder => $vorder) {
                $column_data = $dt['columns'][$vorder['column']];
                if ($column_data['orderable'] == 'true') {
                    $sql_order .= $column_data['data'] . ' ' . $vorder['dir'];
                }
            }
        }
        return $sql_order;
    }

    /**
     * [get_sql_search description]
     * @param  array  $default_search [description]
     * @return [type]                 [description]
     */

    public function get_sql_search($default_search = [])
    {
        $sql_search = '';
        // Default Search as initial search
        if (!empty($default_search)) {
            foreach ($default_search as $kds => $vds) {
                if (empty($sql_search)) {
                    $sql_search = ' WHERE (';
                } else {
                    $sql_search .= ' OR ';
                }
                $sql_search .= $vds;
            }
            $sql_search .= ' ) ';
        }

        $this->sql_row_count = $sql_search;

        $dt = $this->CI->input->post();

        $search_value = $dt['search']['value'];

        $first_search = !empty($sql_search);

        $default_search_exist = false;
        if (!empty($search_value)) {
            foreach ($dt['columns'] as $key => $vsearch) {
                if ($vsearch['searchable'] == 'true') {
                    if (empty($sql_search)) {
                        $sql_search = ' WHERE (';
                    } else {
                        if ($first_search) {
                            $sql_search .= ' AND (';
                            $first_search = false;
                            $default_search_exist = true;
                        } else {
                            $sql_search .= ' OR ';
                        }
                    }
                    $col_search = !empty($vsearch['name']) ? $vsearch['name'] : $vsearch['data'];
                    $sql_search .=  $col_search . ' LIKE \'%' . $search_value . '%\' ';
                }
            }
            $sql_search .= ' ) ';
        }

        return $sql_search;
    }

    public function get_sql_row_count($sql)
    {
        return $sql . $this->sql_row_count;
    }
}
