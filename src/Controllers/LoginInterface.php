<?php

namespace PSUserBundle\Controllers;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface LoginInterface
{
    function __invoke(Request $request): Response;

    function redirectIfAlreadyLogged(Request $request): ?Response;

    function getLoginForm(Request $request): FormInterface;

    function renderTemplate(FormInterface $form): Response;
}