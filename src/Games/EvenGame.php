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
    $question = [rand(0, 255), rand(0, 255), rand(0, 255)];
    $expectedNum = [isEven($question[0]), isEven($question[1]), isEven($question[2])];
    $username = greeting(DESC);
    main($username, $question, $expectedNum);
}
