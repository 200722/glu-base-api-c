<?php
include_once '../../config/database.php';
include_once '../../config/vars.php';
include_once '../../objects/product.php';
include_once '../../link.php';



$database = new Database();
$db = $database->getConnection();

// initialize object 
$product = new product($db);


$result = $product->read('');

$general_result = $product->read('');




if(isset($_GET['id'])){
    $result = $product->read($_GET['id']);
    $update_id = $_GET['id'];
}



// Get product by ID

$num = $result->num_rows;

if ($num > 0) {
    // products array
    $products_arr = array();
    // product data ophalen
    $id = 0;
    while ($row = $result->fetch_assoc()) {
        // extract row
        // this will make $row['name'] to
        // just $name only

        extract($row);
        $product_item = array(
            "id" => $id,
            "category_id" => $category_id,
            "naam" => $naam,
            "beschrijving" => $beschrijving,
            "prijs" => $prijs,
        );
        array_push($products_arr, $product_item);
    }
    // set response code - 200 OK
    http_response_code(200);
    //echo($product_arr[0]['id']);
} else {
    // set response code - 404 Not found
    http_response_code(404);
    // tell the user no products found
    echo json_encode(
        array("message" => "Geen product gevonden")
    );
}

$update_id = $products_arr[0]['id'];

// General query - Hidden 
$num = $general_result->num_rows;

if ($num > 0) {
    // products array
    $general_products_arr = array();
    // product data ophalen
    $id = 0;
    while ($row = $general_result->fetch_assoc()) {
        // extract row
        // this will make $row['name'] to
        // just $name only

        extract($row);
        $product_item = array(
            "id" => $id,
            "category_id" => $category_id,
            "naam" => $naam,
            "beschrijving" => $beschrijving,
            "prijs" => $prijs,
        );
        array_push($general_products_arr, $product_item);
    }
    // set response code - 200 OK
    http_response_code(200);
    //echo($product_arr[0]['id']);
} else {
    // set response code - 404 Not found
    http_response_code(404);
    // tell the user no products found
    echo json_encode(
        array("message" => "Geen product gevonden")
    );
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update view</title>
</head>

<body>
    <h1>Update view</h1>

    <form action="<?php echo $url; ?>views/products/updateView.php" method='GET'>
        <div class="form-group">
            <label class="control-label col-sm-2" for="naam">Product ophalen op ID:</label>
            <div class="col-sm-6">
                <select name="id">
                    <?php
                        foreach ($general_products_arr as $row) {
                            echo '<option value="' . $row['id'] . '" '.(($row['id'] == $update_id) ? 'selected' : '').'>' . $row['id'] . '</option>';
                        }
                    ?>
                </select>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    <form action="<?php echo $url; ?>product/update.php" method='POST'>
        <div class="form-group">
            <div class="col-sm-6">
                    <input type="hidden" name="id" value="<?php echo $update_id; ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="category_id">category_id:</label>
            <div class="col-sm-6">
                <input type="number" name="category_id" class="form-control" id="category_id" placeholder="category_id" required value='<?php echo $products_arr[0]['category_id']; ?>'>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="naam">naam:</label>
            <div class="col-sm-6">
                <input type="text" name="naam" class="form-control" id="naam" placeholder="naam" required value='<?php echo $products_arr[0]['naam'];; ?>'>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="beschrijving">beschrijving:</label>
            <div class="col-sm-6">
                <input type="text" name="beschrijving" class="form-control" id="beschrijving" placeholder="beschrijving" required value='<?php echo $products_arr[0]['beschrijving']; ?>'>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="prijs">prijs:</label>
            <div class="col-sm-6">
                <input type="number" name="prijs" class="form-control" id="prijs" placeholder="prijs" required value='<?php echo $products_arr[0]['prijs']; ?>'>
            </div>
        </div>


        <button type="submit" name="update" class="btn btn-primary">Update</button>
    </form>
</body>

</html>