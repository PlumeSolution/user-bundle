<?php

namespace PlumeSolution\UserBundle\Manager;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class UserManager
 *
 * @package PlumeSolution\UserBundle\Manager
 */
class UserManager
{
    /**
     * @var ManagerRegistry
     */
    protected ManagerRegistry $doctrine;
    /**
     * @var UserPasswordHasherInterface
     */
    protected UserPasswordHasherInterface $passwordEncoder;

    /**
     * @var string
     */
    private string $userClass;

    /**
     * UserManager constructor.
     *
     * @param ManagerRegistry $doctrine
     * @param UserPasswordHasherInterface $passwordEncoder
     * @param string $userClass
     */
    public function __construct(ManagerRegistry $doctrine, UserPasswordHasherInterface $passwordEncoder, string $userClass)
    {
        $this->doctrine = $doctrine;
        $this->passwordEncoder = $passwordEncoder;
        $this->userClass = $userClass;
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
     * @param string $nickname
     * @param string $password
     *
     * @return UserInterface
     */
    public function createUser(string $nickname, string $password): UserInterface
    {
        /**
         * @var UserInterface|PasswordAuthenticatedUserInterface $user
         */
        $user = new $this->userClass($nickname, '', '');

        $user->setPassword(
            $this->passwordEncoder->hashPassword(
                $user,
                $password
            )
        );

        $user->addRole('ROLE_USER');

        $this->saveUser($user);

        return $user;
    }

    /**
     * Count number of user
     *
     * @return int
     */
    public function countUser(): int
    {
        return count($this->doctrine->getRepository($this->userClass)->findAll());
    }
}
