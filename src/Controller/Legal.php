<?php

namespace CascadiaPHP\Site\Controller;

class Legal extends Controller
{

    protected $cssPath = '/css/pages/legal.css';

    public function terms()
    {
        return $this->render('pages/legal', ['content' => 'legal/terms']);
    }

    public function codeOfConduct()
    {
        return $this->render('pages/legal', ['content' => 'legal/coc']);
    }

}
