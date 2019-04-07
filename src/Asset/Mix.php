<?php

namespace CascadiaPHP\Site\Asset;

use Exception;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

/**
 * Class Mix
 *
 * @see https://github.com/laravel/framework/blob/e6c8aa0e39d8f91068ad1c299546536e9f25ef63/src/Illuminate/Foundation/Mix.php
 */
class Mix
{
    /**
     * Get the path to a versioned Mix file.
     *
     * @param string $path
     * @param string $manifestDirectory
     *
     * @return \Illuminate\Support\HtmlString|string
     *
     * @throws \Exception
     */
    public function __invoke($path, $manifestDirectory = '')
    {
        static $manifests = [];

        if (!Str::startsWith($path, '/')) {
            $path = "/{$path}";
        }

        if ($manifestDirectory && !Str::startsWith($manifestDirectory, '/')) {
            $manifestDirectory = "/{$manifestDirectory}";
        }

        if (file_exists($manifestDirectory . '/hot')) {
            $url = rtrim(rtrim(file_get_contents($manifestDirectory . '/hot')), '/');

            if (Str::startsWith($url, ['http://', 'https://'])) {
                return new HtmlString(substr($url, strpos($url, ':') + 1) . $path);
            }

            return new HtmlString("//localhost:8080{$path}");
        }

        $manifestPath = $manifestDirectory . '/mix-manifest.json';

        if (!isset($manifests[$manifestPath])) {
            if (!file_exists($manifestPath)) {
                throw new Exception('The Mix manifest does not exist.');
            }

            $manifests[$manifestPath] = json_decode(file_get_contents($manifestPath), true);
        }

        $manifest = $manifests[$manifestPath];

        if (!isset($manifest[$path])) {
            $exception = new Exception("Unable to locate Mix file: {$path}.");
            throw $exception;
        }

        return new HtmlString($manifestDirectory . $manifest[$path]);
    }
}
