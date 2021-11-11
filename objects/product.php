<?php
// objects = class
class product
{
    private $conn;
    private $table_name = "product";


    // object properties
    public $id;
    public $category_id;
    public $naam;
    public $beschrijving;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Getters and setters

    // Create setter 
    function set_id($id)
    {
        $this->id = $id;
    }

     // Create getter 
    function get_id()
    {
        return $this->id;
    }
    function set_category_id($category_id)
    {
        $this->category_id = $category_id;
    }
    function get_category_id()
    {
        return $this->category_id;
    }

    function set_naam($naam)
    {
        $this->naam = $naam;
    }
    function get_naam()
    {
        return $this->naam;
    }

    function set_beschrijving($beschrijving)
    {
        $this->beschrijving = $beschrijving;
    }
    function get_beschrijving()
    {
        return $this->beschrijving;
    }

    function set_prijs($prijs)
    {
        $this->prijs = $prijs;
    }
    function get_prijs()
    {
        return $this->prijs;
    }

    // read products
    function read($id)
    {
        if ($id == '') {
            $where = '';
        } else {
            $where = " WHERE id = $id";
        }
        // select all query
        $query = "SELECT * FROM " . $this->table_name . $where;
        $result = $this->conn->query($query);
        return $result;
    }


    // create
    function create($product)
    {
        // insert query
        $category_id = $product->get_category_id();
        $naam = $product->get_naam();
        $beschrijving = $product->get_beschrijving();
        $prijs = $product->get_prijs();

        $query = "INSERT INTO product (category_id, naam, beschrijving,prijs) VALUES ('$category_id','$naam', '$beschrijving', '$prijs')";
        // echo $query;
        // echo $naam;
        $result = $this->conn->query($query);
        if ($result === TRUE) {
            return "New record created successfully";
        } else {
            return "Error: <br>" . $this->conn->error;
        }
    }

    // update
    function update($product)
    {

        // Useing getter 
        $id = $product->get_id();
        $category_id = $product->get_category_id();
        $naam = $product->get_naam();
        $beschrijving = $product->get_beschrijving();
        $prijs = $product->get_prijs();


        $query = "UPDATE product SET category_id='$category_id', naam='$naam', beschrijving='$beschrijving', prijs='$prijs' WHERE id = '$id'";
        $result = $this->conn->query($query);
        if ($result === TRUE) {
            return "Record with id '$id' updated successfully";
        } else {
            return "Error: <br>" . $this->conn->error;
        }
    }
    // delete
    function delete($product)
    {
        $id = $product->get_id();

        $query = "DELETE FROM `product` WHERE id = '$id' ";
        $result = $this->conn->query($query);
        if ($result === TRUE) {
            return "Record with id '$id' delete successfully";
        } else {
            return "Error: <br>" . $this->conn->error;
        }
    }
}
