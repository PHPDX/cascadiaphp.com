<?php

namespace PHPDX\Site\Controller;

use League\Plates\Engine;
use PHPDX\Site\Meetup\EventList;
use PHPDX\Site\Meetup\PastEventList;

class HomeController
{

    /** @var \PHPDX\Site\Meetup\EventList */
    protected $list;

    /** @var \PHPDX\Site\Meetup\PastEventList */
    private $pastEventList;

    public function __construct(Engine $templates, EventList $list, PastEventList $pastEventList)
    {
        $this->templates = $templates;
        $this->list = $list;
        $this->pastEventList = $pastEventList;
    }

    public function home()
    {
        return $this->templates->render('home', [
            'eventList' => $this->list,
            'pastEventList' => $this->pastEventList
        ]);
    }

}
