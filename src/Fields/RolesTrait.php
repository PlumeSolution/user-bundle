<?php

namespace PSUserBundle\Fields;
use Doctrine\ORM\Mapping as ORM;
use PSUserBundle\Models\BaseUser;

trait RolesTrait
{
    /**
     * @var array
     * @ORM\Column(type="json_array")
     */
    protected $roles = [];

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
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {
        return in_array(strtoupper($role), $this->getRoles(), true);
    }

    public function addRole($role)
    {
        $role = strtoupper($role);
        if ($role === BaseUser::ROLE_DEFAULT) {
            return $this;
        }

        if (!in_array($role, $this->roles, true)) {
            $this->roles[] = $role;
        }

        return $this;
    }


}