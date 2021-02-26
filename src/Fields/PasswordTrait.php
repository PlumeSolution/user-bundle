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
    protected string $password;

    /**
     * @var null|string
     * @ORM\Column(type="string", nullable=true)
     * The salt used to encode user password
     */
    protected ?string $salt;

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
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getSalt(): ?string
    {
        return $this->salt;
    }

    /**
     * @param string|null $salt
     */
    public function setSalt(?string $salt): void
    {
        $this->salt = $salt;
    }
}
