<?php

namespace Game\Bee;

class Drone extends \Game\Bee
{
    /**
     * Heath amount
     *
     * @var int
     */
    protected $health = 50;

    /**
     * Damage reduction (per hit)
     *
     * @var int
     */
    protected $damage = 12;

    /**
     * The Bee type or trait.
     *
     * @var string
     */
    protected $name = 'Drone';
}
