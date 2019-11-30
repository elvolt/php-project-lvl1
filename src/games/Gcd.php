<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\startGame;

const TASK = 'Find the greatest common divisor of given numbers.';
const MIN_NUM = 1;
const MAX_NUM = 100;

function findGCD(int $num1, int $num2): int
{
    $max = max($num1, $num2);
    $min = min($num1, $num2);

    $reminder = $max % $min;

    return ($reminder === 0) ? $min : findGCD($min, $reminder);
}

function launchGame(): void
{
    $generateQuestionAndRightAnswer = function () {
        $num1 = mt_rand(MIN_NUM, MAX_NUM);
        $num2 = mt_rand(MIN_NUM, MAX_NUM);

        $rightAnswer = findGCD($num1, $num2);
        $question = "{$num1} {$num2}";
        return [$question, $rightAnswer];
    };

    startGame(TASK, $generateQuestionAndRightAnswer);
}
