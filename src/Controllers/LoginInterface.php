<?php

namespace PSUserBundle\Controllers;

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
    public function __invoke(Request $request): Response;
}
