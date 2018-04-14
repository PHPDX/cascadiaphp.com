<?php
declare(strict_types=1);

use CascadiaPHP\Site\Middleware\Dispatcher;
use CascadiaPHP\Site\Middleware\StaticFilesHandler;
use CascadiaPHP\Site\ProviderAggregate;
use League\Container\Container;
use League\Container\ReflectionContainer;
use Zend\Diactoros\Server;

// Composer autoload
require_once __DIR__ . '/../vendor/autoload.php';

$app = new Container(new ProviderAggregate);
$app->delegate(new ReflectionContainer());

// Tell the container to add our static file handler middleware to the stack
$app->inflector(Dispatcher::class, function(Dispatcher $dispatcher) {
    $middlewareStack = $dispatcher->getStack();
    array_unshift($middlewareStack, StaticFilesHandler::class);
    $dispatcher->setStack($middlewareStack);

    return $dispatcher;
});

$server = $app->get(Server::class);
$server->listen();
