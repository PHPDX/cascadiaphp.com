<?php

namespace CascadiaPHP\Site\Controller;

use League\Plates\Template\Template;
use Spatie\SchemaOrg\Schema;

class Schedule extends Controller
{

    protected $cssPath = '/css/pages/brand.css';

    public function view(): Template
    {
        $this->seo()
            ->setTitle('Speaker Schedule for Cascadia PHP 2018')
            ->setDescription('Cascadia PHP is two full days of speakers. Here you\'ll find the schedule for each day ' .
                'as well as information for any after parties.');

        return $this->render('/pages/schedule');
    }
}
