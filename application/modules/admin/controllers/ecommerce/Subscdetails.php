<?php

/*
 *  
 *   Github: https://github.com/ciphercrypt
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Subscdetails extends ADMIN_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Subscdetails_model');
    }


    public function index()
    {
        $this->login_check();
        $data = array();
        $head = array();
        $head['title'] = 'Administration - subscription management';
        $head['description'] = '!';
        $head['keywords'] = '';




        

        $data['subscdetails'] = $this->Subscdetails_model->getSubdetails();


        $this->load->view('_parts/header', $head);
        $this->load->view('ecommerce/subscdetails', $data);
        $this->load->view('_parts/footerforcod');

        $this->saveHistory('Go to subscription management page');
    }

    public function deleteDetails(){

        $data=$_POST['id'];
        $this->Subscdetails_model->deletesubscdetails($data);
        redirect('admin/subscription');

    }
    public function setDetails(){
        $this->Subscdetails_model->setSubdetails($_POST);
        redirect('admin/subscription');



    }

    public function updatedetails(){

        $this->Subscdetails_model->updateSubscdetails($_POST);
        redirect('admin/subscription');



    }
}