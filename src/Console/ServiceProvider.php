<?php

namespace CascadiaPHP\Site\Console;

use Concrete\Core\Console\Application;
use Concrete\Core\Foundation\Service\Provider;

class ServiceProvider extends Provider
{

    /**
     * Registers the services provided by this provider.
     */
    public function register()
    {
        $this->app->extend(Application::class, function(Application $console) {
            $console->add($this->app->make(ImportSpeakersCommand::class));

            return $console;
        });
    }
}
