<?php

namespace CascadiaPHP\Site\Template;

use League\Container\ContainerAwareInterface;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Uri;

class ServiceProvider extends AbstractServiceProvider
{

    // Classes this provider provides
    protected $provides = [
        Engine::class,
        MarkdownExtension::class,
        AssetExtension::class
    ];

    // Plates extensions we load
    protected $extensions = [
        MarkdownExtension::class,
        TimeExtension::class,
        AssetExtension::class,
        UriExtension::class,
        SchemaExtension::class,
        LipsumExtension::class
    ];

    /**
     * Use the register method to register items with the container via the
     * protected $this->container property or the `getContainer` method
     * from the ContainerAwareTrait.
     *
     * @return void
     */
    public function register()
    {
        // Set up templating
        $this->container->share(Engine::class, function() {
            return $this->getTemplateEngine();
        });

        // Set up extensions
        $this->container->add(MarkdownExtension::class, function() {
            $parsedown = $this->container->get(\Parsedown::class);
            return new MarkdownExtension($parsedown, __DIR__ . '/../../content');
        });

        // Set up extensions
        $this->container->add(AssetExtension::class, function() {
            return new AssetExtension(__DIR__ . '/../../resources');
        });
    }

    private function getTemplateEngine()
    {
        $engine = new Engine(__DIR__ . '/../../templates');

        // Make sure 'container' is available in all templates
        $engine->addData([
            'container' => $this->container
        ]);

        // Load up our declared extensions
        foreach ($this->extensions as $extension) {
            $extension = $this->getContainer()->get($extension);

            // Handle container awareness
            if ($extension instanceof ContainerAwareInterface) {
                $extension->setContainer($this->getContainer());
            }

            $engine->loadExtension($extension);
        }

        return $engine;
    }
}
