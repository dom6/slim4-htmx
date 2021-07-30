<?php

use Psr\Container\ContainerInterface;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;

return function(ContainerInterface $container) {

    $container->set(Twig::class, function(ContainerInterface $container) {
        $setting = $container->get('settings');

        $path = $setting['twig']['paths'][0];
        $options = $setting['twig']['options'];
        $options['cache'] = $options['cache_enabled'] ? $options['cache_path'] : false;

        $twig = Twig::create($path, $options);

        // Add Twig Extensions

        return $twig;
    });

};
