<?php

namespace PSUserBundle\Controllers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class LoginController extends AbstractController implements LoginInterface
{
    /**
     * @inheritDoc
     */
    public function __invoke(Request $request): Response
    {
        if ($this->isGranted('IS_AUTHENTICATED_FULLY'))
        {
            return $this->redirectIfAlreadyLogged();
        }

        $form = $this->getLoginForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            return $this->redirectIfAlreadyLogged();
        }

        return $this->renderTemplate($form);
    }

    /**
     * @inheritDoc
     */
    protected function redirectIfAlreadyLogged(): Response
    {
        return $this->redirect('/');
    }

    /**
     * @inheritDoc
     */
    protected function getLoginForm(): FormInterface
    {
        return $this->createForm('PSUserBundle\Form\LoginType');
    }

    /**
     * @inheritDoc
     */
    protected function renderTemplate(FormInterface $form): Response
    {
        return $this->render('@PSUser/Login/login.html.twig', ['form' => $form]);
    }
}
