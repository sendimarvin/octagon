<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(['settings' => $config]);


$app->get('/users', function (Request $request, Response $response, array $args) {

    $sql =  "SELECT * FROM users";
    try {
        $db = new DB();
        $conn = $db->connect();

        $stmt = $conn->query($sql);
        $users = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;
        $response->getBody()->write(json_encode($users));
        return $response
            ->withHeader('content-type', 'application/json');

    } catch (PDOException $e) {
        $error = array(
            "message" => $e->getMessage()
        );
        return $response
            ->withHeader('content-type', 'application/json')
            ->withStatus(500);
    }

});


$app->get('/users/{id}', function (Request $request, Response $response, array $args) {
    
    $sql =  "SELECT * FROM users WHERE id={$args['id']}";
    try {
        $db = new DB();
        $conn = $db->connect();

        $stmt = $conn->query($sql);
        $users = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;
        $response->getBody()->write(json_encode($users));
        return $response
            ->withHeader('content-type', 'application/json');

    } catch (PDOException $e) {
        $error = array(
            "message" => $e->getMessage()
        );
        return $response
            ->withHeader('content-type', 'application/json')
            ->withStatus(500);
    }

});
