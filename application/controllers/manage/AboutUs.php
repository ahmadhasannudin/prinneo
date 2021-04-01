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
        $data  =
            array(
                'title'            =>  'Mangement About Us',
                'isi'              =>  'pages/manage/aboutUs_v',
                'pageFooter' => 'pages/manage/aboutUsFooter'
            );
        $this->load->view("layouts/manage/wrapper", $data, false);
    }
    function update($type)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $data = $this->input->post();
        $data['type'] = $type;
        $this->MBlogData->update($data);
        // $this->M_blog_categorys->add($data);
        return resp(true, 'success');
    }
}
