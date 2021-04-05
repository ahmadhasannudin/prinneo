<?php
defined('BASEPATH') or exit('No direct script access allowed');
class AboutUs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MBlogData');
    }
    function index()
    {
        $condition_users = array(
            'user_role' => '2'
        );

        $data  =
            array(
                'title'            =>  'Mangement About Us',
                'isi'              =>  'pages/manage/aboutUs_v',
                'pageFooter' => 'pages/manage/aboutUsFooter',
                'data' => $this->MBlogData->getData('about_us'),
                'formAction' => base_url() . '/manage/aboutUs/update/about_us'
            );

        $this->load->view("layouts/manage/wrapper", $data, false);
    }

    function update($type)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $valid = $this->form_validation;
        $valid->set_error_delimiters('', '');
        $valid->set_rules('content', 'content', 'required');

        if ($valid->run() == FALSE) {
            return resp(false,  validation_errors());
        }


        $data = $this->input->post();
        $data['type'] = $type;
        // return print_r($valid->run() === false);
        // return print_r($data);
        $this->MBlogData->update($data);

        return resp(true, 'success');
    }
}
