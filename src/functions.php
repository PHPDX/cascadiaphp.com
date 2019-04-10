<?php

function area(string $name, \Concrete\Core\Page\Page $page, string $blockStart = null, string $blockEnd = null)
{
    $a = new Concrete\Core\Area\Area($name);
    $blockStart && $a->setBlockWrapperStart($blockStart);
    $blockEnd && $a->setBlockWrapperEnd($blockEnd);

    return $a->display($page);
}

function globalArea(string $name, \Concrete\Core\Page\Page $page, string $blockStart = null, string $blockEnd = null)
{
    $a = new Concrete\Core\Area\GlobalArea($name);
    $blockStart && $a->setBlockWrapperStart($blockStart);
    $blockEnd && $a->setBlockWrapperEnd($blockEnd);

    return $a->display($page);
}
