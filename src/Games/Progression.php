<?php

namespace Console\Games\Progression;

use function cli\line;
use function Console\Games\Engine\congratulation;
use function Console\Games\Engine\greeting;
use function Console\Games\Engine\ask;
use function Console\Games\Engine\getAnswer;
use function Console\Games\Engine\correctAnswer;
use function Console\Games\Engine\wrongAnswer;

use const Console\Games\Engine\ROUND_COUNT;

function progressionGame()
{
    $name = greeting();
    line('What number is missing in the progression?');

    $i = 0;
    while ($i < ROUND_COUNT) {
        $progressionStep = rand(2, 5);
        $progressionLength = rand(5, 10);
        $progression = [];

        for ($k = 1; $k <= $progressionLength; $k += 1) {
            $progression[] = $progressionStep * $k;
        }

        $randKey = array_rand($progression);
        $correctAnswer = $progression[$randKey];
        $progression[$randKey] = '..';

        $question = implode(" ", $progression);
        ask($question);
        $answer = getAnswer();
        if ($answer == $correctAnswer) {
            correctAnswer();
        } else {
            wrongAnswer($answer, $correctAnswer, $name);
            return;
        }
        $i += 1;
        if ($i === ROUND_COUNT) {
            congratulation($name);
        }
    }
}
