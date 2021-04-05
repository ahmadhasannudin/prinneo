<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Karir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MKarir');
    }
    function index($id = null)
    {
        $data  =
            array(
                'title'   =>  'Blogs Management - Quick Corp',
                'isi'     =>  'pages/manage/karir/index',
                'pageFooter' => 'pages/manage/karir/indexFooter',
            );
        $this->load->view("layouts/manage/wrapper", $data, false);
    }

    function dataTableIndex()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }


        $datatble = $this->sdatatable->set_tabel('career c')
            ->set_kolom("c.career_id,
                c.title,
                c.description,
                c.is_active,
                COALESCE(ca.applicant, 0 ) AS applicant")
            ->join_tabel(
                '(select career_id, count(career_applicant_id) AS applicant
                    from career_applicant
                    group by career_id) ca',
                'ca.career_id = c.career_id',
                'left'
            );
        if ($this->input->post('is_active') != null) {
            $datatble->cari_perkolom_where('c.is_active', $this->input->post('is_active'));
        }

        $datatble->order_by('c.career_id', 'DESC');

        return $this->output->set_output($datatble->get_datatable());
    }

    // create karir
    function create()
    {
        // proses create
        if ($this->input->is_ajax_request()) {

            $valid = $this->form_validation;
            $valid->set_error_delimiters('', '</br>');
            $valid->set_rules('title', 'title', 'required');

            if ($valid->run() == FALSE) {
                return resp(false,  validation_errors());
            }

            $data = [
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'is_active' => $this->input->post('is_active') !== null ? 1 : 0,
            ];

            if (!$this->MKarir->create($data)) {
                return resp(false,  $this->MKarir->get_message());
            }

            return resp(true, 'success');
        }

        // load create page
        $data  =
            array(
                'title' =>  'Create Career',
                'isi' =>  'pages/manage/karir/form',
                'pageFooter' => 'pages/manage/karir/formFooter',
                'formActionURL' => base_url() . '/manage/karir/create'
            );
        $this->load->view("layouts/manage/wrapper", $data, false);
    }

    // edit karir
    function edit($id = null)
    {

        // proses update
        if ($this->input->is_ajax_request()) {
            // exit('No direct script access allowed');

            $valid = $this->form_validation;
            $valid->set_error_delimiters('', '</br>');
            $valid->set_rules('title', 'title', 'required');

            if ($valid->run() == FALSE) {
                return resp(false,  validation_errors());
            }

            $data = [
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'is_active' => $this->input->post('is_active') !== null ? 1 : 0,
            ];

            if (!$this->MKarir->update($id, $data)) {
                return resp(false,  $this->MKarir->get_message());
            }

            return resp(true, 'success');
        }
        // if empty id then 404
        if ($id == null) {
            $this->output->set_status_header('404');
            return show_404();
        }

        $data  =
            array(
                'title'   =>  'Edit Career',
                'isi'     =>  'pages/manage/karir/form',
                'pageFooter' => 'pages/manage/karir/formFooter',
                'formActionURL' => base_url() . '/manage/karir/edit/' . $id,
                'data' => $this->MKarir->getData($id)
            );

        $this->load->view("layouts/manage/wrapper", $data, false);
    }

    // detail karir
    function detail($id = null)
    {

        // proses update
        if ($this->input->is_ajax_request()) {
            // exit('No direct script access allowed');

            $valid = $this->form_validation;
            $valid->set_error_delimiters('', '</br>');
            $valid->set_rules('title', 'title', 'required');

            if ($valid->run() == FALSE) {
                return resp(false,  validation_errors());
            }

            $data = [
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'is_active' => $this->input->post('is_active') !== null ? 1 : 0,
            ];

            if (!$this->MKarir->update($id, $data)) {
                return resp(false,  $this->MKarir->get_message());
            }

            return resp(true, 'success');
        }
        // if empty id then 404
        if ($id == null) {
            $this->output->set_status_header('404');
            return show_404();
        }

        $data  =
            array(
                'title'   =>  'Detail Career',
                'isi'     =>  'pages/manage/karir/detail',
                'pageFooter' => 'pages/manage/karir/detailFooter',
                'formActionURL' => base_url() . '/manage/karir/detail/' . $id,
                'data' => $this->MKarir->getData($id),
                'id' => $id
            );

        $this->load->view("layouts/manage/wrapper", $data, false);
    }

    function dataTableApplicant($id)
    {

        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }


        return $this->output->set_output($this->sdatatable->set_tabel('career_applicant c')
            ->set_kolom("
            career_applicant_id,
            career_id,
            tanggal_lahir,
            alamat,
            telephone,
            email,
            status_pekerjaan,
            status_pernikahan,
            surat_lamaran,
            document_lamaran,
            nama")
            ->cari_perkolom_where('c.career_id', $id)
            ->order_by('c.nama', 'ASC')
            ->get_datatable());
    }
}
