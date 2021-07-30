<?php

use IMHR\Logging\DefaultAudit;
use IMHR\Logging\DefaultLogger;
use Psr\Container\ContainerInterface;

return function (ContainerInterface $container) {

    // TODO: If you have a custom logger you could implement it here
    //$container->set(Logger::class, function(ContainerInterface $container) {
    //    $setting = $container->get('settings');
    //    return new Logger($setting['app.name']);
    //});

};
