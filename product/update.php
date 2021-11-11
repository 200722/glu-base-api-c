<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


// database connection will be here
// include database and object files

include_once '../config/database.php';
include_once '../objects/product.php';
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object 
$product = new product($db);
// Filling data

// Use setter
$product->set_id($_POST['id']);
$product->set_category_id($_POST['category_id']);
$product->set_naam($_POST['naam']);
$product->set_beschrijving($_POST['beschrijving']);
$product->set_prijs($_POST['prijs']);
 
echo $product->update($product);
