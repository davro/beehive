<?php

require 'vendor/autoload.php';

try {

    $hive = new Game\Hive();
    $hive->add("\Game\Bee\Queen", 1);
    $hive->add("\Game\Bee\Worker", 5);
    $hive->add("\Game\Bee\Drone", 8);

    $game = new Game\BeeGame($hive);
    while (!$game->isGameOver()) {

        $game->turn();

        $log = $game->getLastMessage();
        foreach ($log as $message) {
            echo "$message\n";
        }
    }

} catch (\Exception $e) {
    echo "BeeGame: " . $e->getMessage() . "\n";
}