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
        $this->stock_list();
        $this->movement();
        $this->transactions();
        $this->players();
        
        $this->render();
    }

    private function init_setup() 
    {
        $this->load->model('transactions');
        $this->load->model('movements');
        $this->load->model('stocks');
        $this->load->model('users');
        $this->data['pagebody'] = 'overview';
        $this->data['title'] = 'Dashboard';
        $this->data['page_title'] = 'Stock Ticker Agent';
        $this->data['active_tab'] = 'Dashboard';
        $this->session->set_flashdata('redirectToCurrent', current_url());
    }
    
    public function stock_list() 
    {
        $this->data['stocks'] = $this->stocks->all('desc');
    }
    
    public function players()
    {
        $source = $this->users->all();
        $players = array();
        foreach ($source as $row)
        {
            $players[] = array('player' => $row->username, 'equity' => 0);
        }
        $this->data['players'] = $players;
    }
    
    public function movement()
    {
        $movement_data_filtered = $this->movements->all('desc');
        
        if (count($movement_data_filtered) > 10) {
            $movement_data_short = array_slice($movement_data_filtered, 0, 10);
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
    
    /*
     * Sets transaction data according to the type of stock from the most recent 
     * data. Default data is the most recent stock.
     */
    public function transactions() 
    {
        $transaction_data_filtered = $this->transactions->all('desc');
        
        if (count($transaction_data_filtered) > 10) {
            $transaction_data_short = array_slice($transaction_data_filtered, 0, 10);
        } else {
            $transaction_data_short = $transaction_data_filtered;
        }
        
        //change format of datetime field
        foreach($transaction_data_short as $key=>$value) {
            $dt = new DateTime();
            $dt->setTimestamp($value['datetime']);
            $transaction_data_short[$key]['datetime'] = $dt->format('Y-m-d H:i:s');
        }
        
        $this->data['transactions'] = $transaction_data_short;
    }
}