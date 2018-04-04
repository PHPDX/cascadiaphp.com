<?php
declare(strict_types=1);

namespace CascadiaPHP\Site\Template;

use joshtronic\LoremIpsum;
use League\Plates\Engine;
use League\Plates\Extension\ExtensionInterface;

class LipsumExtension implements ExtensionInterface
{

    public function register(Engine $engine)
    {
        $engine->registerFunction('lipsum', [$this, 'lipsum']);
        $engine->registerFunction('placeholder', [$this, 'placeholder']);
    }

    public function placeholder(int $width, int $height, $grayscale = false)
    {
        return 'https://picsum.photos/' . ($grayscale ? 'g/' : '') . (string) $width . '/' . (string) $height;
    }

    public function lipsum(int $paragraphs = 1, bool $tags = false)
    {
        $lipsum = new LoremIpsum();
        return $lipsum->paragraphs($paragraphs, $tags);
    }
}
