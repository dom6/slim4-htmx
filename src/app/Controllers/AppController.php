<?php

namespace App\Controllers;

use IMHR\Logging\DefaultAudit;
use IMHR\Logging\DefaultLogger;
use Psr\Container\ContainerInterface;

abstract class AppController
{
    public function __construct(ContainerInterface $container)
    {
        // TODO: Do what you need to here
    }

}
