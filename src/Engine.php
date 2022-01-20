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
    $currentRound = 0;
    $i = 0;
    do {
        line('Question: ' . $question[$i]);
        $userAnswer = prompt('Your answer');

        if ($userAnswer === "yes" || $userAnswer === "no") {
            if ($userAnswer === $expectedAnswer[$i]) {
                line('Correct!');
                $currentRound++;
                if ($currentRound == 3) {
                    line("Congratulations, {$username}!");
                }
            } else {
                incorrect($userAnswer, $expectedAnswer[$i], $username);
                $currentRound = 0;
            }
        } elseif (is_numeric($userAnswer)) {
            if ($userAnswer == $expectedAnswer[$i]) {
                line('Correct!');
                $currentRound++;
                if ($currentRound == 3) {
                    line("Congratulations, {$username}!");
                }
            } else {
                incorrect($userAnswer, $expectedAnswer[$i], $username);
                $currentRound = 0;
            }
        } else {
            incorrect($userAnswer, $expectedAnswer[$i], $username);
            $currentRound = 0;
        }
        $i++;
    } while ($currentRound <= 2);
}
