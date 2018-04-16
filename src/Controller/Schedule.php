<?php

namespace CascadiaPHP\Site\Controller;

use Psr\Http\Message\ResponseInterface;

class Schedule extends Controller
{

    protected $cssPath = '/css/pages/brand.css';

    public function view(): ResponseInterface
    {
        $this->seo()
            ->setTitle('Speaker Schedule for Cascadia PHP 2018')
            ->setDescription('Cascadia PHP is two full days of speakers. Here you\'ll find the schedule for each day ' .
                'as well as information for any after parties.');

        return $this->render('/pages/schedule', '/schedule');
    }
}
