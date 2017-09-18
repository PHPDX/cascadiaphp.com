<?php

namespace PHPDX\Site;

use League\Container\ContainerInterface;
use League\Container\ServiceProvider\ServiceProviderAggregate;
use PHPDX\Site\Controller\ServiceProvider as ControllerProvider;
use PHPDX\Site\Meetup\ServiceProvider as MeetupProvider;

class ProviderAggregate extends ServiceProviderAggregate
{

    protected $customProviders = [
        ServiceProvider::class,
        MeetupProvider::class,
        ControllerProvider::class
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
        return parent::register($service);
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
