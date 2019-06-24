<?php

namespace Game;

class Bee
{
    /**
	 * Current heath of this Bee
	 * 
     * @var int
     */
    protected $health;

    /**
	 * Damage taken per hit
	 * 
     * @var int
     */
    protected $damage;

    /**
     * Name or type of this Bee.
     *
     * @var string
     */
    protected $name;

    /**
     * The current Health of the Bee.
     *
     * @var int
     */
    protected $currentHealth;
	
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Getter for retriving the Health 
     *
     * @return int
     */
    public function getHp()
    {
        return isset($this->health) ? (int) $this->health : 0;
    }

    /**
     * Getter to retrieve the damage.
     *
     * @return int
     */
    public function getDamage()
    {
        return isset($this->damage) ? (int) $this->damage : 0;
    }

    /**
     * Getter to retrieve the name.
     *
     * @return string
     */
    public function getName()
    {
        return isset($this->name) ? $this->name : $this->name;
    }

    /**
     * Getter to retrieve the current heath of a this Bee.
     *
     * @return int
     */
    public function getLife()
    {
        return $this->currentHealth;
    }

    /**
     * Register a hit on this Bee.
     *
     * @return void
     */
    public function hit()
    {
        if (($this->currentHealth - $this->damage) <= 0) {
            $this->currentHealth = 0;
        } else {
            $this->currentHealth = $this->currentHealth - $this->damage;
        }
    }

    /**
     * Helper to enquire if this Bee is Dead.
     *
     * @return bool
     */
    public function isDead()
    {
        return (bool) $this->currentHealth <= 0;
    }

    /**
     * Raise the dead.
     */
    public function reset()
    {
        $this->currentHealth = $this->health;
    }

    /**
     * Teminate this bee.
     */
    public function terminate()
    {
        $this->currentHealth = 0;
    }
}
