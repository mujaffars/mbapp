<?php

class Items extends CI_Model {

    function __construct() {
        parent::__construct();
//        $userData = getUserData();
//        $this->UserId = $userData->UserId;
    }

    public function getSpecificItem($itemId) {
        $this->db->select('*');
        $this->db->where('id = ' . $itemId);
        $this->db->from('items');
        $rowData = $this->db->get()->row();
        if ($rowData) {
            return $rowData;
        } else {
            return null;
        }
    }

    public function getItemsForAuto() {
        $this->db->select('name As label, id As value, price, gst');
        $this->db->from('items');
        $this->db->where('active', 'Y');

        return $this->db->get()->result();
    }

    public function addItemStock($postData) {
        // Get Item record
        $itemData = $this->getSpecificItem($postData['item_id']);

        $this->db->protect_identifiers = FALSE;

        if ($itemData) {
            $data = array(
                array(
                    'id' => $postData['item_id'],
                    'stock' => ($itemData->stock + $postData['quantity'])
                )
            );
            $this->db->update_batch('items', $data, 'id');
        }
    }

    public function deleteItemStock($stock_id) {
        
        // Get Stock record
        $stockData = $this->getSpecificStock($stock_id);
        
        // Get item record
        $itemData = $this->getSpecificItem($stockData->item_id);
        
        $this->db->protect_identifiers = FALSE;

        if ($itemData) {
            $data = array(
                array(
                    'id' => $stockData->item_id,
                    'stock' => ($itemData->stock - $stockData->quantity)
                )
            );
            $this->db->update_batch('items', $data, 'id');
        }
    }

    public function getSpecificStock($stockId) {
        $this->db->select('*');
        $this->db->where('id = ' . $stockId);
        $this->db->from('stocks');
        $rowData = $this->db->get()->row();
        
        if ($rowData) {
            return $rowData;
        } else {
            return null;
        }
    }
}

?>
