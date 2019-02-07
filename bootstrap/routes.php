<?php
/**
 * @var \Psr\Container\ContainerInterface $container
 * @var \FastRoute\RouteCollector $r
 */

$r->get('/', 'CascadiaPHP\Site\Controller\Home::view');
//$r->get('/news', 'CascadiaPHP\Site\Controller\News::view');
//$r->get('/schedule', 'CascadiaPHP\Site\Controller\Schedule::view');
$r->get('/speakers', 'CascadiaPHP\Site\Controller\Speakers::view');
$r->get('/venue', 'CascadiaPHP\Site\Controller\Venue::view');
$r->get('/sponsors', 'CascadiaPHP\Site\Controller\Sponsors::view');

$r->get('/register', '\CascadiaPHP\Site\Controller\Register::view');
//$r->get('/register/form', '\CascadiaPHP\Site\Controller\Register::form');
//$r->post('/actually/register', '\CascadiaPHP\Site\Controller\Register::subscribe');

// Phone stuff
$r->post('/phone/sms', '\CascadiaPHP\Site\Controller\Phone::sms');
$r->post('/phone/voice', '\CascadiaPHP\Site\Controller\Phone::voice');

// Legal
$r->get('/legal/terms', '\CascadiaPHP\Site\Controller\Legal::terms');
$r->get('/legal/coc', '\CascadiaPHP\Site\Controller\Legal::codeOfConduct');
$r->get('/legal', function() {
    return new \Zend\Diactoros\Response\RedirectResponse('/legal/terms', 301);
});

// Data powering speakers
$r->get('/data/speakers.json', function() {
    $json = json_decode(file_get_contents(__DIR__ . '/../resources/data/speakers.json'), true);
    $data = ['items' => array_values($json['speakers'])];

    return new \Zend\Diactoros\Response\JsonResponse($data);
});
