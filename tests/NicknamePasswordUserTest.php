<?php

namespace PSUserBundle\Tests;

use PHPUnit\Framework\TestCase;
use PSUserBundle\Models\NicknamePasswordUser;

class NicknamePasswordUserTest extends TestCase
{
    public function testInstance(): void
    {
        $user = new NicknamePasswordUser('user', 'password', null);
        $this->assertInstanceOf(NicknamePasswordUser::class, $user);
    }

    public function testGetPassword(): void
    {
        $user = new NicknamePasswordUser('user', 'password', null);
        $this->assertSame('password', $user->getPassword());
    }

    public function testSetPassword(): void
    {
        $user = new NicknamePasswordUser('user', 'password', null);
        $user->setPassword('pwd');
        $this->assertSame('pwd', $user->getPassword());
    }

    public function testGetNickname(): void
    {
        $user = new NicknamePasswordUser('user', 'password', null);
        $this->assertSame('user', $user->getNickname());
    }

    public function testSetNickname(): void
    {
        $user = new NicknamePasswordUser('user', 'password', null);
        $user->setNickname('user2');
        $this->assertSame('user2', $user->getNickname());
    }

    public function testGetSalt(): void
    {
        $user = new NicknamePasswordUser('user', 'password', null);
        $this->assertNull($user->getSalt());
    }

    public function testSetSalt(): void
    {
        $user = new NicknamePasswordUser('user', 'password', null);
        $user->setSalt('salt');
        $this->assertSame('salt', $user->getSalt());
    }

    public function testAddRole(): void
    {
        // TODO: implement testAddRole() method.
    }

    public function testGetRoles(): void
    {
        // TODO: implement testGetRoles() method.
    }

    public function testRemoveRole(): void
    {
        // TODO: implement testRemoveRole() method.
    }

    public function testHasRole(): void
    {
        // TODO: implement testHasRole() method.
    }
}
