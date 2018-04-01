<?php
/**
 * @var \Psr\Container\ContainerInterface $container
 * @var \FastRoute\RouteCollector $r
 */

$r->get('/', 'CascadiaPHP\Site\Controller\HomeController::view');

$r->get('/news',  function(\League\Plates\Engine $plates): string {
    return $plates->render('pages/news');
});

$r->get('/schedule',  function(\League\Plates\Engine $plates): string {
    return $plates->render('pages/schedule');
});

$r->get('/speakers',  function(\League\Plates\Engine $plates): string {
    return $plates->render('pages/speakers');
});

$r->get('/venue',  function(\League\Plates\Engine $plates): string {
    return $plates->render('pages/venue');
});

$r->get('/sponsors',  function(\League\Plates\Engine $plates): string {
    return $plates->render('pages/sponsors');
});

$r->get('/register', '\CascadiaPHP\Site\Controller\RegisterController::view');

$r->post('/actually/register', '\CascadiaPHP\Site\Controller\RegisterController::subscribe');

$r->get('/brand', function(\League\Plates\Engine $plates) {
    return $plates->make('pages/brand');
});