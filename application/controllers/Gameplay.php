<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Gameplay extends MY_Controller {
    function __construct() 
    {
        parent::__construct();
        $this->load->helper('url');
        $this->restrict(array(ROLE_PLAYER));
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
        $this->load->model('certificates');
        $this->data['pagebody'] = 'gameplay';
        $this->data['title'] = 'Gameplay';
        $this->data['page_title'] = 'Stock Ticker Agent';
        $this->data['active_tab'] = 'Gameplay';
        $this->data['name'] = $this->session->userdata('name');
        $this->session->set_flashdata('redirectToCurrent', current_url());
    }
    
    public function equity() 
    {
        
    }
    
    public function cash()
    {
        
    }
    
    public function marketStatus()
    {
        
    }
}