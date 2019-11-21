<?php

namespace PSUserBundle\Models;

use Symfony\Component\Security\Core\User\UserInterface;

abstract class BaseUser implements UserInterface
{
    public const ROLE_DEFAULT = 'User';

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}