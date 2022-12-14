<?php

namespace Console\Games\Prime;

use function Console\Games\Engine\runGame;

use const Console\Games\Engine\ROUND_COUNT;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $n): bool
{
    for ($k = 2; $k <= $n / 2; $k += 1) {
        if ($n % $k === 0) {
            return false;
        }
    }
    return true;
}

function run(): void
{
    $gameData = [];
    $i = 0;
    while ($i < ROUND_COUNT) {
        $number = rand(2, 50);
        $correctAnswer = isPrime($number) ? 'yes' : 'no';
        $question = (string) $number;
        $gameData[] = [$question, $correctAnswer];
        $i += 1;
    }

    runGame(DESCRIPTION, $gameData);
}
