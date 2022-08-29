<?php

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Query\QueryBuilder;

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

function database(): Connection
{
    $connectionParams = [
        'dbname' => $_ENV['DB_DATABASE'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
        'host' => $_ENV['DB_HOST'],
        'driver' => 'pdo_mysql',
    ];
    $connection = DriverManager::getConnection($connectionParams);

    try {
        $connection->connect();
    } catch (\Doctrine\DBAL\Exception $e) {
    }

    return $connection;
}

function query(): QueryBuilder
{
    return database()->createQueryBuilder();
}

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $namespace = '\App\Controllers\\';

    $r->addRoute('GET', '/', $namespace . 'TopicsController@index');
    $r->addRoute('POST', '/quiz/start', $namespace . 'TopicsController@start');
    $r->addRoute(['GET', 'POST'], '/quiz/{topicId}/{userId}', $namespace . 'QuizController@index');
    $r->addRoute('GET', '/quiz/{topicId}/{userId}/result', $namespace . 'QuizController@result');
});

// Fetch method and URI from somewhere
$httpMethod = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo '404 Not Found';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo '405 Method Not Allowed';
        break;
    case FastRoute\Dispatcher::FOUND:
        [$controller, $method] = explode('@', $routeInfo[1]) ;
        $vars = $routeInfo[2];

        (new $controller)->$method($vars);

        break;
}
