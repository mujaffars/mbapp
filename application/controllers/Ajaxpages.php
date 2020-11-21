<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ajaxpages extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        
    }

    public function orderadd() {
        $output = array('hi'=>'there');
        $data['viewdata'] = $output;
        $this->load->view('ajaxpages/orderadd', $data);
    }

}
