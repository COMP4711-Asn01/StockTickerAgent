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
        stock_list();
        
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
    
    public function stock_list() 
    {
        $this->data['stocks'] = $this->stocks->all('desc');
    }
    
    public function movement()
    {
        if (count($this->stock_code) == 0 || strcmp($this->stock_code, 'recent') == 0) {
            $movement_data_filtered = $this->movements->all('desc');
        } else {
            $movement_data_filtered = $this->movements->some('code', $this->stock_code);
        }
        
        if (count($movement_data_filtered) > 20) {
            $movement_data_short = array_slice($movement_data_filtered, 0, 20);
        } else if (count($movement_data_filtered) == 0) {
            $movement_data_short = array();
            //Could add dummy entry
            //"seq","datetime","code","action","amount"
            /*
            $movement_data_short = array(
                'seq' => 'no data',
                'datetime' => 0,
                'code' => 'no data',
                'action' => 'no data',
                'amount' => 'no data'
            );
            */
        } else {
            $movement_data_short = $movement_data_filtered;
        }
        
        //change format of datetime field
        foreach($movement_data_short as $key=>$value) {
            $dt = new DateTime();
            $dt->setTimestamp($value['datetime']);
            $movement_data_short[$key]['datetime'] = $dt->format('Y-m-d H:i:s');
        }
        
        $this->data['movements'] = $movement_data_short;
    }
}