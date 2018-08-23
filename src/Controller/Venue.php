<?php

namespace CascadiaPHP\Site\Controller;

use League\Plates\Template\Template;
use Psr\Http\Message\ResponseInterface;
use Spatie\SchemaOrg\Schema;

class Venue extends Controller
{

    protected $cssPath = '/css/pages/venue.css';

    public function view(): ResponseInterface
    {
        $this->seo()
            ->setTitle('Venue and Hotel for Cascadia PHP 2018 in Portland Oregon')
            ->setDescription('Cascadia PHP will be held in Portland Oregon in a conference center that doubles ' .
                'as our hotel. Check back here for directions and instructions for reaching the conference.');

        return $this->render('/pages/venue', '/venue');
    }
}
