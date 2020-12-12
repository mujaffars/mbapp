<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inventory extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');

        $this->output->set_template('default');
        $this->load->library('grocery_CRUD');
        $this->load->model('Uid');
        $this->load->model('Items');

        $this->load->js('assets/themes/default/js/jquery-1.9.1.min.js');
        $this->load->js('assets/themes/default/hero_files/bootstrap-transition.js');
        $this->load->js('assets/themes/default/hero_files/bootstrap-collapse.js');
    }

    public function _example_output($output = null) {
        $this->load->view('example.php', (array) $output);
    }

    public function stock_management() {
        try {
            $crud = new grocery_CRUD();

//            $crud->set_theme('datatables');
            $crud->set_table('stocks');
            $crud->set_subject('Stock');
            $crud->required_fields('item_id', 'quantity', 'price', 'date');

            $crud->display_as('item_id', 'Item');
            $crud->set_relation('item_id', 'items', 'name');
            
            $crud->unset_edit();
            $crud->columns('item_id', 'quantity', 'date');
            $crud->unset_columns('update_quntity_bkup');
            $crud->unset_fields('update_quntity_bkup');
           
            $crud->callback_after_insert(array($this,'add_item_stock'));
            $crud->callback_before_delete(array($this,'delete_item_stock'));
            
            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    
    public function add_item_stock($postData){
        // Minus and Plus the item stock quantity and update the quantity backup field
        $this->Items->addItemStock($postData);
    }

    public function delete_item_stock($postData){
        // Minus and Plus the item stock quantity and update the quantity backup field
        $this->Items->deleteItemStock($postData);
    }
}
