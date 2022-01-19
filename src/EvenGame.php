<?php

namespace BrainGames\EvenGame;

use function cli\line;
use function cli\prompt;

const ROUNDS = 3;
const DESC = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven($num)
{
    return $num % 2 == 0 ? "yes" : "no";
}
function even()
{
    $currentRound = 1;
    line('Welcome to the Brain Game!');
    $username = prompt('May I have your name?');
    line("Hello, %s!" . PHP_EOL . DESC, $username);
    do {
        $generatedNum = rand(0, 150);
        line('Question: ' . $generatedNum);
        $userAnswer = prompt('Your answer');
        $expectedAnswer = isEven($generatedNum);

        if ($userAnswer === "yes" || $userAnswer === "no") {
            if ($userAnswer === $expectedAnswer) {
                line('Correct!');
                $currentRound++;
                if ($currentRound == 4) {
                    line("Congratulations, {$username}!");
                }
            } else {
                line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$expectedAnswer}'" . PHP_EOL . "Let's try again, {$username}!");
                $currentRound = 1;
            }
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$expectedAnswer}'" . PHP_EOL . "Let's try again, {$username}!");
            $currentRound = 1;
        }
    } while ($currentRound <= 3);
}
