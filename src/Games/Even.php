<?php

namespace Console\Games\Even;

use function Console\Games\Engine\runGame;

use const Console\Games\Engine\ROUND_COUNT;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $n): bool
{
    return $n % 2 === 0;
}

function isCorrectAnswer(string $answer, int $randomNumber): bool
{
    if (($answer === 'yes' && isEven($randomNumber)) || ($answer === 'no' && !isEven($randomNumber))) {
        return true;
    }
    return false;
}

function run()
{
    $gameData = [];
    $i = 0;
    while ($i < ROUND_COUNT) {
        $randomNumber = rand(2, 50);
        $correctAnswer = isEven($randomNumber) ? 'yes' : 'no';
        $question = (string) $randomNumber;
        $gameData[] = [$question, $correctAnswer];
        $i += 1;
    }
    runGame(DESCRIPTION, $gameData);
}
