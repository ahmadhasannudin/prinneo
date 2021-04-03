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
                'data' => $this->MBlogData->getData('about_us')
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
        $valid->set_rules('image_url_old', 'Image Url Old', 'required');

        if ($valid->run() == FALSE) {
            return resp(false,  validation_errors());
        }

        // if ($this->form_validation->run() == false) {
        //     $errors = validation_errors();
        //     echo json_encode($errors);
        // }
        return;
        $data['type'] = $type;
        // return print_r($valid->run() === false);
        // return print_r($data);
        $this->MBlogData->update($data);
        // $this->M_blog_categorys->add($data);
        return resp(true, 'success');
    }
}
