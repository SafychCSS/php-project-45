<?php

namespace Console\Games\Gcd;

require_once __DIR__ . '/../../vendor/autoload.php';

use function cli\line;
use function Console\Games\Engine\congratulation;
use function Console\Games\Engine\greeting;
use function Console\Games\Engine\ask;
use function Console\Games\Engine\getAnswer;
use function Console\Games\Engine\correctAnswer;
use function Console\Games\Engine\wrongAnswer;

use const Console\Games\Engine\ROUND_COUNT;

function gcd($a,$b) {
    return ($a % $b) ? gcd($b,$a % $b) : $b;
}

function gcdGame()
{
    $name = greeting();
    line('Find the greatest common divisor of given numbers.');

    $i = 0;
    while($i < ROUND_COUNT) {
        $randomNumber1 = rand(2, 50);
        $randomNumber2 = rand(2, 50);
        ask("{$randomNumber1} {$randomNumber2}");
        $answer = getAnswer();
        $correctAnswer = gcd($randomNumber1, $randomNumber2);
        if ((int) $answer === (int) $correctAnswer) {
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
