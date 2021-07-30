<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class PageController extends AppController
{
    private $_view;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);

        $this->_view = $container->get(Twig::class);
    }

    public function index(Request $request, Response $response, $params) : Response
    {
        return $this->_view->render($response, '/pages/home.twig', ['title' => 'HTML Over the Wire with Slim4 + HTMX']);
    }

    public function resources(Request $request, Response $response) : Response
    {
        return $this->_view->render($response, '/pages/resources.twig', [ 'title' => 'Resources' ]);
    }

    public function slides(Request $request, Response $response, array $args) : Response
    {
        $slide_number = $args['id'] ?? 1;
        return $this->_view->render($response, '/pages/slide.twig', ['number' => $slide_number]);
    }

    public function updateSlide(Request $request, Response $response, array $args) : Response
    {
        $slide_number = $args['id'] ?? 1;
        return $this->_view->render($response, '/slides/slide-' . $slide_number  . '.twig');
    }
}
