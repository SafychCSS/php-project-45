<?php

namespace Console\Games\Even;

use function cli\line;
use function Console\Games\Engine\ask;
use function Console\Games\Engine\congratulation;
use function Console\Games\Engine\correctAnswer;
use function Console\Games\Engine\getAnswer;
use function Console\Games\Engine\greeting;
use function Console\Games\Engine\wrongAnswer;

use const Console\Games\Engine\ROUND_COUNT;

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

function evenGame()
{
    $name = greeting();
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $i = 0;
    while ($i < ROUND_COUNT) {
        $randomNumber = rand(2, 50);
        ask($randomNumber);
        $answer = getAnswer();
        $correctAnswer = isEven($randomNumber) ? 'yes' : 'no';

        if (isCorrectAnswer($answer, $randomNumber)) {
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
// evenGame($answers);
