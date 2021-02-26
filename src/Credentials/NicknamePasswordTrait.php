<?php

namespace PlumeSolution\UserBundle\Credentials;

use PlumeSolution\UserBundle\Fields\NicknameTrait;
use PlumeSolution\UserBundle\Fields\PasswordTrait;

/**
 * Trait NicknamePasswordTrait
 *
 * @package PlumeSolution\UserBundle\Credentials
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
