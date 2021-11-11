<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// database connection will be here
// include database and object files
include_once '../config/database.php';
include_once '../objects/category.php';
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
// initialize object
$category = new Category($db);
// read products will be here
// query products
$result = $category->read();
$num = $result->num_rows;
// echo $num;
// check if more than 0 record found
if($num>0){
   // products array
   $categorys_arr=array();
   // product data ophalen
   $id = 0;
   while ($row = $result->fetch_assoc()){
       // extract row
       // this will make $row['name'] to
       // just $name only
       
       extract($row);
       $category_item=array(
           "sort" => $sort,
       );
       array_push($categorys_arr, $category_item);
   }
   // set response code - 200 OK
   http_response_code(200);
   var_dump($categorys_arr);
   //echo($category_arr[0]['id']);
}
else{
   // set response code - 404 Not found
   http_response_code(404);
   // tell the user no products found
   echo json_encode(
       array("message" => "Geen category gevonden")
   );
}
if ($_GET['edit'] = 1 ){
    $category->create();
    echo $_POST["sort"];
}
?>