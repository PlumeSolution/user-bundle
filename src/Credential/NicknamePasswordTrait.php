<?php

namespace PSUserBundle\Credentials;

use PSUserBundle\Fields\NicknameTrait;
use PSUserBundle\Fields\PasswordTrait;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Trait NicknamePasswordTrait
 * @package PSUserBundle\Credentials
 * Used for provide Username/Password auth
 */
trait NicknamePasswordTrait
{
    use NicknameTrait;
    use PasswordTrait;

    /**
     * @return string
     */
    protected function getUsername() : string
    {
        return $this->nickname;
    }
}