<?php

namespace PSUserBundle\Manager;

use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class UserManager
 * @package PSUserBundle\Manager
 */
class UserManager
{
    /**
     * @var ManagerRegistry
     */
    private $doctrine;
    /**
     * @var TokenInterface
     */
    private $securityToken;

    /**
     * UserManager constructor.
     *
     * @param ManagerRegistry $doctrine
     * @param TokenInterface  $securityToken
     */
    public function __construct(ManagerRegistry $doctrine, TokenInterface $securityToken)
    {
        $this->doctrine = $doctrine;
        $this->securityToken = $securityToken;
    }

    /**
     * Refresh user from database (and to session if is the logged user).
     *
     * @param UserInterface $user
     */
    public function refreshUser(UserInterface $user)
    {
        $this->doctrine->getManager()->refresh($user);
        if ($this->securityToken->getUser()->getId() == $user->getId())
        {
            $this->securityToken->setUser($user);
        }
    }

    /**
     * Save User in database.
     *
     * @param UserInterface $user
     */
    public function saveUser(UserInterface $user)
    {
        $em =$this->doctrine->getManager();
        $em->persist($user);
        $em->flush();
    }

    /**
     * Update user in database and refresh it for secure usage.
     *
     * @param UserInterface $user
     */
    public function updateUser(UserInterface $user)
    {
        $this->saveUser($user);
        $this->refreshUser($user);
    }

    /**
     * Remove an user from database.
     *
     * @param UserInterface $user
     */
    public function deleteUser(UserInterface $user)
    {
        $em =$this->doctrine->getManager();
        $em->remove($user);
        $em->flush();
    }
}