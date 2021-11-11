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
    <title>Create view</title>
</head>

<body>
    <h1>Create view</h1>
    <form action="<?php echo $url; ?>category/create.php" method='POST'>
        <div class="form-group">
            <label class="control-label col-sm-2" for="naam">sort:</label>
            <div class="col-sm-6">
                <input type="text" name="sort" class="form-control" id="sort" placeholder="sort" required>
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

        <button type="submit" name="update" class="btn btn-primary">create</button>
    </form>
</body>

</html>