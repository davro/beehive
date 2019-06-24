<?php

namespace Game\Bee;

class Queen extends \Game\Bee
{
    /**
     * Heath amount
     *
     * @var int
     */
    protected $health = 100;

    /**
     * Damage reduction (per hit)
     *
     * @var int
     */
    protected $damage = 8;

    /**
     * Bee type or trait.
     *
     * @var string
     */
    protected $name = 'Queen';
}
