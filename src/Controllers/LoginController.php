<?php

namespace PSUserBundle\Controllers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class LoginController extends AbstractController implements LoginInterface
{
    public function __construct()
    {
        // TODO: Implement __construct() method.
    }

    public function __invoke(Request $request): Response
    {
        // TODO: Implement __invoke() method.
    }

    function redirectIfAlreadyLogged(Request $request): ?Response
    {
        // TODO: Implement redirectIfAlreadyLogged() method.
    }

    function getLoginForm(Request $request): FormInterface
    {
        // TODO: Implement getLoginForm() method.
    }

    function renderTemplate(FormInterface $form): Response
    {
        // TODO: Implement renderTemplate() method.
    }
}