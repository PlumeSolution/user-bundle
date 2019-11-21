<?php

namespace PSUserBundle\Models;

use PSUserBundle\Credentials\NicknamePasswordTrait;
use PSUserBundle\Fields\RolesTrait;

class NicknamePasswordUser extends BaseUser
{
    use NicknamePasswordTrait;
    use RolesTrait;
}