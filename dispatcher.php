<?php
// Composer autoload
require_once __DIR__ . '/vendor/autoload.php';

$app = new \League\Container\Container(new \CascadiaPHP\Site\ProviderAggregate);
$app->delegate(new \League\Container\ReflectionContainer());

$server = $app->get(\Zend\Diactoros\Server::class);

// Handle the incoming request
$server->listen();
