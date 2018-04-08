<?php

namespace CascadiaPHP\Site\SEO;

use Artesaos\SEOTools\Contracts\MetaTags;
use Artesaos\SEOTools\Contracts\OpenGraph as OpenGraphContract;
use Artesaos\SEOTools\Contracts\TwitterCards as TwitterCardsContract;
use Artesaos\SEOTools\OpenGraph;
use Artesaos\SEOTools\SEOMeta;
use Artesaos\SEOTools\TwitterCards;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class ServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{

    protected $provides = [
        MetaTags::class,
        SEOMeta::class,
        TwitterCardsContract::class,
        TwitterCards::class,
        OpenGraph::class,
        OpenGraphContract::class,
        SEOTools::class,
        'schema'
    ];

    public function register()
    {
        $this->container->add(MetaTags::class, function() {
            return new SEOMeta($this->container->get(SEOMetaConfig::class));
        });
        $this->container->add(TwitterCardsContract::class, TwitterCards::class);
        $this->container->add(OpenGraphContract::class, OpenGraph::class);

        $this->container->share(SEOTools::class, function() {
            return new SEOTools($this->container);
        });
    }

    /**
     * Method will be invoked on registration of a service provider implementing
     * this interface. Provides ability for eager loading of Service Providers.
     *
     * @return void
     */
    public function boot()
    {
        // Oh god, I'm so sorry, but I want to use this library
        if (!class_exists(\Illuminate\Config\Repository::class)) {
            class_alias(SEOMetaConfig::class, \Illuminate\Config\Repository::class);
        }
        $this->container->add('schema', '');
    }
}
