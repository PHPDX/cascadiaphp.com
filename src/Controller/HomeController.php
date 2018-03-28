<?php

namespace CascadiaPHP\Site\Controller;

use League\Plates\Engine;
use League\Plates\Template\Template;

class HomeController
{

    /**
     * The main entry point for viewing the homepage
     */
    public function view(Engine $plates): Template
    {
        $template = $plates->make('pages/home');
        $template->layout('layout');

        $template = $this->renderSchema($template);
        $template = $this->renderCss($template);

        return $template;
    }

    /**
     * Render the schema in the controller as to not clutter the template
     * @param $template
     * @return \League\Plates\Template\Template
     */
    private function renderSchema(Template $template): Template
    {
        // Start the schema section
        $template->start('schema');

        // Echo out the stuff we want to be in the schema section
        echo $template->schema();

        // Stop the schema section
        $template->stop();

        return $template;
    }

    /**
     * Same thing with CSS
     * @param $template
     * @return \League\Plates\Template\Template
     */
    private function renderCss(Template $template): Template
    {
        // Start the css section
        $template->start('css');

        // Echo out the stuff we want to be in the css section
        echo $template->inline('/css/pages/home.css');

        // Stop the css section
        $template->stop();

        return $template;
    }
}
