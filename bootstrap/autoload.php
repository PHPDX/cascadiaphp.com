<?php

// Composer autoload
require_once __DIR__ . '/../vendor/autoload.php';

// Load in .env
try {
    // Load in additional version stuff
    $env = new \Dotenv\Dotenv(__DIR__ . '/../', '.version');
    $env->load();

    // Load in the .env
    $env = new \Dotenv\Dotenv(__DIR__ . '/../');
    $env->load();
} catch (\Exception $e) {
}
