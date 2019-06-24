<?php

namespace Game\Bee;

class Worker extends \Game\Bee
{
    /**
     * Heath amount
     *
     * @var int
     */
    protected $health = 75;

    /**
     * Damage reduction (per hit)
     *
     * @var int
     */
    protected $damage = 10;

    /**
     * Bee type or trait.
     *
     * @var string
     */
    public $name = 'Worker';
}
