<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . './../autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");

    return $response;
});
$app->get('/1', function (Request $request, Response $response, $args) {
 //  var_dump( $request);
    $response->getBody()->write("我是新建的的1在路由上可以找到我哦!");

    var_dump($args);
    return $response;
});
$app->get('/2', function (Request $request, Response $response, $args) {




    // include "1.php";
    //$response->getBody()->write("我是新建的的2!");
     return header("Location:1.php");
});

$app->get('', function (Request $request, Response $response, $args) {
    $response->getBody()->write("404");
    return $response;
});


$app->run();