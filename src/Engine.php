<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function greeting($desc)
{
    line('Welcome to the Brain Game!');
    $username = prompt('May I have your name?');
    line("Hello, %s!" . PHP_EOL . $desc, $username);
    return $username;
}

function incorrect($userAnswer, $expectedAnswer, $username)
{
    line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$expectedAnswer}'");
    line("Let's try again, {$username}!");
}

function main($username, $question, $expectedAnswer)
{
    $currentRound = 1;
    $i = 0;
    do {
        line('Question: ' . $question[$i]);
        $userAnswer = prompt('Your answer');

        if ($userAnswer === "yes" || $userAnswer === "no") {
            if ($userAnswer === $expectedAnswer[$i]) {
                line('Correct!');
                $currentRound++;
                if ($currentRound == 4) {
                    line("Congratulations, {$username}!");
                }
            } else {
                incorrect($userAnswer, $expectedAnswer[$i], $username);
                $currentRound = 1;
            }
        } else {
            incorrect($userAnswer, $expectedAnswer[$i], $username);
            $currentRound = 1;
        }
        $i++;
    } while ($currentRound <= 3);
}
