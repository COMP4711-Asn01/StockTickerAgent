<?php

class Certificates extends MY_Model {
    function __construct() {
        parent::__construct("certificates", "certificate");
    }
    
    function removeStock($code) {
        $this->db->where("stock", $code);
        $object = $this->db->delete($this->_tableName);
    }
    
    function getCertificates($player, $stock) {
        $query = $this->db->query("SELECT certificate FROM $this->_tableName WHERE 'player'='$player' AND 'stock'='$stock'");

        if ($query->num_rows() > 0) {
            return $query->results();
        } else {
            return null;
        }
    }
}
