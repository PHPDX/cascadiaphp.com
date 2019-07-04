<?php

function area(string $name, \Concrete\Core\Page\Page $page, callable $wrapper = null)
{
    $a = new Concrete\Core\Area\Area($name);

    if ($wrapper) {
        $wrapper($a);
    }

    return $a->display($page);
}

function globalArea(string $name, \Concrete\Core\Page\Page $page, callable $wrapper = null)
{
    $a = new Concrete\Core\Area\GlobalArea($name);

    if ($wrapper) {
        $wrapper($a);
    }

    return $a->display($page);
}
