<?php

namespace Game\Tests;

use PHPUnit_Framework_TestCase as PHPUnit;

class BeeGameTest extends PHPUnit
{
    /**
     * Queen has 100 hit points and takes 8 point of damage per hit.
     * 
     * 100/8 = 12.5 
     * 
     * So, on the 13th hit the queen will die.
     */
    public function testGameOneQueen()
    {
        $hive = new \Game\Hive();
        $hive->add("\Game\Bee\Queen", 1);

        $game = new \Game\BeeGame($hive);
        foreach(range(1, 12) as $turn) {
            $game->turn();
            $this->assertFalse($game->isGameOver());
        }

        // execute the last turn and assert game is over!
        $game->turn();
        $this->assertTrue($game->isGameOver());
    }

    /**
     * 1 Queen and 1 Worker
     */
    public function testGameOneQueenOneWorker()
    {
        $hive = new \Game\Hive();
        $hive->add("\Game\Bee\Queen", 1);
        $hive->add("\Game\Bee\Worker", 1);

        $game = new \Game\BeeGame($hive);
        while (!$game->isGameOver()) {
            $game->turn();
        }
        $this->assertTrue($game->isGameOver());

        $this->assertThat($game->getTurns(),
            $this->logicalAnd(
                $this->greaterThan(10),
                $this->lessThan(50)
            )
        );
    }

    /**
     * 1 Queen with 10 Workers
     */
    public function testGameOneQueenTenWorkers()
    {
        $hive = new \Game\Hive();
        $hive->add("\Game\Bee\Queen", 1);
        $hive->add("\Game\Bee\Worker", 10);

        $game = new \Game\BeeGame($hive);
        while (!$game->isGameOver()) {
            $game->turn();
        }
        $this->assertTrue($game->isGameOver());

        $this->assertThat($game->getTurns(),
            $this->logicalAnd(
                $this->greaterThan(10),
                $this->lessThan(250)
            )
        );
    }

    /**
     * 1 Queen with 10 Workers and 100 drones 
     */
    public function testGameOneQueenTenWorkersOneHundredDrones()
    {
        $hive = new \Game\Hive();
        $hive->add("\Game\Bee\Queen", 1);
        $hive->add("\Game\Bee\Worker", 10);
        $hive->add("\Game\Bee\Drone", 100);

        $game = new \Game\BeeGame($hive);
        while (!$game->isGameOver()) {
            $game->turn();
        }
        $this->assertTrue($game->isGameOver());

        $this->assertThat($game->getTurns(),
            $this->logicalAnd(
                $this->greaterThan(10),
                $this->lessThan(3000)
            )
        );
    }

    /**
     * Many Queens should trigger an Exception
     * 
     * @expectedException Exception
     */
    public function testGameManyQueensException()
    {
        $hive = new \Game\Hive();
        $hive->add("\Game\Bee\Queen");
        $hive->add("\Game\Bee\Queen");
    }


    /**
     * Many Queens should trigger an Exception
     * 
     * @expectedException Exception
     */
    public function testGameManyQueensWithArgumentException()
    {
        $hive = new \Game\Hive();
        $hive->add("\Game\Bee\Queen", 2);
    }
}
