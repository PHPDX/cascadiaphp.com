<?php

namespace CascadiaPHP\Site\Template;

use League\Plates\Engine;
use League\Plates\Extension\ExtensionInterface;
use Parsedown;

class MarkdownExtension implements ExtensionInterface
{

    protected $parsedown;
    protected $directory;
    protected $extension;

    public function __construct(Parsedown $parsedown, $directory, $extension = '.md')
    {
        $this->parsedown = $parsedown;
        $this->directory = $directory;
        $this->extension = $extension;
    }

    public function register(Engine $engine)
    {
        $engine->registerFunction('markdown', [$this, 'render']);
    }

    /**
     * Render a markdown template
     * @param $template
     */
    public function render($template)
    {
        $file = $this->directory . '/' . $template . $this->extension;
        if (!file_exists($file)) {
            throw new \InvalidArgumentException('Markdown content "' . $template . '" not found.');
        }

        $markdown = file_get_contents($file);
        echo $this->parsedown->parse($markdown);
    }
}
