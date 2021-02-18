<?php

namespace PSUserBundle\Manager;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class UserManager
 *
 * @package PSUserBundle\Manager
 */
class UserManager
{
    /**
     * @var ManagerRegistry
     */
    protected ManagerRegistry $doctrine;
    /**
     * @var UserPasswordEncoderInterface
     */
    protected UserPasswordEncoderInterface $passwordEncoder;

    /**
     * UserManager constructor.
     *
     * @param ManagerRegistry              $doctrine
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(ManagerRegistry $doctrine, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->doctrine = $doctrine;
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * Update user in database and refresh it for secure usage.
     *
     * @param UserInterface $user
     */
    public function updateUser(UserInterface $user): void
    {
        $this->saveUser($user);
        $this->refreshUser($user);
    }

    /**
     * Save User in database.
     *
     * @param UserInterface $user
     */
    public function saveUser(UserInterface $user): void
    {
        $em = $this->doctrine->getManager();
        $em->persist($user);
        $em->flush();
    }

    /**
     * Refresh user from database (and to session if is the logged user).
     *
     * @param UserInterface $user
     */
    public function refreshUser(UserInterface $user): void
    {
        $this->doctrine->getManager()
                       ->refresh($user)
        ;
    }

    /**
     * Remove an user from database.
     *
     * @param UserInterface $user
     */
    public function deleteUser(UserInterface $user): void
    {
        $em = $this->doctrine->getManager();
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
