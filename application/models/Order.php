<?php

class Order extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function addOrder($data) {
        $insertArray = array(
            "orderDate" => date('Y-m-d h:i:s'),
            "requiredDate" => date('Y-m-d h:i:s'),
            "shippedDate" => date('Y-m-d h:i:s'),
            "status" => "Complete",
            "comments" => $data['comment'],
            "customerNumber" => $data['customerNumber']
        );

        $flag = 1;
        $message = "Error While Create Customer";

        $this->db->trans_start();
        if ($this->db->insert("orders", $insertArray)) {
            $flag = 0;
            $message = "Order created successfully";
            $resultdata['order_id'] = $this->db->insert_id();
        }

        if ($this->db->trans_status() == FALSE) {
            $this->db->trans_rollback();
            $resultdata['code'] = 1;
            $resultdata['result'] = 'Error while Creating order';
        } else {
            $this->db->trans_commit();
            $resultdata['code'] = $flag;
            $resultdata['result'] = $message;
        }
        return $resultdata;
    }

    public function getOrderDetail($orderId){
        $this->db->trans_start();

        $this->db->select('od.orderNumber, od.orderDate, cs.*');
        $this->db->from('orders as od');
        $this->db->join('customers as cs', 'od.customerNumber = cs.customerNumber', 'left');
        $this->db->where('od.orderNumber', $orderId);

        $orderData = $this->db->get()->row();
        return $orderData;
    }
}

?>
