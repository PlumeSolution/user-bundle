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
     * The Nickname of user
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
     */
    public function setNickname($nickname): void
    {
        $this->nickname = $nickname;
    }
}
