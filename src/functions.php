<?php

function area(string $name, \Concrete\Core\Page\Page $page) {
    return (new Concrete\Core\Area\Area($name))->display($page);
}

function globalArea(string $name, \Concrete\Core\Page\Page $page) {
    return (new Concrete\Core\Area\GlobalArea($name))->display($page);
}
