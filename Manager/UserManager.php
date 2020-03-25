<?php

namespace PSUserBundle\Manager;

use App\Entity\User;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
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
    protected $doctrine;
    /**
     * @var TokenInterface
     */
    protected $securityToken;
    /**
     * @var UserPasswordEncoderInterface
     */
    protected $passwordEncoder;

    /**
     * UserManager constructor.
     *
     * @param ManagerRegistry              $doctrine
     * @param TokenInterface               $securityToken
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(ManagerRegistry $doctrine, TokenInterface $securityToken, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->doctrine = $doctrine;
        $this->securityToken = $securityToken;
        $this->passwordEncoder = $passwordEncoder;
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

    /**
     * Create a new user in database
     *
     * @param string $userClass
     * @param string $nickname
     * @param string $password
     *
     * @return UserInterface
     */
    public function createUser(string $userClass, string $nickname, string $password): UserInterface
    {
        /**
         * @var UserInterface $user
         */
        $user = new $userClass($nickname, '', '');

        $user->setPassword(
            $this->passwordEncoder->encodePassword(
                $user,
                $password
            )
        );

        $user->addRole('ROLE_USER');

        $this->saveUser($user);

        return $user;
    }
}
