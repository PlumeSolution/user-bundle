<?php

namespace PSUserBundle\Credentials;

use PSUserBundle\Fields\EmailTrait;
use PSUserBundle\Fields\PasswordTrait;

trait EmailPasswordTrait
{
    use EmailTrait;
    use PasswordTrait;
}
