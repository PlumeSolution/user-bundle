<?php

namespace PSUserBundle\Models;

use PSUserBundle\Credentials\NicknamePasswordTrait;
use PSUserBundle\Fields\RolesTrait;
use Symfony\Component\Security\Core\User\UserInterface;

class NicknamePasswordUser extends BaseUser
{
    use NicknamePasswordTrait;
    use RolesTrait;

    public function __construct(?string $nickname, ?string $password, ?string $salt)
    {
        $this->setNickname($nickname);
        $this->setPassword($password);
        $this->setSalt($salt);
    }

    /**
     * String representation of object
     * @link  https://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        // TODO: Implement serialize() method.
    }

    /**
     * Constructs the object
     * @link  https://php.net/manual/en/serializable.unserialize.php
     *
     * @param string $serialized <p>
     *                           The string representation of the object.
     *                           </p>
     *
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        // TODO: Implement unserialize() method.
    }

    /**
     * The equality comparison should neither be done by referential equality
     * nor by comparing identities (i.e. getId() === getId()).
     *
     * However, you do not need to compare every attribute, but only those that
     * are relevant for assessing whether re-authentication is required.
     *
     * @param UserInterface $user
     *
     * @return void
     */
    public function isEqualTo(UserInterface $user)
    {
        // TODO: Implement isEqualTo() method.
    }
}
