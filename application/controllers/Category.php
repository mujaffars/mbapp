<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        
        $this->output->set_template('default');
        $this->load->library('grocery_CRUD');
        
        $this->load->js('assets/themes/default/js/jquery-1.9.1.min.js');
        $this->load->js('assets/themes/default/hero_files/bootstrap-transition.js');
        $this->load->js('assets/themes/default/hero_files/bootstrap-collapse.js');
    }

    public function _example_output($output = null) {
        $this->load->view('example.php', (array) $output);
    }

    public function catlist() {        
        $crud = new grocery_CRUD();
        $crud->set_table('category');
        $crud->columns('name', 'description');
        $crud->required_fields('name');
        $output = $crud->render();
        $this->_example_output($output);
    }
    
    public function brandslist(){        
        $crud = new grocery_CRUD();
        $crud->set_table('item_brand');
        $crud->columns('name', 'description');
        
        $crud->display_as('category_id', 'Category');
        $crud->set_relation('category_id', 'category', 'name');
        $crud->required_fields('name', 'category_id');
        
        $output = $crud->render();
        $this->_example_output($output);
    }
    
    public function itemslist(){        
        $crud = new grocery_CRUD();
        $crud->set_table('items');
        $crud->columns('name', 'description', 'price', 'active');
        
        $crud->display_as('brand_id', 'Brand');
        $crud->set_relation('brand_id', 'item_brand', 'name');
        $crud->required_fields('name', 'price', 'brand_id', 'gst');
        $crud->set_rules('price','Price',array('numeric', 'required'));
        $crud->set_rules('gst','GST',array('numeric', 'required'));
//        $crud->set_rules('price','Price','required');
        
        $output = $crud->render();
        $this->_example_output($output);
    }

    public function mobilephones(){        
        $crud = new grocery_CRUD();
        $crud->set_table('mobile');
        $crud->columns('name', 'description', 'type');
        $output = $crud->render();
        $this->_example_output($output);
    }
}
