<?php

namespace CascadiaPHP\Site;

use League\Container\ServiceProvider\ServiceProviderAggregate;

class ProviderAggregate extends ServiceProviderAggregate
{

    protected $customProviders = [
        ServiceProvider::class,
        Controller\ServiceProvider::class,
        Template\ServiceProvider::class,
        Router\ServiceProvider::class,
        SEO\ServiceProvider::class,
        Phone\ServiceProvider::class,
    ];

    protected $booted = false;

    public function provides($service = null)
    {
        $this->boot();
        return parent::provides($service);
    }

    public function register($service = null)
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
