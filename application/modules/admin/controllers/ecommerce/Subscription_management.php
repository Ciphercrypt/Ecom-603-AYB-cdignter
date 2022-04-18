<?php

/*
 *  
 *   Github: https://github.com/ciphercrypt
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Subscription_management extends ADMIN_Controller
{
    private $num_rows = 10;

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
        $head['title'] = 'Administration - subscription management-new-orders';
        $head['description'] = '!';
        $head['keywords'] = '';




         $rowscount = $this->Subscdetails_model->SubscriptionorderCount();

        $data['links_pagination'] = pagination('admin/subscriptionorders', $rowscount, $this->num_rows, 3);
        $data['orders'] = $this->Subscdetails_model->getNewOrders();


        $this->load->view('_parts/header', $head);
        $this->load->view('ecommerce/new_subs', $data);
        $this->load->view('_parts/footerforcod');

        $this->saveHistory('Go to subscription order management page');
    }
    public function getRejected(){

        $head = array();
        $head['title'] = 'Administration - subscription management-new-orders';
        $head['description'] = '!';
        $head['keywords'] = '';




         $rowscount = $this->Subscdetails_model->SubscriptionorderCount();

        $data['links_pagination'] = pagination('admin/subscriptionorders', $rowscount, $this->num_rows, 3);
        $data['orders'] = $this->Subscdetails_model->getRejectedusers();


        $this->load->view('_parts/header', $head);
        $this->load->view('ecommerce/rejected_sub', $data);
        $this->load->view('_parts/footerforcod');

    }


    public function getConfirmed(){

        $head = array();
        $head['title'] = 'Administration - subscription management-new-orders';
        $head['description'] = '!';
        $head['keywords'] = '';




         $rowscount = $this->Subscdetails_model->SubscriptionorderCount();

        $data['links_pagination'] = pagination('admin/subscriptionorders', $rowscount, $this->num_rows, 3);
        $data['orders'] = $this->Subscdetails_model->getConfirmedusers();


        $this->load->view('_parts/header', $head);
        $this->load->view('ecommerce/confirm_subs', $data);
        $this->load->view('_parts/footerforcod');

    }



    public function confirmorder(){

        $this->Subscdetails_model->confirmOrder($_POST);
        redirect('admin/subscriptionorders');

    }
    public function rejectorder(){
        $this->Subscdetails_model->RejectOrder($_POST);
        redirect('admin/subscriptionorders');



    }

    public function editorder(){

        $this->Subscdetails_model->EditOrder($_POST);
        redirect('admin/subscriptionorders');



    }

    public function Create_new_day(){
        $allusers=array();
        $custdata=array();
        $setusers=array();
        

        if (!$this->Subscdetails_model->Todays_date_exists(date("Y-m-d"))){

            
            $allusers=$this->Subscdetails_model->get_all_users_sub();
            foreach( $allusers as $al){

                $custdata['user_id']=$al['user_id'];
                $custdata['date']=date("Y-m-d");
                $custdata['delivered']=0;
                $custdata['plan_id']=$al['subscription_id'];
                $this->Subscdetails_model->set_daily_feed($custdata);
                $this->setPaymentofSub($custdata);



            } 

            $setusers['orders']=$this->Subscdetails_model->getIncompleterOrders(date("Y-m-d"));




        }
        else if($this->Subscdetails_model->Todays_date_exists(date("Y-m-d"))){
            $setusers['orders']=$this->Subscdetails_model->getIncompleterOrders(date("Y-m-d"));

            } 




            $head = array();
            $head['title'] = 'Administration - subscription management-daily-orders';
            $head['description'] = '!';
            $head['keywords'] = '';

                $rowscount = $this->Subscdetails_model->SubscriptionorderCountDaily();

            $setusers['links_pagination'] = pagination('admin/subscriptionorders/incomplete_orders', $rowscount, $this->num_rows, 3);    
            $this->load->view('_parts/header', $head);
            $this->load->view('ecommerce/daily_subs_not',$setusers);
            $this->load->view('_parts/footerforcod');

    }

    public function setPaymentofSub($custdata){
        if(!$this->Subscdetails_model->checkPaymentExists($custdata)){

            $this->Subscdetails_model->SetPaymenteveryday($custdata);   
        }

    }

    public function ConfirmDelivery(){
        $this->Subscdetails_model->SetDailydelivery($_POST);
        redirect('admin/subscriptionorders/incomplete_orders');

    }

    public function RejectDailydelivery(){
        $this->Subscdetails_model->RejectDelivery($_POST);
        redirect('admin/subscriptionorders/incomplete_orders');

    }

    public function EditDailydelivery(){
        $this->Subscdetails_model->EditDelivery($_POST);
        redirect('admin/subscriptionorders/rejected_orders');

    }

    public function getRejectedOrdersToday(){

        $data=array();
        $data['orders']=$this->Subscdetails_model->getrejectedOrders(date("Y-m-d"));
        $head = array();
        $head['title'] = 'Administration - subscription management-daily-orders';
        $head['description'] = '!';
        $head['keywords'] = '';

        $rowscount = $this->Subscdetails_model->DailyorderCountDaily();

        $data['links_pagination'] = pagination('admin/subscriptionorders/rejected_orders', $rowscount, $this->num_rows, 3);    
        $this->load->view('_parts/header', $head);
        $this->load->view('ecommerce/daily_subs_rej',$data);
        $this->load->view('_parts/footerforcod');

        
    }


    public function getConfirmedOrdersToday(){
        $data=array();
        $data['orders']=$this->Subscdetails_model->getcompleterOrders(date("Y-m-d"));
        $head = array();
        $head['title'] = 'Administration - subscription management-daily-orders';
        $head['description'] = '!';
        $head['keywords'] = '';

        $rowscount = $this->Subscdetails_model->DailyorderCountDaily();
       

        $data['links_pagination'] = pagination('admin/subscriptionorders/confirmed_orders', $rowscount, $this->num_rows, 3);    
        $this->load->view('_parts/header', $head);
        $this->load->view('ecommerce/daily_subs_del',$data);
        $this->load->view('_parts/footerforcod');

    }


    public function getAllOrderstillToday(){
        $data=array();
        $data['orders']=$this->Subscdetails_model->getAllOrderstill();
        $head = array();
        $head['title'] = 'Administration - subscription management-All-orders';
        $head['description'] = '!';
        $head['keywords'] = '';

        $rowscount = $this->Subscdetails_model->GetallorderesCount();
       

        $data['links_pagination'] = pagination('admin/subscriptionorders/allOrders', $rowscount, $this->num_rows, 3);    
        $this->load->view('_parts/header', $head);
        $this->load->view('ecommerce/all_sub_orders',$data);
        $this->load->view('_parts/footerforcod');

    }

    public function getUserhistorybymonth(){
        $arrv=array();
        $arrv['data']=$this->Subscdetails_model->getSubcspecific($_GET);

        $arrv['orders']=$this->Subscdetails_model->getMonthdetailsofUser($_GET['user_id'],$_GET['month_date']);

        $head = array();
        $head['title'] = 'Administration - subscription management-All-orders';
        $head['description'] = '!';
        $head['keywords'] = '';

        $rowscount = 31;
       

        $arrv['links_pagination'] = pagination('admin/subscriptionorders/allOrders', $rowscount, $this->num_rows, 3);    
        $this->load->view('_parts/header', $head);
        $this->load->view('ecommerce/allrecordsUser',$arrv);
        $this->load->view('_parts/footerforcod');


        


    }

    




}