<?php

namespace PSUserBundle\Controllers;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface LoginInterface
{
    /**
     * Invoke on login route
     * internal function can be override for better adaptation for your app
     *
     * @param Request $request
     *
     * @return Response
     */
    function __invoke(Request $request): Response;

    /**
     * return redirect response (used if user is already logged)
     *
     * Override this for change redirection response
     *
     * @return Response
     */
    function redirectIfAlreadyLogged(): Response;

    /**
     * Generate login form
     *
     * Override this for change login form
     *
     * @return FormInterface
     */
    function getLoginForm(): FormInterface;

    /**
     * Rendering login template
     *
     * Override this for change login template
     *
     * @param FormInterface $form
     *
     * @return Response
     */
    function renderTemplate(FormInterface $form): Response;
}