<?php

namespace PSUserBundle\Fields;

use Doctrine\ORM\Mapping as ORM;

trait PasswordTrait
{
    /**
     * @var string
     * @ORM\Column(type="string")
     * The encoded password (or plain if user password are not encoded)
     */
    protected $password;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     * The salt used to encode user password
     */
    protected $salt;

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }
}