<?php

class Items extends CI_Model {

    function __construct() {
        parent::__construct();
//        $userData = getUserData();
//        $this->UserId = $userData->UserId;
    }

    public function getSpecificStock($stockId) {
        $this->db->select('*');
        $this->db->where('id = ' . $stockId);
        $this->db->from('stocks');
        $rowData = $this->db->get()->row();
        if ($rowData) {
            return $this->db->get()->row();
        } else {
            return null;
        }
    }
}

?>
