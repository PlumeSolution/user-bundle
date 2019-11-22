<?php

namespace PSUserBundle\Credentials;

use PSUserBundle\Fields\NicknameTrait;
use PSUserBundle\Fields\PasswordTrait;

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
    public function getUsername(): string
    {
        return $this->nickname;
    }
}