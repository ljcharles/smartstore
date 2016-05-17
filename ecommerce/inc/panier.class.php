<?php

class panier{
    public function __construt(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
        
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array();
        }
    }
    
    public function add($product_id){
         $_SESSION['panier'][$product_id] = 1;
    }
}
