<?php

namespace Console\Games\Progression;

use function Console\Games\Engine\runGame;

use const Console\Games\Engine\ROUND_COUNT;

const DESCRIPTION = 'What number is missing in the progression?';

function run()
{
    $gameData = [];
    $i = 0;
    while ($i < ROUND_COUNT) {
        $progressionStep = rand(2, 5);
        $progressionLength = rand(5, 10);
        $progression = [];

        for ($k = 1; $k <= $progressionLength; $k += 1) {
            $progression[] = $progressionStep * $k;
        }

        $randKey = array_rand($progression);
        $correctAnswer = (string) $progression[$randKey];
        $progression[$randKey] = '..';

        $question = implode(" ", $progression);
        $gameData[] = [$question, $correctAnswer];
        $i += 1;
    }
    runGame(DESCRIPTION, $gameData);
}
