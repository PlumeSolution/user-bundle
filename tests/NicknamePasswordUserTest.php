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

    public function testGetPassword()
    {
        $user = new NicknamePasswordUser('user', 'password', null);
        $this->assertSame('password', $user->getPassword());
    }

    public function testSetPassword()
    {
        $user = new NicknamePasswordUser('user', 'password', null);
        $user->setPassword('pwd');
        $this->assertSame('pwd', $user->getPassword());
    }

    public function testGetNickname()
    {
        $user = new NicknamePasswordUser('user', 'password', null);
        $this->assertSame('user', $user->getNickname());
    }

    public function testSetNickname()
    {
        $user = new NicknamePasswordUser('user', 'password', null);
        $user->setNickname('user2');
        $this->assertSame('user2', $user->getNickname());
    }

    public function testGetSalt()
    {
        $user = new NicknamePasswordUser('user', 'password', null);
        $this->assertSame(null, $user->getSalt());
    }

    public function testSetSalt()
    {
        $user = new NicknamePasswordUser('user', 'password', null);
        $user->setSalt('salt');
        $this->assertSame('salt', $user->getSalt());
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

    public function testHasRole()
    {
        // TODO: implement testHasRole() method.
    }
}
