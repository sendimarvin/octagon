<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Interop\Container\ContainerInterface as ContainerInterface;
use \Monolog\Logger;
use \Monolog\Handler\StreamHandler;


require '../vendor/autoload.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(['settings' => $config]);

$container = $app->getContainer();
$container['greeting'] = function  () {
    return 'Hello from container';
};

$app->get('/', function () {
    $this->greeting;
    echo "App finished running";
});

$app->run();