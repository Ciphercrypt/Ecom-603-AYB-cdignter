<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'/libraries/lib/config_paytm.php');
require_once(APPPATH.'/libraries/lib/encdec_paytm.php'); 

class Payment extends MY_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('admin/Orders_model');
        $this->load->model('course');
    
    
}

?>
