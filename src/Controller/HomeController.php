<?php

namespace PHPDX\Site\Controller;

use League\Plates\Engine;
use PHPDX\Site\Meetup\EventList;

class HomeController
{

    protected $list;

    public function __construct(Engine $templates, EventList $list)
    {
        $this->templates = $templates;
        $this->list = $list;
    }

    public function home()
    {
        return $this->templates->render('home', ['eventList' => $this->list]);
    }

}
