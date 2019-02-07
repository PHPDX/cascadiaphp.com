<?php

namespace CascadiaPHP\Site\Controller;

use Psr\Http\Message\ResponseInterface;

class Speakers extends Controller
{

    protected $cssPath = '/css/pages/speakers.css';

    public function view(): ResponseInterface
    {
        $this->seo()
            ->setTitle('Awesome speakers for Cascadia PHP 2019')
            ->setDescription('Our speaker lineup for Cascadia PHP 2019 in Portland Oregon. Check here for a list of ' .
                'the industry experts we are shipping in to speak to our community.');

        return $this->render('/pages/speakers', '/speakers');
    }

}
