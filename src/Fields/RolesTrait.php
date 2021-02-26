<?php

namespace PlumeSolution\UserBundle\Fields;

use Doctrine\ORM\Mapping as ORM;
use PlumeSolution\UserBundle\Models\BaseUser;

/**
 * Trait RolesTrait
 *
 * @package PlumeSolution\UserBundle\Fields
 */
trait RolesTrait
{
    /**
     * @var array
     * @ORM\Column(type="json")
     */
    protected array $roles = [];

    /**
     * @param string $role
     *
     * @return bool
     */
    public function hasRole(string $role): bool
    {
        return in_array(strtoupper($role), $this->getRoles(), true);
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     */
    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    /**
     * @param string $role
     *
     * @return $this
     */
    public function addRole(string $role): self
    {
        $role = strtoupper($role);
        if ($role === BaseUser::ROLE_DEFAULT)
        {
            return $this;
        }

        if (!in_array($role, $this->roles, true))
        {
            $this->roles[] = $role;
        }

        return $this;
    }

    /**
     * @param string $role
     *
     * @return $this
     */
    public function removeRole(string $role): self
    {
        if (false !== $key = array_search(strtoupper($role), $this->roles, true))
        {
            unset($this->roles[$key]);
            $this->roles = array_values($this->roles);
        }

        return $this;
    }
}
