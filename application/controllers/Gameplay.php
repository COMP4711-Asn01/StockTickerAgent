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
        
        $this->equity();
        $this->cash();
        $this->status();
        
        $this->stock_list();
        $this->portfolio();

        $this->render();
    }
    
    private function init_setup() 
    {
        $this->load->model('BSX');
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
    
    public function stock_list() 
    {
        $this->data['market'] = $this->stocks->all('desc');
    }
    
    public function status()
    {
        $this->data['round'] = $this->BSX->getRound();
        $this->data['state'] = $this->BSX->getState();
        $this->data['duration'] = $this->BSX->getDuration();
        $this->data['countdown'] = $this->BSX->getCountdown();
    }
    
    public function equity() 
    {
        $equity = 0;
        $this->data['equity'] = $equity;
    }
    
    public function cash()
    {
        $cash = 0;
        $this->data['cash'] = $cash;
    }
    
    public function portfolio()
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
        
        $this->data['portfolio'] = array();
        foreach($holdings as $key=>$value) {
            $this->data['portfolio'][] = array(
                'stock' => $key,
                'amount' => $value
            );
        }
        return;
    }
}