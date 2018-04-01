<?php

namespace CascadiaPHP\Site\SEO;

use Artesaos\SEOTools\Contracts\MetaTags;
use Artesaos\SEOTools\Contracts\OpenGraph;
use Artesaos\SEOTools\Contracts\TwitterCards;
use League\Container\ContainerAwareInterface;
use League\Container\ContainerAwareTrait;
use Psr\Container\ContainerInterface;

class SEOTools extends \Artesaos\SEOTools\SEOTools implements ContainerAwareInterface
{

    use ContainerAwareTrait;

    private $metaTags;
    private $openGraph;
    private $twitterCards;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Get the meta tags from our proper container
     */
    public function metatags(): MetaTags
    {
        if (!$this->metaTags) {
            $this->metaTags = $this->container->get(MetaTags::class);
        }

        return $this->metaTags;
    }

    /**
     * Get the opengraph object from our proper container
     */
    public function opengraph(): OpenGraph
    {
        if (!$this->openGraph) {
            $this->openGraph = $this->container->get(OpenGraph::class);
        }

        return $this->openGraph;
    }

    /**
     * Get the twitter cards from our proper container
     */
    public function twitter(): TwitterCards
    {
        if (!$this->twitterCards) {
            $this->twitterCards = $this->container->get(TwitterCards::class);
        }

        return $this->twitterCards;
    }

}
