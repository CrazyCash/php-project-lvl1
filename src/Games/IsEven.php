<?php

namespace Games\IsEven;

use function cli\line;
use function cli\prompt;

const DESCRIPTION = "Answer \"yes\" if the number is even, otherwise answer \"no\".";

function game($username)
{
    line('%s' . PHP_EOL, DESCRIPTION);

    for ($i = 1; $i <= 3; $i++) {
        $question = rand(1, 100);
        $expectedAnswer = getAnswer($question);
        line('Question: %d' . PHP_EOL, $question);
        $userAnswer = prompt('Your answer');

        if ($userAnswer !== $expectedAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'." . PHP_EOL, $userAnswer, $expectedAnswer);
            line("Let's try again, %s!" . PHP_EOL, $username);
            $i = 1;
        }
        line('Correct!');
    }
    line("Congratulations, %s!" . PHP_EOL, $username);
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function getAnswer(int $number): string
{
    return isEven($number) ? "yes" : "no";
}
