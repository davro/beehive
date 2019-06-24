<?php

namespace Game\Tests;

use PHPUnit_Framework_TestCase as PHPUnit;

class HiveTest extends PHPUnit
{
    public function testHiveAdd()
    {
        $hive = new \Game\Hive();
        $this->assertEmpty($hive->getAll());

        $hive->add("\Game\Bee\Queen", 1);
        $this->assertCount(1, $hive->getAll());
    }

    public function testRandom()
    {
        $hive = new \Game\Hive();

        $hive->add("\Game\Bee\Queen", 1);
        $hive->add("\Game\Bee\Worker", 3);

        $this->assertCount(4, $hive->getAll());
        $this->assertInstanceOf(\Game\Bee::class, $hive->random());
    }

    public function testReset()
    {
        $hive = new \Game\Hive();

        $hive->add("\Game\Bee\Queen", 1);
        $hive->add("\Game\Bee\Worker", 3);

        $this->assertCount(4, $hive->getAll());

        foreach ($hive->getAll() as $bee) {
            $this->assertFalse($bee->isDead());
        }
        $hive->killAll();
        $this->assertCount(0, $hive->getAll());

        $hive->reset();
        $this->assertCount(4, $hive->getAll());
    }
}
