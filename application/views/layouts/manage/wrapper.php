<?php
if ($this->session->userdata('user_email') == "" && $this->session->userdata('user_role') == "") {
    $this->session->set_flashdata('notifikasi', 'Silahkan login terlebih dahulu');
    redirect(site_url('login'), 'refresh');
} elseif ($this->session->userdata('user_role') == "1") {
    require_once('head.php');
    require_once('sidebar.php');
    require_once('header.php');
    require_once('main.php');
    require_once('footer.php');
} else {
    $this->session->set_flashdata('notifikasi', 'Silahkan login sebagai admin terlebih dahulu');
    redirect(site_url('login'));
}
