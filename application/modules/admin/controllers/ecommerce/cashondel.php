<?php

/*
 *  
 *   Github: https://github.com/ciphercrypt
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class cashondel extends ADMIN_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cashondel_model');
    }

    public function index()
    {
        $this->login_check();
        $data = array();
        $head = array();
        $head['title'] = 'Administration - COD management';
        $head['description'] = '!';
        $head['keywords'] = '';

        if (isset($_POST['city_name']) && isset($_POST['cod_value'])) {
            $this->Cashondel_model->setCodvalues($_POST['city_name'],$_POST['cod_value']);
            redirect('admin/cashondel');
        }

        if (isset($_GET['delete'])) {
            $this->Cashondel_model->deleteCodvalue($_GET['delete']);
            redirect('admin/cashondel');
        }

        $data['cod_details'] = $this->Cashondel_model->getCoddetails();

        $this->load->view('_parts/header', $head);
        $this->load->view('ecommerce/cashondel', $data);
        $this->load->view('_parts/footerforcod');

        $this->saveHistory('Go to cash on delivery page');
    }

}
