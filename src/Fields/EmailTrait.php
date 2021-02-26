<?php

namespace PSUserBundle\Fields;

use Doctrine\ORM\Mapping as ORM;

trait EmailTrait
{
    /**
     * @var string
     * @ORM\Column(type="string")
     * The email address of user
     */
    protected string $email;
}
