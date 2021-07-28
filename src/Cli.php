<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;
use function cli\menu;

const ROUNDS = 3;

function run($game)
{
    $username = prompt('May I have your name?');
    line("Hello, %s!", $username);

    line('%s' . PHP_EOL, DESCRIPTION);

    for ($i = 1; $i <= ROUNDS; $i++) {
        $question = question();
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
function games()
{
    line('Welcome to the Brain Game!');
    $menu = include('GameList.php');
    run(menu($menu, 'Choose your game:'));
}
