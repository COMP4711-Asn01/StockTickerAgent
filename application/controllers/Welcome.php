<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Welcome extends MY_Controller {
    function __construct() 
    {
        parent::__construct();
        $this->load->helper('url');
    }
    public function index() 
    {
        $this->init_setup();
        
        $this->render();
    }

    private function init_setup() 
    {
        $this->load->model('transactions');
        $this->load->model('stocks');
        $this->data['pagebody'] = 'dashboard';
        $this->data['title'] = 'Dashboard';
        $this->data['page_title'] = 'Stock Ticker Agent';
        $this->data['active_tab'] = 'Dashboard';
        $this->session->set_flashdata('redirectToCurrent', current_url());
    }
}