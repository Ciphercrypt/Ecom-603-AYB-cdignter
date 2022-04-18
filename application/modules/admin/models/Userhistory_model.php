<?php

class Userhistory_model extends CI_Model
{
    private $num_rows=5;
    public function __construct()
    {
        parent::__construct();
    }

   public function getuserdetails(){
    $result = $this->db->get('users_public');
    return $result->result_array();

   }
  public function  getUserorderdetails($id ,$page=0 ){

    $rowscount = $this->Public_model->getUserOrdersHistoryCount($id);
    $data['orders_history'] = $this->Public_model->getUserOrdersHistory($id, $this->num_rows, $page);

  }

   
}
