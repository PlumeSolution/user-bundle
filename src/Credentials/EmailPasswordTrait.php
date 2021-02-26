<?php

namespace PlumeSolution\UserBundle\Credentials;

use PlumeSolution\UserBundle\Fields\EmailTrait;
use PlumeSolution\UserBundle\Fields\PasswordTrait;

trait EmailPasswordTrait
{
    use EmailTrait;
    use PasswordTrait;
}
