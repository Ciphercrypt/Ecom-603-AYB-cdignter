<?php

class Cashondel_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getCoddetails()
    {
        $result = $this->db->get('cod_manage');
        return $result->result_array();
    }
   
    public function setCodvalues($city , $value)
    {
        if (!$this->db->insert('cod_manage', array(
            'city' => $city,
            'amount'=>$value
            ))) {
            log_message('error', print_r($this->db->error(), true));
            show_error(lang('database_error'));
        }
    }

    public function deleteCodvalue($id)
    {
        if (!$this->db->where('id', $id)->delete('cod_manage')) {
            log_message('error', print_r($this->db->error(), true));
            show_error(lang('database_error'));
        }
    }

}
