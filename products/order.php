<?php
class Basket{
    private $orderid;
    private $surName;
    private $emailAdres;
    private $paymentMethod;
    private $statusOrder;
    private $conn;
    // constructor with $db as database connection
    public function __construct($db){
    $this->conn = $db;
    }
    function getOrder(){

    }
    function setOrder(){

    }
    
}