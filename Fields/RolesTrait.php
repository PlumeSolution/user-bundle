<?php

namespace PSUserBundle\Fields;

use Doctrine\ORM\Mapping as ORM;
use PSUserBundle\Models\BaseUser;

/**
 * Trait RolesTrait
 *
 * @package PSUserBundle\Fields
 */
trait RolesTrait
{
    /**
     * @var array
     * @ORM\Column(type="json")
     */
    protected $roles = [];

    /**
     * @param string $role
     *
     * @return bool
     */
    public function hasRole(string $role)
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
    public function removeRole(string $role)
    {
        if (false !== $key = array_search(strtoupper($role), $this->roles, true))
        {
            unset($this->roles[$key]);
            $this->roles = array_values($this->roles);
        }

        return $this;
    }
}
