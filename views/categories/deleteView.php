<?php
include_once '../../config/database.php';
include_once '../../config/vars.php';
include_once '../../objects/category.php';
include_once '../../link.php';
$database = new Database();
$db = $database->getConnection();

// initialize object 
$category = new Category($db);

$result = $category->read();

$num = $result->num_rows;

// if (isset($_GET["id"]) && !empty($_GET["id"])) {
//     $id = $_GET["id"];
//     $row = "SELECT * FROM `category` WHERE id = $id";
// }

if ($num > 0) {
    // products array
    $categorys_arr = array();
    // product data ophalen
    $id = 0;
    while ($row = $result->fetch_assoc()) {
        // extract row
        // this will make $row['name'] to
        // just $name only

        extract($row);
        $category_item = array(
            "id" => $id,
        );
        array_push($categorys_arr, $category_item);
    }
    // set response code - 200 OK
    http_response_code(200);
    //echo($category_arr[0]['id']);
} else {
    // set response code - 404 Not found
    http_response_code(404);
    // tell the user no products found
    echo json_encode(
        array("message" => "Geen category gevonden")
    );
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>delete view</title>
</head>

<body>
    <h1>delete view</h1>
    <form action="<?php echo $url; ?>category/delete.php" method='POST'>
        <div class="form-group">
            <label class="control-label col-sm-2" for="naam">ID:</label>
            <div class="col-sm-6">
                <select name="id">
                    <?php
                    foreach ($categorys_arr as $row) {
                        echo '<option value="' . $row['id'] . '">' . $row['id'] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="naam">sort:</label>
            <div class="col-sm-6">
                <input type="text" name="sort" class="form-control" id="sort" placeholder="sort" required value='<?php echo $sort; ?>'>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="naam">naam:</label>
            <div class="col-sm-6">
                <input type="text" name="naam" class="form-control" id="naam" placeholder="naam" required value='<?php echo $naam; ?>'>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="beschrijving">beschrijving:</label>
            <div class="col-sm-6">
                <input type="text" name="beschrijving" class="form-control" id="beschrijving" placeholder="beschrijving" required value='<?php echo $beschrijving; ?>'>
            </div>
        </div>

        <button type="submit" name="update" class="btn btn-primary">delete</button>
    </form>
</body>

</html>