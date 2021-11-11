<?php
include_once '../../config/database.php';
include_once '../../config/vars.php';
include_once '../../link.php';
$database = new Database();
$db = $database->getConnection();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create view of product</title>
</head>

<body>
    <h1>Create view</h1>
    <form action="<?php echo $url; ?>product/create.php" method='POST'>
        <div class="form-group">
            <label class="control-label col-sm-2" for="category_id">category_id:</label>
            <div class="col-sm-6">
                <input type="number" name="category_id" class="form-control" id="category_id" placeholder="category_id" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="naam">naam:</label>
            <div class="col-sm-6">
                <input type="text" name="naam" class="form-control" id="naam" placeholder="naam" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="beschrijving">beschrijving:</label>
            <div class="col-sm-6">
                <input type="text" name="beschrijving" class="form-control" id="beschrijving" placeholder="beschrijving" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="prijs">prijs:</label>
            <div class="col-sm-6">
                <input type="number" name="prijs" class="form-control" id="prijs" placeholder="prijs" required>
            </div>
        </div>
        <button type="submit" name="update" id="gewijzigd_op" class="btn btn-primary">Create</button>
    </form>
</body>

</html>