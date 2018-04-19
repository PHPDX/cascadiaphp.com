<?php

namespace CascadiaPHP\Site\Controller;

class Legal extends Controller
{

    protected $cssPath = '/css/pages/legal.css';

    public function terms()
    {
        return $this->render('pages/legal', '/legal/terms', ['content' => 'legal/terms']);
    }

    public function codeOfConduct()
    {
        return $this->render('pages/legal', '/legal/coc', ['content' => 'legal/coc', 'title' => 'Code of Conduct']);
    }

}
