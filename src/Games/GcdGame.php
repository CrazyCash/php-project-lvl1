<?php

namespace BrainGames\GcdGame;

use function BrainGames\Engine\greeting;
use function BrainGames\Engine\main;

const DESC = "Find the greatest common divisor of given numbers.";

function strQuestion()
{
    $buf = [rand(1, 50), rand(1, 50)];
    return implode(" ", $buf);
}

function findGcd($a, $b)
{
    if ($a % $b == 0) {
        return $b;
    }
    if ($b % $a == 0) {
        return $a;
    }

    if ($a > $b) {
        return findGcd(($a % $b), $b);
    } else {
        return findGcd($a, ($b % $a));
    }
}

function expectedGcd($question)
{
    $numbers = explode(" ", $question);

    $res = findGcd($numbers[0], $numbers[1]);
    return $res;
}

function gcd()
{
    $arrQuestion = [];
    $arrExpectedAnswer = [];

    for ($i = 0; $i < 11; $i++) {
        $arrQuestion[$i] = strQuestion();
        $arrExpectedAnswer[$i] = expectedGcd($arrQuestion[$i]);
    }

    $username = greeting(DESC);
    main($username, $arrQuestion, $arrExpectedAnswer);
}
