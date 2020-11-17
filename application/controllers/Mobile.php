<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mobile extends CI_Controller {

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

    public function mobilecompany() {
        
        $this->config->load('grocery_crud');
        $this->config->set_item('grocery_crud_dialog_forms', true);
        $this->config->set_item('grocery_crud_default_per_page', 10);

        $output1 = $this->mobilebrands();

        $output2 = $this->mobilephones();

        //$js_files = $output1->js_files + $output2->js_files + $output3->js_files;
        //$css_files = $output1->css_files + $output2->css_files + $output3->css_files;
        $output = "<h1>List 1</h1>" . $output1 . "<h1>List 2</h1>" . $output2;

        $this->_example_output((object) array(
                    'output' => $output
        ));
    }
    
    public function mobilebrands(){        
        $crud = new grocery_CRUD();
        $crud->set_table('mobile_company');
        $crud->columns('name', 'description');
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
