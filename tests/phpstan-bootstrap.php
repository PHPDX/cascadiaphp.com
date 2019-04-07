<?php

const C5_EXECUTE = 1;
const DIR_BASE = __DIR__ . '/../public';

// Load up concrete5's constants
require_once DIR_BASE . '/concrete/bootstrap/configure.php';

// Load up class aliases
$config = require_once DIR_BASE . '/concrete/config/app.php';
$aliases = $config['aliases'] ?? [];
spl_autoload_register(function($class) use ($aliases) {
    if (isset($aliases[$class])) {
        class_alias($aliases[$class], $class);
        return true;
    }

    return false;
}, false, false);

foreach ($aliases as $alias => $original) {
    @class_alias($alias, $original, false);
}

require_once DIR_BASE . '/concrete/bootstrap/autoload.php';

spl_autoload_register(function($class) {
    $matches = [];

    if (!preg_match('/^\\\\?Concrete\\\\Package\\\\(.+?)\\\\(.+?)(?:\\\\(.+))?$/', $class, $matches)) {
        return false;
    }

    [$fullMatch, $package, $section, $subnamespace] = $matches;

    $subpath = str_replace('\\', '/', $subnamespace);
    $package = snake_case($package);
    $mappedSection = strtolower($section);

    if ($subpath) {
        $map = [
            'Theme' => 'themes',
            'Block' => 'blocks',
            'Controller' => 'controllers'
        ];
        if ($map[$section]) {
            $mappedSection = $map[$section];
            $exploded = explode('/', $subpath);
            $exploded = array_map('snake_case', $exploded);
            $subpath = strtolower(implode('/', $exploded));
        }
    }

    $subpath = $subpath ? $mappedSection . "/" . $subpath : $mappedSection;
    $path = DIR_BASE . "/packages/{$package}/{$subpath}.php";

    if (file_exists($path)) {
        require_once $path;
        return true;
    }

    return false;
}, false, false);
