<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Portfolio extends MY_Controller {
    function __construct() 
    {
        parent::__construct();
        $this->load->helper('url');
        $this->restrict(array(ROLE_ADMIN, ROLE_PLAYER));
    }
    public function index() 
    {
        $this->init_setup();
        $this->activity();
        $this->holdings();
        $this->render();
    }
    private function init_setup() 
    {
        $this->load->model('transactions');
        $this->load->model('stocks');
        $this->load->model('certificates');
        $this->data['pagebody'] = 'portfolio';
        $this->data['title'] = 'Portfolio';
        $this->data['page_title'] = 'Stock Ticker Agent';
        $this->data['active_tab'] = 'Portfolio';
        $this->data['name'] = $this->session->userdata('name');
        $this->session->set_flashdata('redirectToCurrent', current_url());
    }
    
    public function holdings()
    {
        $holdings = array();
        $stocks = $this->stocks->all();
        
        foreach($stocks as $stock) {
            $holdings[$stock['code']] = 0;
        }
        
        $certificates = $this->certificates->some('player', $this->session->userdata('name'));
        //count owned stocks
        foreach($certificates as $row) {
            if (array_key_exists($row->stock, $holdings)) {
                $holdings[$row->stock] += $row->quantity;
            } else {
                //remove delisted stocks
                $this->certificates->removeStock($row->stock);
            }
        }
        
        $this->data['holdings'] = array();
        foreach($holdings as $key=>$value) {
            $this->data['holdings'][] = array(
                'stock' => $key,
                'amount' => $value
            );
        }
        return;
    }
    
    
    public function activity() 
    {
        $activity_data = $this->transactions->all();
        $activity = array();
        
        $selectedPlayer = 'recent';
        
        if(isset($_POST['player_info']))
        {
            $selectedPlayer = $_POST['player_info'];
        }
        
        if(is_null($selectedPlayer) || $selectedPlayer == 'recent') 
        {
            $selectedPlayer = $this->session->userdata('name');
        }
        
        foreach($activity_data as $data)
        {
            if($data['player'] == $selectedPlayer) // Filtering for type of stock
            { 
                $activity[] = array(
                 'datetime'      => $data['datetime'],
                 'stock'         => $data['stock'],
                 'transaction'   => $data['trans'],
                 'quantity'      => $data['quantity']
                );
            }
        }
        $this->data['transactions'] = $activity;
    }
    
    public function buy($stock, $quantity) {
        $this->load->model('stocks');
        
        $result = $this->stocks->buy($stock, $quantity);
        
        $this->data['pagebody'] = 'transaction_results';
        $this->data['title'] = 'Portfolio';
        $this->data['page_title'] = 'Stock Ticker Agent';
        $this->data['active_tab'] = 'Portfolio';
        $this->data['name'] = $this->session->userdata('name');
        $this->session->set_flashdata('redirectToCurrent', current_url());
        $this->data['message'] = $result;
        
        $this->render();
    }
    
    public function sell($stock, $quantity) {
        $this->load->model('stocks');
        
        $result = $this->stocks->sell($stock, $quantity);
        
        $this->data['pagebody'] = 'transaction_results';
        $this->data['title'] = 'Portfolio';
        $this->data['page_title'] = 'Stock Ticker Agent';
        $this->data['active_tab'] = 'Portfolio';
        $this->data['name'] = $this->session->userdata('name');
        $this->session->set_flashdata('redirectToCurrent', current_url());
        $this->data['message'] = $result;
        
        $this->render();
    }
}