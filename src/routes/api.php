<?php

use Slim\App;
use Slim\Routing\RouteCollectorProxy;
use App\Controllers\ApiController;

return function(App $app) {

    /**
        $app->group('/api/v1', function(RouteCollectorProxy $group) {
            $group->get('/test', ApiController::class . ':test');
        });
     */

};


