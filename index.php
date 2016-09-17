<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require './vendor/autoload.php';

spl_autoload_register(function ($classname) {
    require ("./classes/" . $classname . ".php");
});

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;
$config['db']['host']   = "localhost";
$config['db']['user']   = "root";
$config['db']['pass']   = "";
$config['db']['dbname'] = "TACO_FIESTA";
$app = new \Slim\App(["settings" => $config]);
$container = $app->getContainer();

$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    $pdo = new PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'],
        $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};


$app->get('/user/{id}', function (Request $request, Response $response, $args) {
    $userId = (int)$args['id'];
    $model = new UserModel($this->db);
    $user = $model->getUser($userId);
    $data = $user->getArray();
    return $response->withJson($data, 200);
});

$app->post('/create/user', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    $user = new UserEntity($data);
    $userModel = new UserModel($this->db);
    if($userModel->create($user))
    {
        return $response->withJson(array('Success' => true, 'Message' => 'User Created'), 201);
    }
    else
    {
        return $response->withJson(array('Success' => false, 'Message' => 'error occured creating user'), 400);
    }
});
$app->run();
?>