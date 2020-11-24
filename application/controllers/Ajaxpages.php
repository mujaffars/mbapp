<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ajaxpages extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Items');
        $this->load->model('Order');
        $this->load->model('Orderitem');
    }

    public function orderadd() {
        $output = array('hi' => 'there');
        $data['viewdata'] = $output;
        $this->load->view('ajaxpages/orderadd', $data);
    }

    public function getitemslist() {
        $returnData = $this->Items->getItemsForAuto();
//        foreach($returnData As $rowKey=>$rowVal){
//            
//        }
        echo json_encode($returnData);
        exit;
        $output = array('itemjson' => json_encode($returnData));
        $data['viewdata'] = $output;
        $this->encdec->returnjson($returnData);
    }

    public function createorder() {
        $postData = $this->input->post();
        $postData['comment'] = 'Test comment';
        // First create the Order Record
        $orderId = $this->Order->addOrder($postData);

        foreach ($postData As $rowItem) {
            $rowItem['order_id'] = $orderId['order_id'];
            $this->Orderitem->addOrderItem($rowItem);
        }
        exit;
    }

}
