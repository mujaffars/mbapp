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
            "comments" => $data['comment']
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

}

?>
