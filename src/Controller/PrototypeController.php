<?php

namespace CascadiaPHP\Site\Controller;

use League\Plates\Engine;

class PrototypeController
{

    /** @var Engine */
    protected $templates;

    public function __construct(Engine $templates)
    {
        $this->templates = $templates;
    }

    public function home()
    {
        return $this->templates->render('home');
    }

    public function subscribe()
    {
        return $this->templates->render('subscribe');
    }

}
