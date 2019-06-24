<?php

namespace Game\Tests;

use PHPUnit_Framework_TestCase as PHPUnit;

class WorkerBeeTest extends PHPUnit
{
    public function testGetterHitPoints()
    {
        $bee = new \Game\Bee\Worker();
        $this->assertEquals($bee->getHp(), 75);
    }

    public function testGetterDamage()
    {
        $bee = new \Game\Bee\Worker();
        $this->assertEquals($bee->getDamage(), 10);
    }

    public function testGetterName()
    {
        $bee = new \Game\Bee\Worker();
        $this->assertEquals($bee->getName(), 'Worker');
    }

    public function testLosingLife()
    {
        $bee = new \Game\Bee\Worker();
        $bee->hit();

        $this->assertEquals($bee->getLife(), ($bee->getHp() - $bee->getDamage()));
    }

    public function testDeath()
    {
        $bee = new \Game\Bee\Worker();
        while ($bee->isDead() !== true) {
            $bee->hit();
        }

        $this->assertTrue($bee->isDead());
    }

    public function testNotDeadMustBeAlive()
    {
        $bee = new \Game\Bee\Worker();
        $bee->hit();

        $this->assertFalse($bee->isDead());
    }

    public function testTerminate()
    {
        $bee = new \Game\Bee\Worker();
        $bee->terminate();

        $this->assertTrue($bee->isDead());
    }
}
