<?php

namespace PHPDX\Site\Controller;

use League\Plates\Engine;
use PHPDX\Site\Meetup\EventList;

class EventsController
{

    protected $list;

    public function __construct(Engine $templates, EventList $list)
    {
        $this->templates = $templates;
        $this->list = $list;
    }

    public function events()
    {
        return $this->templates->render('events', ['eventList' => $this->list]);
    }

}
