<?php

namespace Console\Games\Engine;

use function cli\line;
use function cli\prompt;

function greeting()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function ask($question)
{
    line("Question: " . $question);
}

function getAnswer()
{
    return prompt("Your answer");
}