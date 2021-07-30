<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ApiController
{
    public function __construct(ContainerInterface $container)
    {
        // TODO: Implement your constructor
    }

    public function test(Request $request, Response $response, $params) : Response
    {
        $fake_data = [
            'item1' => 'Hello',
            'item2' => 'World'
        ];

        $response->getBody()->write(json_encode($fake_data, JSON_PRETTY_PRINT));

        return $response;
    }
}

