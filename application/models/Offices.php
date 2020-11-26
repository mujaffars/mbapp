<?php

class Offices extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getFirstOffice() {
        $this->db->trans_start();

        $this->db->select('*');
        $this->db->from('offices as of');
        $this->db->where('officeCode', 1);

        $itemData = $this->db->get()->row();
        return $itemData;
    }
}

?>
