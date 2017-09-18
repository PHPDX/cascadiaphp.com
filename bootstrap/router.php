<?php

return \FastRoute\simpleDispatcher(function(\FastRoute\RouteCollector $r) {
    $r->get('/', '\PHPDX\Site\Controller\HomeController::home');
    $r->get('/events', '\PHPDX\Site\Controller\EventsController::events');
});
