<?php
/**
 * @var \Psr\Container\ContainerInterface $container
 * @var \FastRoute\RouteCollector $r
 */

$r->get('/',  'CascadiaPHP\Site\Controller\Home::view');
$r->get('/news', 'CascadiaPHP\Site\Controller\News::view');
$r->get('/schedule', 'CascadiaPHP\Site\Controller\Schedule::view');
$r->get('/speakers', 'CascadiaPHP\Site\Controller\Speakers::view');
$r->get('/venue', 'CascadiaPHP\Site\Controller\Venue::view');
$r->get('/sponsors', 'CascadiaPHP\Site\Controller\Sponsors::view');

$r->get('/register', '\CascadiaPHP\Site\Controller\Register::view');
$r->post('/actually/register', '\CascadiaPHP\Site\Controller\Register::subscribe');

$r->get('/brand', function(\League\Plates\Engine $plates) {
    return $plates->make('pages/brand');
});
