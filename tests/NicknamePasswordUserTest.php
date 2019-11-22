<?php

namespace PSUserBundle\Tests;

use PHPUnit\Framework\TestCase;
use PSUserBundle\Models\NicknamePasswordUser;

class NicknamePasswordUserTest extends TestCase
{
    public function testInstance()
    {
        $user = new NicknamePasswordUser('user', 'password', null);
        $this->assertInstanceOf('PSUserBundle\Models\NicknamePasswordUser', $user);
    }

    public function testSetPassword()
    {
        // TODO: implement testSetPassword() method.
    }

    public function testGetNickname()
    {
        // TODO: implement testGetNickname() method.
    }

    public function testGetPassword()
    {
        // TODO: implement testGetPassword() method.
    }

    public function testAddRole()
    {
        // TODO: implement testAddRole() method.
    }

    public function testGetRoles()
    {
        // TODO: implement testGetRoles() method.
    }

    public function testRemoveRole()
    {
        // TODO: implement testRemoveRole() method.
    }

    public function testGetSalt()
    {
        // TODO: implement testGetSalt() method.
    }

    public function testHasRole()
    {
        // TODO: implement testHasRole() method.
    }

    public function testSetNickname()
    {
        // TODO: implement testSetNickname() method.
    }

    public function testSetSalt()
    {
        // TODO: implement testSetSalt() method.
    }
}
