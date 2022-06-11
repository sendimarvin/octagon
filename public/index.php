<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require __DIR__ . '../../vendor/autoload.php';
require __DIR__ . '../../config/db.php';

// $config['displayErrorDetails'] = true;
// $config['addContentLengthHeader'] = false;

// $app = new \Slim\App(['settings' => $config]);


//USERS ROUTES
require __DIR__ . '/../routes/users.php';

$app->run();