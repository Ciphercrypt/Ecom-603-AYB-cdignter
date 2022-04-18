<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subform extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->Model('Public_model');
    }

    public function index()
    {
        $data = array();
        $head = array();
        $arrSeo = $this->Public_model->getSeo('shoppingcart');
        $head['title'] = @$arrSeo['title'];
        $head['description'] = @$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
        $this->render('subform', $head, $data);
    }
    public function getUserresponse(){
        $avi = array();
        $avi['data']=$this->Public_model->getSubcspecific($_POST);
       
        $head = array();
        $arrSeo = $this->Public_model->getSeo('shoppingcart');
        $head['title'] = @$arrSeo['title'];
        $head['description'] = @$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
        $this->render('showsubform', $head, $avi);


    }
    public function setOrder()
    {
    $this->Public_model->setSubOrder($_POST);
        $data = array();
        $data['statinfo']="avi";
        $head = array();
        $arrSeo = $this->Public_model->getSeo('shoppingcart');
        $head['title'] = @$arrSeo['title'];
        $head['description'] = @$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
        $this->render('subform', $head, $data);


    }
    

}
