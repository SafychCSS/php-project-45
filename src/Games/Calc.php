<?php

namespace Console\Games\Calc;

use function cli\line;
use function Console\Games\Engine\congratulation;
use function Console\Games\Engine\greeting;
use function Console\Games\Engine\ask;
use function Console\Games\Engine\getAnswer;
use function Console\Games\Engine\correctAnswer;
use function Console\Games\Engine\wrongAnswer;

use const Console\Games\Engine\ROUND_COUNT;

function calcGame()
{
    $name = greeting();
    line('What is the result of the expression?');
    $operators = ['+', '-', '*'];
    $i = 0;
    while ($i < ROUND_COUNT) {
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
        if ($answer == $correctAnswer) {
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
