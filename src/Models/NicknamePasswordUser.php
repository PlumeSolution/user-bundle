<?php

namespace PlumeSolution\UserBundle\Models;

use PlumeSolution\UserBundle\Credentials\NicknamePasswordTrait;
use PlumeSolution\UserBundle\Fields\EqualTrait;
use PlumeSolution\UserBundle\Fields\RolesTrait;

class NicknamePasswordUser extends BaseUser
{
    use NicknamePasswordTrait;
    use RolesTrait;
    use EqualTrait;

    public function __construct(?string $nickname, ?string $password, ?string $salt)
    {
        $this->setNickname($nickname);
        $this->setPassword($password);
        $this->setSalt($salt);
    }
}
