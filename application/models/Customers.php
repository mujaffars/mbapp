<?php

class Customers extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getCustomersForAuto() {
        $this->db->select('*, phone As label, customerNumber As value');
        $this->db->from('customers');

        return $this->db->get()->result();
    }

    public function checkByPhone($custData, $createNew = false) {
        $phone = $custData->phone;
        $this->db->select('*');
        $this->db->from('customers');
        $this->db->where('phone', $phone);

        $custRecord = $this->db->get()->row();

        if ($custRecord) {
            return $custRecord->customerNumber;
        } else {
            if ($createNew) {
                return $this->create($custData);
            } else {
                return null;
            }
        }
    }

    public function create($data) {
        $insertArray = array(
            "contactFirstName" => $data->firstname,
            "contactLastName" => $data->lastname,
            "addressLine1" => $data->address,
            "phone" => $data->phone
        );

        $custId = 0;
        
        $this->db->trans_start();
        if ($this->db->insert("customers", $insertArray)) {
            $custId = $this->db->insert_id();
        }

        if ($this->db->trans_status() == FALSE) {
            $this->db->trans_rollback();
            $custId = 0;
        } else {
            $this->db->trans_commit();
        }
        return $custId;
    }

}

?>
