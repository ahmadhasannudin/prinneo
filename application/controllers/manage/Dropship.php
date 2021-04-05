<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dropship extends CI_Controller
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
                'title'            =>  'Mangement Dropship',
                'isi'              =>  'pages/manage/aboutUs_v',
                'pageFooter' => 'pages/manage/aboutUsFooter',
                'data' => $this->MBlogData->getData('dropship'),
                'formAction' => base_url() . '/manage/aboutUs/update/dropship'
            );

        $this->load->view("layouts/manage/wrapper", $data, false);
    }
}
