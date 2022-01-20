<?php

namespace BrainGames\EvenGame;

use function BrainGames\Engine\greeting;
use function BrainGames\Engine\main;

const DESC = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven($num)
{
    return $num % 2 == 0 ? "yes" : "no";
}
function even()
{
    $question = [];
    $expectedNum = [];
    for ($i = 0; $i < 11; $i++) {
        $question[$i] = rand(0, 255);
        $expectedNum[$i] = isEven($question[$i]);
    }
    $username = greeting(DESC);
    main($username, $question, $expectedNum);
}
