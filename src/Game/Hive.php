<?php

namespace Game;

class Hive
{
    /**
     * Does the hive have a Queen.
     *
     * @var array
     */
    protected $queen = false;
	
	/**
     * Holder for all Bees in the Hive.
     *
     * @var array
     */
    protected $bees = [];

    /**
     * Hold a last state of the Hive.
     *
     * @var array
     */
    protected $state = [];

    /**
     * Add a Bee to this Hive.
     *
     * @param array $bees
     * @return void
     */
    public function add($class, $count = 1)
    {
		if ("\Game\Bee\Queen" == $class && $count > 1 || 
			"\Game\Bee\Queen" == $class && $this->queen == true) {
			
			throw new \Exception('Only one Queen per BeeHive!');
		}
		
		if ("\Game\Bee\Queen" == $class && $this->queen == false) {
			$this->queen = true;
		}
		
        $this->state[] = [$class, $count];

        for ($i = 0; $i < $count; $i++) {
            $this->bees[] = new $class();
        }
    }

    /**
     * Return a random Bee from this Hive.
     *
	 * @param type $returnAmount
	 * @return type
	 */
    public function random($returnAmount = 1)
    {
        return $this->bees[array_rand($this->bees, $returnAmount)];
    }

    /**
     * Getter for retrieving all the Bees.
     *
     * @return $array \Game\Bee
     */
    public function getAll()
    {
        return $this->bees;
    }

	
    /**
     * Mutator for killing all Bees.
     */
    public function killAll()
    {
        $this->bees = [];
    }
	
    /**
     * Resets this Hive to last know state.
	 */
    public function reset()
    {
		$this->queen = false;
        $this->bees = [];
        foreach ($this->state as $bees) {
            $this->add($bees[0], $bees[1]);
        }
    }
}
