<?php

namespace Console\Games\Engine;

use function cli\line;
use function cli\prompt;

const ROUND_COUNT = 3;

function greeting()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function ask(int | string $question)
{
    line("Question: " . $question);
}

function getAnswer(): string
{
    return prompt("Your answer");
}

function correctAnswer()
{
    line("Correct!");
}

function wrongAnswer(int | string $answer, int | string $correctAnswer, string $name)
{
    line("%s is wrong answer ;(. Correct answer was '%s'.\nLet's try again, %s!", $answer, $correctAnswer, $name);
}

function congratulation(string $name)
{
    line("Congratulations, %s!", $name);
}
