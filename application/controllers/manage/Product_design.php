<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_design extends CI_Controller {

	public function index()
	{
    $data  =
    array(
      'title'   =>  'Product Design Management - Quick Corp',
      'isi'     =>  'pages/manage/design_v',
    );
    $this->load->view("layouts/manage/wrapper", $data, false);
	}
}
