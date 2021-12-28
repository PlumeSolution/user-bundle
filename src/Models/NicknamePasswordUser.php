<?php

namespace PlumeSolution\UserBundle\Models;

use PlumeSolution\UserBundle\Credentials\NicknamePasswordTrait;
use PlumeSolution\UserBundle\Fields\EqualTrait;
use PlumeSolution\UserBundle\Fields\RolesTrait;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

class NicknamePasswordUser extends BaseUser implements PasswordAuthenticatedUserInterface
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
