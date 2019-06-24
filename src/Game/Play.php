<?php

namespace Game;

class Play
{
    /**
     * Game over value.
     */
    const GAME_OVER = 'game_over';

    /**
     * Game active value.
     */
    const IN_PLAY = 'active';

    /**
     * First move value.
	 */
    const FIRST_MOVE = 'first_move';

    /**
     * Current status.
	 *
	 * @var type 
	 */
    protected $status;

    /**
     * Turn countt of the game play.
	 *
	 * @var type 
	 */
    protected $turns = 0;

    /**
     * Log of gameplay and turns.
	 *
	 * @var type 
	 */
    protected $log = [];

    public function __construct()
    {
        $this->status = self::FIRST_MOVE;
    }

    /**
     * Turn of the game play, progression of each turn.
	 * 
	 * @return boolean
	 */
    public function progress()
    {
        if ($this->status !== self::IN_PLAY) {
            $this->status = self::IN_PLAY;
        }

        if ($this->isGameOver()) {
            return false;
        }

        $this->turns++;
    }

    /**
     * Register the game over as over.
     */
    public function gameOver()
    {
        $this->status = self::GAME_OVER;
    }

    /**
     * Is game over?
     */
    public function isGameOver()
    {
        return $this->status == self::GAME_OVER;
    }

    /**
     * Restart our game.
     */
    public function restart()
    {
        $this->log("Game has been restarted.\n");
        $this->turns = 0;
        $this->status = self::FIRST_MOVE;
    }

    /**
     * Getter for retrieving the turn count.
     */
    public function getTurns()
    {
        return (int) $this->turns;
    }

    /**
     * Log a message to the log array.
     *
     * @param $message
     */
    public function log($message)
    {
        $this->log[] = $message;
    }

    /**
     * Returns the last message.
     *
     * @return array
     */
    public function getLastMessage()
    {
        return end($this->log);
    }

    /**
     * Getter for retrieving the game status.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
	
    /**
     * Getter for retrieving the game log.
     *
     * @return string
     */
    public function getLog()
    {
        return $this->log;
    }
}
