<?php

namespace Console\Games\Even;

require_once __DIR__ . '/../vendor/autoload.php';

use function cli\line;
use function Console\Games\Engine\ask;
use function Console\Games\Engine\correctAnswer;
use function Console\Games\Engine\getAnswer;
use function Console\Games\Engine\greeting;
use function Console\Games\Engine\wrongAnswer;
use const Console\Games\Engine\ROUND_COUNT;

function isEven($n)
{
    return $n % 2 === 0;
}

function isCorrectAnswer($answer, $randomNumber)
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
    while($i < ROUND_COUNT) {
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
            line("Congratulations, %s!", $name);
        }
    }
}
// evenGame($answers);
