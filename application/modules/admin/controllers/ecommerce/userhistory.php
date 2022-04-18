<?php

/*
 *  
 *   Github: https://github.com/ciphercrypt
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class userhistory extends ADMIN_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Userhistory_model');
    }

    public function index()
    {
        $this->login_check();
        $data = array();
        $head = array();
        $head['title'] = 'Administration -  User history';
        $head['description'] = '!';
        $head['keywords'] = '';

        
        if (isset($_GET['edit'])) {
            $this->Userhistory_model->getUserorderdetails($_GET['edit']);
            redirect('admin/userhistory');
        }

        $data['user_details'] = $this->Userhistory_model->getuserdetails();

        $this->load->view('_parts/header', $head);
        $this->load->view('ecommerce/userhistory', $data);
        $this->load->view('_parts/footerforcod');

        $this->saveHistory('Go to user order history page');
    }

}
