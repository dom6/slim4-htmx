<?php

namespace App\Controllers;

use App\Models\Locations\LocationContext;
use App\Models\Products\ProductRepository;
use \DateTime;
use \DateTimeZone;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class DemoController extends AppController
{
    private $_view;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->_view = $container->get(Twig::class);
    }

    public function simple(Request $request, Response $response) : Response
    {
        $method = $request->getMethod();
        $params = ($method === 'POST') ? $request->getParsedBody() : $request->getQueryParams();

        return $this->_view->render($response, '/demos/responses/simple.twig', [
            'METHOD' => $method,
            'FIRST_NAME' => $params['firstname']
        ]);
    }

    public function indicator(Request $request, Response $response) : Response
    {
        $params = $request->getQueryParams();

        // Simulate 2 seconds of processing time
        sleep(2);

        return $this->_view->render($response, '/demos/responses/simple.twig', [
            'METHOD' => $request->getMethod(),
            'FIRST_NAME' => $params['firstname']
        ]);
    }

    public function append(Request $request, Response $response) : Response
    {
        $params = $request->getQueryParams();

        return $this->_view->render($response, '/demos/responses/contact-div.twig', [
            'FIRST_NAME' => $params['firstname'],
            'LAST_NAME' => $params['lastname'],
            'EMAIL' => $params['email']
        ]);
    }

    public function outOfBandSwap(Request $request, Response $response) : Response
    {
        $params = $request->getParsedBody();
        $simple = $this->_view->fetch('/demos/responses/simple.twig', ['METHOD' => $request->getMethod(), 'FIRST_NAME' => $params['name']]);
        $oob_swap = $this->_view->fetch('/demos/swapping/oob-swap-text.twig', [ 'TIME' => new DateTime('now', new DateTimeZone('America/Chicago')) ]);

        $response->getBody()->write($simple . $oob_swap);
        return $response;
    }

    public function include(Request $request, Response $response) : Response
    {
        $params = $request->getQueryParams();
        $location = $params['workLocation'];
        $start_date = $params['startDate'] ?? null;
        $end_date = $params['endDate'] ?? null;

        $context = new LocationContext($location, $start_date, $end_date);
        $context->validate();

        $start_date = $this->_view->fetch('/demos/fields/start-date.twig', ['START_DATE' => $start_date, 'MESSAGES' => $context->getValidationStatuses()]);
        $end_date = $this->_view->fetch('/demos/fields/end-date.twig', ['END_DATE' => $end_date, 'MESSAGES' => $context->getValidationStatuses() ]);

        $response->getBody()->write($start_date . $end_date);
        return $response;
    }

    public function search(Request $request, Response $response) : Response
    {
        $params = $request->getQueryParams();
        $query = $params['q'];

        if (!empty($query)) {
            $products = new ProductRepository();
            $results = $products->find($query);
        }

        return $this->_view->render($response, '/demos/search-results.twig', ['RESULTS' => $results ?? null, 'QUERY' => $query]);
    }

}
