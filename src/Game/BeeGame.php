<?php

namespace Game;

class BeeGame extends Play
{
    protected $hive;

    public function __construct(\Game\Hive $hive)
    {
        parent::__construct();
        $this->hive = $hive;
    }

    public function turn()
    {
        parent::progress();

		$turn = [];
        $bee  = $this->hive->random();

        if ($bee->isDead()) {
            return false;
        }

		// take a hit at the Bee
        $bee->hit();

		// explain the process for logging purposes.
        $turn[] = $bee->getName() . ' bee was attacked ' . 
			($bee->getLife() > 0 ? $bee->getLife() . ' health left' : 'is dead');

        if ($bee->isDead() && $bee->getName() == "Queen" ) {
			$turn[] = $bee->getName() . ' is dead, hive has been destroyed!';
			$this->gameOver();
        }

        if ($this->isGameOver()) {
            $turn[] = "Game over in " . $this->getTurns() . " turns.\n\n";
        }

		// log this turn to the Play object
        $this->log($turn);
    }

    public function restart()
    {
        parent::restart();
        $this->hive->reset();
    }
}
