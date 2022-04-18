<?php

class Subscdetails_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getSubdetails()
    {
        $result = $this->db->get('subscription_details');
        return $result->result_array();
    }

    public function getSubspecific($id){
        if (!$this->db->where('id', $id)->get('subscription_details')) {
            log_message('error', print_r($this->db->error(), true));
            show_error(lang('database_error'));
        }



    }
    public function setSubdetails($post)
    {
        if (!$this->db->insert('subscription_details', array(
        'milk_type' => $post['type'],
        'quantity' => $post['quantity'],
        'rate_day' => $post['rate_day'],
        'rate_month' => $post['rate_month'],
        'rate_pay_now' => $post['rate_pay_now']
        
        
        
        ))) {
            log_message('error', print_r($this->db->error(), true));
            show_error(lang('database_error'));
        }
    }

    public function deletesubscdetails($id)
    {
        if (!$this->db->where('id', $id)->delete('subscription_details')) {
            log_message('error', print_r($this->db->error(), true));
            show_error(lang('database_error'));
        }
    }

    public function updateSubscdetails($post)
    {
        $array = array(
            'milk_type' => $post['type'],
            'quantity' => $post['quantity'],
            'rate_day' => $post['rate_day'],
            'rate_month' => $post['rate_month'],
            'rate_pay_now' => $post['rate_pay_now'],

            

        );
        $this->db->where('id', $post['id']);
        $this->db->update('subscription_details', $array);
    }

    public function getNewOrders()
    {   $array = array('confirm_status =' => 1);
        $this->db->where($array);
        $result = $this->db->get('subscription_orders');
        return $result->result_array();


    }

    public function getRejectedusers()
    {   $array = array('confirm_status =' => 3);
        $this->db->where($array);
        $result = $this->db->get('subscription_orders');
        return $result->result_array();


    }

    public function getConfirmedusers()
    {   $array = array('confirm_status =' => 2);
        $this->db->where($array);
        $result = $this->db->get('subscription_orders');
        
        return $result->result_array();


    }


    public function confirmOrder($post)
    {
        $confirm_statusarr = array('confirm_status' => 2,'start_date'=>$post['start_date']);    
        $this->db->where('order_id', $post['order_id']);
        $this->db->update('subscription_orders', $confirm_statusarr); 


        $sub_edit = array('subscribed' => 1);    
        $this->db->where('id', $post['user_id']);
        $this->db->update('users_public', $sub_edit); 

    }

    public function RejectOrder($post)
    {
        $confirm_statusarr = array('confirm_status' => 3);    
        $this->db->where('order_id', $post['order_id']);
        $this->db->update('subscription_orders', $confirm_statusarr); 

        $sub_edit = array('subscribed' => 0);    
        $this->db->where('id', $post['user_id']);
        $this->db->update('users_public', $sub_edit); 


    }


    public function EditOrder($post)
    {
        $confirm_statusarr = array('confirm_status' => 1);    
        $this->db->where('order_id', $post['order_id']);
        $this->db->update('subscription_orders', $confirm_statusarr); 


    }
    public function SubscriptionorderCount()
    {
        return $this->db->count_all_results('subscription_orders');
    }



    public function SubscriptionorderCountDaily()
    {     $this->db->where('confirm_status',2);

        return $this->db->count_all_results('subscription_orders');
    }

    public function DailyorderCountDaily()
    {     $this->db->where('delivered',1);
        $this->db->where('date',date("Y-m-d"));

        return $this->db->count_all_results('daily_sub_orders');
    }


    public function GetallorderesCount()
    {    
        return $this->db->count_all_results('daily_sub_orders');
    }



    public function Todays_date_exists($date1)
    {

        $this->db->where('date',$date1);
        $query = $this->db->get('daily_sub_orders');
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
         }
    }


    public function get_all_users_sub()
    {
        $array = array('confirm_status =' => 2, 'start_date <='=>date("Y-m-d"));
        $this->db->where($array);
        $result = $this->db->get('subscription_orders');
        
        return $result->result_array();    
    }


    public function set_daily_feed($custdata)
    {
        if (!$this->db->insert('daily_sub_orders', array(
        'user_id' => $custdata['user_id'],
        'date' => $custdata['date'],
        'delivered' => $custdata['delivered'],
        'plan_id' => $custdata['plan_id'],

        
        
        
        ))) {
            log_message('error', print_r($this->db->error(), true));
            show_error(lang('database_error'));



        }


        $confirm_statusarr = array('delivered' => 4);   
        $cond =array('date <'=>date('Y-m-d'), 'delivered = '=>0) ;
        $this->db->where($cond);
        $this->db->update('daily_sub_orders', $confirm_statusarr); 






    }


public function SetPaymenteveryday($custdata){
    if (!$this->db->insert('monthly_payment_tracks', array(
        'user_id' => $custdata['user_id'],
        'plan_id' => $custdata['plan_id'],
        'month' => date('Y-m-d')
                
        
        ))) {
            log_message('error', print_r($this->db->error(), true));
            show_error(lang('database_error'));



        }

}

public function checkPaymentExists($custdata){
    $this->db->where('user_id',$custdata['user_id']);
    $this->db->where('month',date('Y-m-d'));
    $query = $this->db->get('monthly_payment_tracks');
    if ($query->num_rows() > 0){
        return true;
    }
    else{
        return false;
    }
}


    public function getIncompleterOrders($date1)
    {
        $array = array('delivered =' => 0,'date ='=>$date1);
        $this->db->where($array);
        $result = $this->db->get('daily_sub_orders');
        
        return $result->result_array();    
    }

    public function getAllOrderstill()
    {
        $result = $this->db->get('daily_sub_orders');
        
        return $result->result_array();    
    }


    public function getcompleterOrders($date1)
    {
        $array = array('delivered =' => 1,'date ='=>$date1);
        $this->db->where($array);
        $result = $this->db->get('daily_sub_orders');
        
        return $result->result_array();    
    }

    public function getrejectedOrders($date1)
    {
        $array = array('delivered >=' => 2,'date ='=>$date1);
        $this->db->where($array);
        $result = $this->db->get('daily_sub_orders');
        
        return $result->result_array();    
    }

    


    public function SetDailydelivery($post)
    {
        $confirm_statusarr = array('delivered' => 1, 'time'=>$post['time']);    
        $this->db->where('sr_no', $post['sr_no']);
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('daily_sub_orders', $confirm_statusarr); 

        


    }

    public function RejectDelivery($post)
    {
        $confirm_statusarr = array('delivered' => 2, 'time'=>$post['time']);
        $this->db->where('sr_no', $post['sr_no']);
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('daily_sub_orders', $confirm_statusarr); 


    }

    public function EditDelivery($post)
    {
        $confirm_statusarr = array('delivered' => 0,);
        $this->db->where('sr_no', $post['sr_no']);
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('daily_sub_orders', $confirm_statusarr); 


    }

    public function getSubcspecific($get){
        $this->db->where('user_id', $get['user_id']);
        $result = $this->db->get('subscription_orders');
        return $result->result_array();
     }

     public function getMonthdetailsofUser($user_id,$date=""){
        if(empty($date)){
            $date = date('Y-m'); 
         } 
        $this->db->where('user_id', $user_id);
        $this->db->where('MONTH(date)', date("m" ,strtotime($date)));
        $this->db->where('YEAR(date)', date("Y" ,strtotime($date)));
        $result = $this->db->get('daily_sub_orders');
        return $result->result_array();
     }


     public function getRequestdetails($id){
        $this->db->where('user_id', $id);
        $result = $this->db->get('subscription_orders');
        return $result->result_array();
     }

     



}
