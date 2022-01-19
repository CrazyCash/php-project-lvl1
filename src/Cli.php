<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;
use function cli\menu;

function games()
{
    line('Welcome to the Brain Game!');
    $username = prompt('May I have your name?');
    line("Hello, %s!", $username);
}
