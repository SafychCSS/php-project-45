<?php

namespace Console\Games\Gcd;

use function Console\Games\Engine\runGame;

use const Console\Games\Engine\ROUND_COUNT;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function gcd(int $a, int $b): int
{
    return ($a % $b !== 0) ? gcd($b, $a % $b) : $b;
}

function run()
{
    $gameData = [];
    $i = 0;
    while ($i < ROUND_COUNT) {
        $randomNumber1 = rand(2, 50);
        $randomNumber2 = rand(2, 50);
        $question = "{$randomNumber1} {$randomNumber2}";
        $correctAnswer = gcd($randomNumber1, $randomNumber2);
        $i += 1;
        $gameData[] = [$question, (string) $correctAnswer];
    }
    runGame(DESCRIPTION, $gameData);
}
