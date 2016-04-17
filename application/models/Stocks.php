<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Stocks extends MY_Model2 {
    function __construct() {
        parent::__construct("data/stocks", "code");
    }
    
    function buy($stock, $quantity) {
        $team = $this->session->userdata('team_id');
        $token = $this->session->userdata('token');
        $player = $this->session->userdata('name');
        
        //DEBUG printouts
        /*
        echo "Team: ".$team;
        echo "<br />";
        echo "Token: ".$token;
        echo "<br />";
        echo "Player: ".$player;
        echo "<br />";
        echo "Stock: ".$stock;
        echo "<br />";
        echo "Quantity: ".$quantity;
        echo "<br />";
        */
        
        $xml = simplexml_load_file(BSX_SERVER."buy/?team=$team&token=$token&player=$player&stock=$stock&quantity=$quantity");
        
        //DEBUG
        /*
        echo "<br />";
        var_dump($xml);
        echo "<br />";
        */
        
        if (isset($xml->certificate)) {
            $this->certificates->add(array(
                'player' => $xml->player,
                'stock' => $xml->stock,
                'quantity' => $xml->quantity,
                'certificate' => $xml->certificate
            ));
            return "Successfully purchased $xml->quantity of $xml->stock";
        } else {
            return "Error: ".(string)$xml->message;
        }
    }
    
    function sell($stock, $quantity) {
        $this->load->model('certificates');
        
        $team = $this->session->userdata('team_id');
        $token = $this->session->userdata('token');
        $player = $this->session->userdata('name');
        $certificates = $this->certificates->getCertificates($player, $stock);
        $certificate = "";
        
        if ($certificates == null) {
            return "Error: No stock certificates found to sell.";
        } else {
            //grab the first available certificate from the database.
            foreach($certificates as $row) {
                $certificate = $row->certificate;
                break;
            }
        }
        
        $xml = simplexml_load_file(BSX_SERVER."sell/?team=$team&token=$token&player=$player&stock=$stock&quantity=$quantity&certificate=$certificate");
        
        //DEBUG
        echo "<br />";
        var_dump($xml);
        echo "<br />";
        
        return "Error: ".(string)$xml->message;
    }
}