<?php

namespace Game\Tests;

use PHPUnit_Framework_TestCase as PHPUnit;

class PlayTest extends PHPUnit
{
    public function testGameStart()
    {
        $game = new \Game\Play();
        $this->assertEquals($game->getStatus(), \Game\Play::FIRST_MOVE);
    }
	
    public function testProgress()
    {
        $game = new \Game\Play();
        $game->progress();
        $this->assertEquals($game->getTurns(), 1);
        $this->assertEquals($game->getStatus(), \Game\Play::IN_PLAY);
    }
	
    public function testLog()
    {
        $game = new \Game\Play();
        $tolog = ['Testing our game log.'];
        $game->log($tolog);

        $log = $game->getLastMessage();

        $this->assertSame($log, $tolog);
    }

    public function testGameOver()
    {
        $game = new \Game\Play();

        $this->assertEquals($game->getStatus(), \Game\Play::FIRST_MOVE);
        $game->progress();

        $this->assertEquals($game->getStatus(), \Game\Play::IN_PLAY);
        $game->gameOver();

        $this->assertEquals($game->getStatus(), \Game\Play::GAME_OVER);
    }
	
    public function testRestartGame()
    {
        $game = new \Game\Play();
        $game->progress();
        $this->assertEquals($game->getStatus(), \Game\Play::IN_PLAY);
        $game->restart();
        $this->assertEquals($game->getStatus(), \Game\Play::FIRST_MOVE);
    }
}
