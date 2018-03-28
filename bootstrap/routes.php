<?php
/**
 * @var \Psr\Container\ContainerInterface $container
 * @var \FastRoute\RouteCollector $r
 */


// Homepage
$r->get('/', 'CascadiaPHP\Site\Controller\HomeController::view');

$r->get('/brand', function(\League\Plates\Engine $plates) {
    return $plates->make('pages/brand');
});
