<?php
// Require composer autoloader
require __DIR__ . '/vendor/autoload.php';

// Create Router instance
$router = new \Bramus\Router\Router();

// Define routes

$router->get('/testpagina', function()
{
    echo 'Hallo lezer, dit is een test';
});

$router->get('/foto/(\d+)', function($id)
{
    if($id <= 4 && $id >= 1){
         echo '<img src="http://localhost/glu-base-api/public/images/'.$id.'.jpg" alt="'.$id.'"  width="200" style="max-height: 200;"/>';
    }else{
        echo 'Foto is niet gevonden!';
    }
});

$router->get('/blog/nieuws', function()
{
    echo 'NEWS';
});

$router->set404(function() {
    header('HTTP/1.1 404 Not Found');
    // echo 'Pagina niet gevonden! 404';
});

$router->get('/login', function()
{
    echo '    <h1>Login</h1>
                <form action="http://localhost/glu-base-api/login" method="POST">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="username">Username:</label>
                        <div class="col-sm-6">
                            <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="password">Password:</label>
                        <div class="col-sm-6">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        </div>
                    </div>
                    
                    <button type="submit" name="login" id="login" class="btn btn-primary">login</button>
                </form>';
});

$router->before('POST', '/login', function() {
    if (isset($_POST['username'])) {
        echo 'Hallo '.$_POST['username'].'!';
        exit();
    }
});


// Run it!
$router->run();

?>