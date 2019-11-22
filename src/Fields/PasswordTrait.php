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
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getSalt(): string
    {
        return $this->salt;
    }

    /**
     * @param string $salt
     */
    public function setSalt(?string $salt)
    {
        $this->salt = $salt;
    }
}