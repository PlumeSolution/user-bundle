<?php

namespace PlumeSolution\UserBundle\Credentials;

use PlumeSolution\UserBundle\Fields\EmailTrait;
use PlumeSolution\UserBundle\Fields\NicknameTrait;
use PlumeSolution\UserBundle\Fields\PasswordTrait;

trait EmailAndNicknamePasswordTrait
{
    use NicknameTrait;
    use EmailTrait;
    use PasswordTrait;
}
