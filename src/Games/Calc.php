<?php

namespace Console\Games\Calc;

use function Console\Games\Engine\runGame;

use const Console\Games\Engine\ROUND_COUNT;

const DESCRIPTION = 'What is the result of the expression?';

function run()
{
    $gameData = [];
    $operators = ['+', '-', '*'];
    $i = 0;
    while ($i < ROUND_COUNT) {
        $randomNumber1 = rand(2, 50);
        $randomNumber2 = rand(2, 50);
        $randKeysOperator = array_rand($operators, 1);
        $operator = $operators[$randKeysOperator];
        $question = "{$randomNumber1} {$operator} {$randomNumber2}";
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
        $gameData[] = [$question, (string) $correctAnswer];
        $i += 1;
    }
    runGame(DESCRIPTION, $gameData);
}
