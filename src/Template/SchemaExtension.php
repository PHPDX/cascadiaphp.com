<?php

namespace CascadiaPHP\Site\Template;

use League\Plates\Engine;
use League\Plates\Extension\ExtensionInterface;
use Spatie\SchemaOrg\Schema;

class SchemaExtension implements ExtensionInterface
{

    public function register(Engine $engine)
    {
        $engine->registerFunction('schema', [$this, 'schemaFactory']);
    }

    public function schemaFactory()
    {
    }
}
