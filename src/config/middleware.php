<?php

use Slim\App;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

return function (App $app) {
    $setting = $app->getContainer()->get('settings');

    /**
     * The routing middleware should be added before the ErrorMiddleware
     * Otherwise exceptions thrown from it will not be handled
     */
    $app->addRoutingMiddleware();

    /**
     * Twig Middleware
     */
    $app->add(TwigMiddleware::createFromContainer($app, Twig::class));

    /**
     * Add Error Handling Middleware
     *
     * @param bool $displayErrorDetails -> Should be set to false in production
     * @param bool $logErrors -> Parameter is passed to the default ErrorHandler
     * @param bool $logErrorDetails -> Display error details in error log
     * which can be replaced by a callable of your choice.

     * Note: This middleware should be added last. It will not handle any exceptions/errors
     * for middleware added after it.
     */
    $app->addErrorMiddleware($setting['errors']['display.details'], $setting['errors']['log.errors'], $setting['errors']['log.details']);

};
