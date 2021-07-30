<?php

use \Psr\Container\ContainerInterface;

return function(ContainerInterface $container) {

    /**
     * Populate if you need custom dependency injection for your controller
     * and don't want to pass an entire container
     *
     * Example:
     * $container->set('HomeContoller', function(ContainerInterface $container) {
     *     $view = $container->get('view');
     *     $db = $container->get('db');
     *     return new HomeController($view, $db);
     * });
     *
     */

};
