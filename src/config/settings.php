<?php

use \Psr\Container\ContainerInterface;

return function (ContainerInterface $container) {
    $container->set('settings', function() {
        return [
            // Base Settings
            'app.name' => 'Slim4-HTMX',
            'base.path' => '/slim4-htmx',

            // Error Logging Settings
            'errors' => [
                'display.details' => true,
                'log.details' => true,
                'log.errors' => true,
            ],

            // Twig Settings
            'twig' => [
                'paths' => [
                    __DIR__ . '/../templates'
                ],
                'options' => [
                    'cache_enabled' => false,
                    'cache_path' => __DIR__ . '/../../tmp/twig',
                ],
            ]

        ];
    });
};
