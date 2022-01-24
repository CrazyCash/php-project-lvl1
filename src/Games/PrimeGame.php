<?php

namespace BrainGames\PrimeGame;

use function BrainGames\Engine\greeting;
use function BrainGames\Engine\main;

const DESC = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
const PRIMENUMBERS = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97];

function getQuestion()
{
    return rand(0, 100);
}

function getAnswer($num)
{
    return array_search($num, PRIMENUMBERS, true) != false ? "yes" : "no";
}

function prime()
{
    $arrQuestions = [];
    $arrAnswers = [];

    for ($i = 0; $i < 10; $i++) {
        $arrQuestions[$i] = getQuestion();
        $arrAnswers[$i] = getAnswer($arrQuestions[$i]);
    }

    $username = greeting(DESC);
    main($username, $arrQuestions, $arrAnswers);
}
