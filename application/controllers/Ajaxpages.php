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
        $this->load->model('Customers');
        $this->load->model('Offices');
    }

    public function orderadd() {
        $output = array('hi' => 'there');
        $data['viewdata'] = $output;
        $this->load->view('ajaxpages/orderadd', $data);
    }

    public function getitemslist() {
        $returnData = $this->Items->getItemsForAuto();
        echo json_encode($returnData);
        exit;
        $output = array('itemjson' => json_encode($returnData));
        $data['viewdata'] = $output;
        $this->encdec->returnjson($returnData);
    }

    public function createorder() {
        
        $postData = $this->input->post();
        $custPostData = json_decode($postData['custData']);
        $itemPostData = json_decode($postData['postdata']);
        
        // Check if customer already present, If not create one
        $custId = $this->Customers->checkByPhone($custPostData, true);
        
        $orderData['comment'] = 'Test comment';
        $orderData['customerNumber'] = $custId;
        
        // First create the Order Record
        $orderId = $this->Order->addOrder($orderData);        

        foreach ($itemPostData As $rowItem) {
            if ($rowItem->itemid !== "") {
                $rowItem->order_id = $orderId['order_id'];
                $this->Orderitem->addOrderItem($rowItem);
            }
        }
        
        $repData = array('status'=>'success', 'orderid'=>$orderId['order_id']);
        echo json_encode($repData);
    }
    
    public function getcustomerlist() {
        $returnData = $this->Customers->getCustomersForAuto();
        echo json_encode($returnData);
        exit;
        $output = array('itemjson' => json_encode($returnData));
        $data['viewdata'] = $output;
        $this->encdec->returnjson($returnData);
    }

    public function getorderdata(){
        $postData = $this->input->post();
        
        $orderData = $this->Order->getOrderDetail($postData['orderid']);
        $itemsData = $this->Orderitem->getOrderItems($postData['orderid']);
        $officeData = $this->Offices->getFirstOffice();
        
        $data['officeData'] = $officeData;
        $data['orderData'] = $orderData;
        $data['itemData'] = $itemsData;
        $this->load->view('ajaxpages/getorderdata', $data);
    }
}
