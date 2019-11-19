<?php

namespace BrainGames\Games\Progression;

const START_QUESTION_PROGRESSION = 'Find the greatest common divisor of given numbers.';
const PROGRESSION_SIZE = 10;

function generateProgressionAndRightAnswer($size): array
{
    $start = mt_rand(0, 100);
    $step = mt_rand(1, 10);
    $resultArr = [];
    $emptyIndex = mt_rand(0, $size - 1);
    for ($cnt = 1, $i = $start; $cnt <= $size; $cnt += 1, $i += $step) {
        $resultArr[] = (string)$i;
    }
    $rightAnswer = $resultArr[$emptyIndex];
    $resultArr[$emptyIndex] = '..';

    $resultStr = implode(' ', $resultArr);
    return [$resultStr, $rightAnswer];
}


function start(): array
{
    $size = PROGRESSION_SIZE;
    [$question, $rightAnswer] = generateProgressionAndRightAnswer($size);
    return [$question, $rightAnswer];
}
