<?php

use function cli\line;
use function cli\prompt;

const DESCRIPTION = "Answer \"yes\" if the number is even, otherwise answer \"no\".";

function question()
{
    return rand(1, 100);
}

function even(int $number): bool
{
    return $number % 2 === 0;
}

function getAnswer(int $number): string
{
    return even($number) ? "yes" : "no";
}
