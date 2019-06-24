<?php

namespace Game\Tests;

use PHPUnit_Framework_TestCase as PHPUnit;

class QueenBeeTest extends PHPUnit
{
    public function testGetterHitPoints()
    {
        $bee = new \Game\Bee\Queen();
        $this->assertEquals($bee->getHp(), 100);
    }

    public function testGetterDamage()
    {
        $bee = new \Game\Bee\Queen();
        $this->assertEquals($bee->getDamage(), 8);
    }

    public function testGetterName()
    {
        $bee = new \Game\Bee\Queen();
        $this->assertEquals($bee->getName(), 'Queen');
    }

    public function testLosingLife()
    {
        $bee = new \Game\Bee\Queen();
        $bee->hit();

        $this->assertEquals($bee->getLife(), ($bee->getHp() - $bee->getDamage()));
    }

    public function testDeath()
    {
        $bee = new \Game\Bee\Queen();
        while ($bee->isDead() !== true) {
            $bee->hit();
        }

        $this->assertTrue($bee->isDead());
    }

    public function testNotDeadMustBeAlive()
    {
        $bee = new \Game\Bee\Queen();
        $bee->hit();

        $this->assertFalse($bee->isDead());
    }

    public function testTerminate()
    {
        $bee = new \Game\Bee\Queen();
        $bee->terminate();

        $this->assertTrue($bee->isDead());
    }
}
