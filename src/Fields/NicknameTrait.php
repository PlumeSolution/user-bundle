<?php

namespace PSUserBundle\Fields;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trait NicknameTrait
 *
 * @package PSUserBundle\Fields
 */
trait NicknameTrait
{
    /**
     * @var string
     * @ORM\Column(type="string")
     * The nickname of user
     */
    protected string $nickname;

    /**
     * @return string
     */
    public function getNickname(): string
    {
        return $this->nickname;
    }

    /**
     * @param string $nickname
     *
     * @return NicknameTrait
     */
    public function setNickname(string $nickname): self
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->nickname;
    }
}
