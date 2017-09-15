<?php
$app = new \League\Container\Container();
$app->delegate(new \League\Container\ReflectionContainer());

// Bind some other stuff
$app->share(\Psr\Container\ContainerInterface::class, $app);
$app->add(\Middlewares\RequestHandler::class, function() use ($app) {
    $resolver = new \Middlewares\Utils\CallableResolver\ContainerResolver($app);
    return new \Middlewares\RequestHandler($resolver);
});

return $app;
