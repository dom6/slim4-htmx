<?php

use DI\Container;
use Slim\Factory\AppFactory;

require_once __DIR__ . '/../vendor/autoload.php';

/**
 * Container Setup
 */
$container = new Container();

(require_once __DIR__ . '/config/settings.php')($container);
(require_once __DIR__ . '/config/logging.php')($container);
(require_once __DIR__ . '/config/templates.php')($container);
//(require_once __DIR__ . '/config/controllers.php')($container);

/**
 * Create and Setup Application
 */
$app = AppFactory::createFromContainer($container);
$setting = $app->getContainer()->get('settings');
//$app->setBasePath($setting['base.path']);

/**
 * Add Middleware Layers
 */
(require_once __DIR__ . '/config/middleware.php')($app);

/**
 * Route Definitions
 */
(require_once __DIR__ . '/routes/web.php')($app);
(require_once __DIR__ . '/routes/api.php')($app);
