<?php

namespace PSUserBundle\Credentials;

use PSUserBundle\Fields\EmailTrait;
use PSUserBundle\Fields\NicknameTrait;
use PSUserBundle\Fields\PasswordTrait;

trait EmailAndNicknamePasswordTrait
{
    use NicknameTrait;
    use EmailTrait;
    use PasswordTrait;


}
