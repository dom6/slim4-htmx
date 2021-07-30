<?php

use App\Controllers\PageController;
use App\Controllers\DemoController;
use App\Controllers\ValidationController;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

return function(App $app) {

    $app->get('/', PageController::class . ':index')->setName('home');
    $app->get('/resources', PageController::class . ':resources')->setName('resources');

    $app->get('/slide[/{id}]', PageController::class . ':slides')->setName('slides');
    $app->get('/slide-htmx/{id}', PageController::class . ':updateSlide')->setName('update-slide');

    $app->group('/demos', function (RouteCollectorProxy $demos) {
        // Simple Forms
        $demos->get('/simple-get-form', DemoController::class . ':simple')->setName('simple-get-form');
        $demos->post('/simple-post-form', DemoController::class . ':simple')->setName('simple-post-form');
        $demos->get('/simple-with-indicator', DemoController::class . ':indicator')->setName('simple-get-with-indicator');
        $demos->get('/simple-append-results', DemoController::class . ':append')->setName('simple-append-results');
        $demos->post('/out-of-band-swap', DemoController::class . ':outOfBandSwap')->setName('out-of-band-swap');
        $demos->get('/include', DemoController::class . ':include')->setName('include');
        $demos->get('/search', DemoController::class . ':search')->setName('search');

        // Validations
        $demos->get('/validate-name', ValidationController::class . ':validateName')->setName('validate-name');
        $demos->get('/validate-email', ValidationController::class . ':validateEmailAddress')->setName('validate-email');
    });

};


