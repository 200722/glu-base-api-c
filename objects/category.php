<?php
// objects = class
class Category
{
    private $conn;
    private $table_name = "category";


    // object properties
    public $id;
    public $sort;
    public $naam;
    public $beschrijving;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Getters and setters

    function set_id($id)
    {
        $this->id = $id;
    }
    function get_id()
    {
        return $this->id;
    }
    function set_sort($sort)
    {
        $this->sort = $sort;
    }
    function get_sort()
    {
        return $this->sort;
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

    // read products
    function read()
    {
        // select all query
        $query = "SELECT * FROM " . $this->table_name;
        $result = $this->conn->query($query);
        return $result;
    }
    function create($category)
    {
        // insert query
        $sort = $category->get_sort();
        $naam = $category->get_naam();
        $beschrijving = $category->get_beschrijving();

        $query = "INSERT INTO category (sort, naam, beschrijving) VALUES ('$sort','$naam', '$beschrijving')";
        $result = $this->conn->query($query);
        if ($result === TRUE) {
            return "New record created successfully";
        } else {
            return "Error: <br>" . $this->conn->error;
        }
    }

    function update($category)
    {
        // select all query
        $id = $category->get_id();
        $sort = $category->get_sort();
        $naam = $category->get_naam();
        $beschrijving = $category->get_beschrijving();


        // select all query
        $query = "UPDATE category SET sort='$sort', naam='$naam', beschrijving='$beschrijving' WHERE id = '$id'";
        $result = $this->conn->query($query);
        if ($result === TRUE) {
            return "Record with id '$id' updated successfully";
        } else {
            return "Error: <br>" . $this->conn->error;
        }
    }
    function delete($category)
    {
        $id = $category->get_id();

        $query = "DELETE FROM `category` WHERE id = '$id' ";
        $result = $this->conn->query($query);
        if ($result === TRUE) {
            return "Record with id '$id' delete successfully";
        } else {
            return "Error: <br>" . $this->conn->error;
        }
    }
}
