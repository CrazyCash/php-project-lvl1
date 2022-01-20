<?php

namespace BrainGames\CalcGame;

use function BrainGames\Engine\greeting;
use function BrainGames\Engine\main;

const DESC = 'What is the result of the expression?';

function operation()
{
    $operationNum = rand(1, 3);
    switch ($operationNum) {
        case '1':
            return '+';
            break;
        case '2':
            return '-';
            break;
        case '3':
            return '*';
            break;
        default:
            return false;
            break;
    }
}

function questionGenerate()
{
    $buf = [rand(0, 50), operation(), rand(0, 50)];
    return implode(" ", $buf);
}

function answer($strExpression)
{
    $numExpression = explode(" ", $strExpression);
    switch ($numExpression[1]) {
        case '+':
            return $numExpression[0] + $numExpression[2];
            break;
        case '-':
            return $numExpression[0] - $numExpression[2];
            break;
        case '*':
            return $numExpression[0] * $numExpression[2];
            break;
        default:
            return false;
            break;
    }
}

function calc()
{
    $question = [];
    $expectedNum = [];
    for ($i = 0; $i < 11; $i++) {
        $question[$i] = questionGenerate();
        $expectedNum[$i] = answer($question[$i]);
    }
    $username = greeting(DESC);
    main($username, $question, $expectedNum);
}
