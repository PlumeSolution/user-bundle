<?php

namespace PSUserBundle\Models;

use PSUserBundle\Credentials\NicknamePasswordTrait;
use PSUserBundle\Fields\RolesTrait;

class NicknamePasswordUser extends BaseUser
{
    use NicknamePasswordTrait;
    use RolesTrait;

    public function __construct(?string $nickname, ?string $password, ?string $salt)
    {
        $this->setNickname($nickname);
        $this->setPassword($password);
        $this->setSalt($salt);
    }
}
