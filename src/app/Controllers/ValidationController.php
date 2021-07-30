<?php

namespace App\Controllers;

use App\Validations\IsEmpty;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use App\Validations\EmailValidator;

class ValidationController extends AppController
{
    private $_view;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->_view = $container->get(Twig::class);
    }

    public function validateName(Request $request, Response $response) : Response
    {
        $params = $request->getQueryParams();
        $name = $params['name'];

        $is_empty = new IsEmpty($name);

        return $this->_view->render($response, '/demos/name-field.twig', [
            'NAME' => $name,
            'NAME_IS_EMPTY' => $is_empty->validate()
        ]);
    }

    public function validateEmailAddress(Request $request, Response $response) : Response
    {
        $params = $request->getQueryParams();
        $email = $params['email'];

        $validator = new EmailValidator($email);
        $is_valid = $validator->validate();

        return $this->_view->render($response, '/demos/email-field.twig', [
            'EMAIL_ADDRESS' => $email,
            'INVALID_EMAIL_ADDRESS' => !$is_valid
        ]);
    }
}
