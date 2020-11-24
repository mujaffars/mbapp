<?php
class Items extends CI_Model {

    function __construct() {
        parent::__construct();
//        $userData = getUserData();
//        $this->UserId = $userData->UserId;
    }

    public function getItemsForAuto() {
        $this->db->select('name As label, id As value, price, gst');
        $this->db->from('items');
        $this->db->where('active', 'Y');
        
        return $this->db->get()->result();
    }

}

?>
