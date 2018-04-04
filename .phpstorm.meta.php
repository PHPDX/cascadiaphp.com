<?php
namespace PHPSTORM_META;

// $container->get(SomeClass::class)
override(\Psr\Container\ContainerInterface::get(0), map([
  '' => '@'
]));

// $container[SomeClass::class]
override(new \Psr\Container\ContainerInterface, map([
  '' => '@'
]));
