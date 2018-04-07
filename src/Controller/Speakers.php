<?php

namespace CascadiaPHP\Site\Controller;

use League\Plates\Template\Template;
use Spatie\SchemaOrg\Schema;

class Speakers extends Controller
{

    protected $cssPath = '/css/pages/brand.css';

    public function view(): Template
    {
        $this->seo()
            ->setTitle('Awesome speakers for Cascadia PHP 2018')
            ->setDescription('Our speaker lineup for Cascadia PHP 2018 in Portland Oregon. Check here for a list of ' .
                'the industry experts we are shipping in to speak to our community.');

        return $this->render('/pages/speakers');
    }
}
