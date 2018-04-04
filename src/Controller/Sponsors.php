<?php

namespace CascadiaPHP\Site\Controller;

use League\Plates\Template\Template;
use Spatie\SchemaOrg\Schema;

class Sponsors extends Controller
{

    protected $cssPath = '/css/pages/brand.css';

    public function view(): Template
    {
        return $this->render('/pages/sponsors');
    }
}
