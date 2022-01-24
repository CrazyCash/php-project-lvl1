<?php

namespace BrainGames\ProgressionGame;

use function BrainGames\Engine\greeting;
use function BrainGames\Engine\main;

const DESC = "What number is missing in the progression?";

function getQuestion()
{
    $range = rand(5, 10);
    $startNum = rand(1, 100);
    $progression = rand(1, 15);
    $buf = [$startNum];

    for ($i = 1; $i <= $range; $i++) {
        $buf[$i] = $buf[$i-1] + $progression;
    }

    return implode(" ", $buf);
}

function getAnswer(&$question)
{
    $inputData = explode(" ", $question);
    $randIndex = rand(0, count($inputData)-1);
    $answer = $inputData[$randIndex];
    $inputData[$randIndex] = '..';
    $question = implode(" ", $inputData);
    return $answer;
}

function  progression()
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
