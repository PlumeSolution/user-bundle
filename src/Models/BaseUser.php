<?php

namespace PSUserBundle\Models;

use Symfony\Component\Security\Core\User\UserInterface;

abstract class BaseUser implements UserInterface
{
    public const ROLE_DEFAULT = 'User';
}