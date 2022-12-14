<?php

namespace Console\Games\Prime;

use function cli\line;
use function Console\Games\Engine\congratulation;
use function Console\Games\Engine\greeting;
use function Console\Games\Engine\ask;
use function Console\Games\Engine\getAnswer;
use function Console\Games\Engine\correctAnswer;
use function Console\Games\Engine\wrongAnswer;

use const Console\Games\Engine\ROUND_COUNT;

function primeGame()
{
    $name = greeting();
    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    $i = 0;
    while ($i < ROUND_COUNT) {
        $number = rand(2, 50);
        $correctAnswer = 'yes';
        for ($k = 2; $k <= $number / 2; $k += 1) {
            if ($number % $k === 0) {
                $correctAnswer = 'no';
            }
        }
        ask((string) $number);
        $answer = getAnswer();
        if ($answer === $correctAnswer) {
            correctAnswer();
        } else {
            wrongAnswer((string) $answer, (string) $correctAnswer, $name);
            return;
        }
        $i += 1;
        if ($i === ROUND_COUNT) {
            congratulation($name);
        }
    }
}
