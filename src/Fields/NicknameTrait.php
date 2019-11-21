<?php

namespace PSUserBundle\Fields;

/**
 * Trait NicknameTrait
 * @package PSUserBundle\Fields
 */
trait NicknameTrait
{
    /**
     * @var string
     * @ORM\Column(type="string")
     * The Nickname of user
     */
    protected $nickname;

    /**
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @param string $nickname
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }


}