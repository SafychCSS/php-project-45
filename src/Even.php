<?php

namespace Console\Games\Even;

require_once __DIR__ . '/../vendor/autoload.php';

use function cli\line;
use function cli\prompt;
use function Console\Games\Cli\greeting;

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

    $questionsCount = 3;
    $i = 0;
    while($i < $questionsCount) {
        $randomNumber = rand(2, 50);
        line("Question: " . $randomNumber);
        $answer = prompt("Your answer");

        if (isCorrectAnswer($answer, $randomNumber)) {
            line("Correct!");
        } else {
            line("%s is wrong answer ;(. Correct answer was 'no'.\nLet's try again, %s!", $answer, $name);
            return;
        }

        $i += 1;
        if ($i === $questionsCount) {
            line("Congratulations, %s!", $name);
        }
    }
}
// evenGame($answers);
