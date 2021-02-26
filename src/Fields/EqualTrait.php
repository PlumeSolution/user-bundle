<?php

namespace PlumeSolution\UserBundle\Fields;

use Symfony\Component\Security\Core\User\UserInterface;

trait EqualTrait
{
    public function serialize(): string
    {
        return serialize([
            $this->id,
            $this->nickname,
            $this->password,
            $this->salt
        ]);
    }

    public function unserialize($serialized): void
    {
        [
            $this->id,
            $this->nickname,
            $this->password,
            $this->salt
        ]

            = unserialize($serialized, ['allowed_classes' => false]);
    }

    public function isEqualTo(UserInterface $user): bool
    {
        return $user->getUsername() === $this->getUsername();
    }
}
