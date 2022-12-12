<?php

namespace Console\Games\Calc;

require_once __DIR__ . '/../vendor/autoload.php';

use function cli\line;
use function cli\prompt;
use function Console\Games\Engine\greeting;
use function Console\Games\Engine\ask;
use function Console\Games\Engine\getAnswer;

function calcGame()
{
    $name = greeting();
    line('What is the result of the expression?');

    $questionsCount = 3;
    $operators = ['+', '-', '*'];
    $i = 0;
    while($i < $questionsCount) {
        $randomNumber1 = rand(2, 50);
        $randomNumber2 = rand(2, 50);
        $randKeysOperator = array_rand($operators, 1);

        $operator = $operators[$randKeysOperator];
        $expression = "{$randomNumber1} {$operator} {$randomNumber2}";
        $correctAnswer = null;
        switch ($operator) {
            case '-':
                $correctAnswer = $randomNumber1 - $randomNumber2;
                break;
            case '+':
                $correctAnswer = $randomNumber1 + $randomNumber2;
                break;
            case '*':
                $correctAnswer = $randomNumber1 * $randomNumber2;
                break;
        }

        ask($expression);
        $answer = getAnswer();

        if ((int) $answer === $correctAnswer) {
            line("Correct!");
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.\nLet's try again, {$name}");
            return;
        }

        $i += 1;
        if ($i === $questionsCount) {
            line("Congratulations, %s!", $name);
        }
    }
}