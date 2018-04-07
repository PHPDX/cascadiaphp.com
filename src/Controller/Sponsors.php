<?php

namespace CascadiaPHP\Site\Controller;

use League\Plates\Template\Template;
use Spatie\SchemaOrg\Schema;

class Sponsors extends Controller
{

    protected $cssPath = '/css/pages/brand.css';

    public function view(): Template
    {
        $this->seo()
            ->setTitle('Companies that helped make Cascadia PHP 2018 happen')
            ->setDescription('Cascadia PHP 2018 could not happen if not for our sponsors. They worked with us ' .
                'to help keep costs down for locals and to help elevate this event to something truly special. ' .
                'If you enjoyed the conference, make sure to give them some love!');

        return $this->render('/pages/sponsors');
    }
}
