<?php

class Orderitem extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getItemsForAuto() {
        $this->db->select('name As label, id As value, price, gst');
        $this->db->from('items');
        $this->db->where('active', 'Y');

        return $this->db->get()->result();
    }

    public function addOrderItem($data) {
        $insertArray = array(
            "order_id" => $data['order_id'],
            "item_id" => $data['itemid'],
            "price" => $data['itemprice'],
            "quantity" => $data['itemquantity'],
            "gst" => $data['itemgst'],
            "discount" => $data['discount']
        );

        $flag = 1;
        $message = "Error While Create Customer";

        $this->db->trans_start();
        if ($this->db->insert("order_items", $insertArray)) {
            $flag = 0;
            $message = "Order item created successfully";
            $resultdata['order_item_id'] = $this->db->insert_id();
        }

        if ($this->db->trans_status() == FALSE) {
            $this->db->trans_rollback();
            $resultdata['code'] = 1;
            $resultdata['result'] = 'Error while Creating order item';
        } else {
            $this->db->trans_commit();
            $resultdata['code'] = $flag;
            $resultdata['result'] = $message;
        }
        return $resultdata;
    }

}

?>
