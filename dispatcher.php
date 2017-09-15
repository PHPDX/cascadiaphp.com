<?php
require_once __DIR__ . '/bootstrap/autoload.php';

// Create a new container
$app = require __DIR__ . '/bootstrap/app.php';

// Get the router
$router = require __DIR__ . '/bootstrap/router.php';
$app->share(\FastRoute\Dispatcher::class, $router);

// Get the middleware stack
$middlewares = new \Middlewares\Utils\Dispatcher([
    $app->get(\Middlewares\FastRoute::class),
    $app->get(\Middlewares\RequestHandler::class)
]);

// Set up templating
$templates = new \League\Plates\Engine(__DIR__ . '/templates');
$app->share(\League\Plates\Engine::class, $templates);

// Resolve the request from globals
$request = \Zend\Diactoros\ServerRequestFactory::fromGlobals();
$app->share(\Psr\Http\Message\ServerRequestInterface::class, $request);

// Create a new diactoros server
$server = \Zend\Diactoros\Server::createServerFromRequest(function($request) use ($middlewares) {
    return $middlewares->dispatch($request);
}, $request);

// Handle the incoming request
$server->listen();
