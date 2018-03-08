<?php

namespace CascadiaPHP\Site;

use League\Container\ServiceProvider\ServiceProviderAggregate;
use CascadiaPHP\Site\Controller\ServiceProvider as ControllerProvider;
use CascadiaPHP\Site\Meetup\ServiceProvider as MeetupProvider;
use CascadiaPHP\Site\Router\ServiceProvider as RouterProvider;
use CascadiaPHP\Site\Template\ServiceProvider as TemplateProvider;

class ProviderAggregate extends ServiceProviderAggregate
{

    protected $customProviders = [
        ServiceProvider::class,
        ControllerProvider::class,
        TemplateProvider::class,
        RouterProvider::class
    ];

    protected $booted = false;

    public function provides($service)
    {
        $this->boot();
        return parent::provides($service);
    }

    public function register($service)
    {
        $this->boot();
        parent::register($service);
    }

    private function boot()
    {
        if (!$this->booted) {
            $this->booted = true;
            foreach ($this->customProviders as $provider) {
                $this->add($provider);
            }
        }
    }

}
