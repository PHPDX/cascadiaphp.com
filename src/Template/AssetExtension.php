<?php

namespace CascadiaPHP\Site\Template;

use League\Plates\Engine;
use League\Plates\Extension\ExtensionInterface;
use Zend\Diactoros\Uri;

class AssetExtension implements ExtensionInterface
{

    protected $pathToPublic;
    protected $map;

    public function __construct(string $pathToPublic)
    {
        $this->pathToPublic = $pathToPublic;
    }

    /**
     * Register onto the templating engine
     * @param Engine $engine
     */
    public function register(Engine $engine)
    {
        $engine->registerFunction('asset', [$this, 'file']);
        $engine->registerFunction('inline', [$this, 'inline']);
    }

    /**
     * Provide support for "hot" reloading
     *
     * @param string $file
     * @return string
     */
    public function file(string $file): string
    {
        $file = $this->resolvePath($file);
        if (file_exists($this->pathToPublic . '/hot')) {
            return rtrim(file_get_contents($this->pathToPublic . '/hot'), '/') . $file;
        }

        return $file;
    }

    public function inline(string $file): string
    {
        $file = $this->resolvePath($file);
        $uri = new Uri($file);
        $path = $this->pathToPublic . $uri->getPath();

        if (!file_exists($path)) {
            throw new \InvalidArgumentException('Invalid asset "' . $path . '", cannot include inline.');
        }

        return file_get_contents($path);
    }

    private function resolvePath($file)
    {
        if (!isset($this->map) && file_exists($this->pathToPublic . '/mix-manifest.json')) {
            $this->map = json_decode(file_get_contents($this->pathToPublic . '/mix-manifest.json'), true);
        }

        return $this->map[$file] ?? $file;
    }
}
