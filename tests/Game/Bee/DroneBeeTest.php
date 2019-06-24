<?php

namespace Game\Tests;

use PHPUnit_Framework_TestCase as PHPUnit;

class DroneBeeTest extends PHPUnit
{
    public function testGetterHitPoints()
    {
        $bee = new \Game\Bee\Drone();
        $this->assertEquals($bee->getHp(), 50);
    }

    public function testGetterDamage()
    {
        $bee = new \Game\Bee\Drone();
        $this->assertEquals($bee->getDamage(), 12);
    }
	
    public function testGetterName()
    {
        $bee = new \Game\Bee\Drone();
        $this->assertEquals($bee->getName(), 'Drone');
    }
	
    public function testLosingLife()
    {
        $bee = new \Game\Bee\Drone();
        $bee->hit();
		
        $this->assertEquals($bee->getLife(), ($bee->getHp() - $bee->getDamage()));
    }
	
    public function testDeath()
    {
        $bee = new \Game\Bee\Drone();
        while ($bee->isDead() !== true) {
            $bee->hit();
        }

        $this->assertTrue($bee->isDead());
    }
	
    public function testNotDeadMustBeAlive()
    {
        $bee = new \Game\Bee\Drone();
        $bee->hit();

        $this->assertFalse($bee->isDead());
    }
	
    public function testTerminate()
    {
        $bee = new \Game\Bee\Drone();
        $bee->terminate();

        $this->assertTrue($bee->isDead());
    }
}
