<?php

namespace CascadiaPHP\Site\Template;

use Spatie\SchemaOrg\Event;

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
 *
 * @see \CascadiaPHP\Site\Template\SchemaExtension::schemaFactory()
 * @method Event schema()
 *
 * @see \CascadiaPHP\Site\Template\LipsumExtension::placeholder()
 * @method string placeholder(int $width, int $height)
 *
 * @see \CascadiaPHP\Site\Template\LipsumExtension::lipsum()
 * @method string lipsum(int $paragraphs, bool $tags)
 */
class Template extends \League\Plates\Template\Template
{
}
