<?php

namespace Console\Games\Engine;

use function cli\line;
use function cli\prompt;

const ROUND_COUNT = 3;

function runGame(string $description, array $gameData): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($description);

    foreach ($gameData as [$question, $correctAnswer]) {
        line("Question: " . $question);
        $answer = prompt("Your answer");

        if ($answer === $correctAnswer) {
            line("Correct!");
        } else {
            line("%s is wrong answer ;(. Correct answer was '%s'.\n
            Let's try again, %s!", $answer, $correctAnswer, $name);
            return;
        }
    }

    line("Congratulations, %s!", $name);
}
