<?php

namespace CascadiaPHP\Site\Template;

/**
 * This class is only used for highlighting
 *
 * @see \CascadiaPHP\Site\Template\MarkdownExtension::render()
 * @method string markdown($file)
 *
 * @see \CascadiaPHP\Site\Template\TimeExtension::instance()
 * @method TimeExtension time()
 *
 * @see \CascadiaPHP\Site\Template\UriExtension::fullUri()
 * @method Uri fullUri(string $path)
 *
 * @see \CascadiaPHP\Site\Template\UriExtension::formUri()
 * @method string formUri(string $path)
 */
class Template extends \League\Plates\Template\Template
{
}
