<?php

namespace BrainGames\Games\Gcd;

const START_QUESTION_GCD = 'Find the greatest common divisor of given numbers.';

function generateQuestion(): array
{
    $num1 = mt_rand(1, 100);
    $num2 = mt_rand(1, 100);
    $question = "{$num1} {$num2}";
    return [$question, $num1, $num2];
}

function findRightAnswer(int $num1, int $num2): string
{
    if (($num1 === 0) || ($num2 === 0)) {
        return '0';
    }
    if (($num1 === 1) || ($num2 === 1)) {
        return '1';
    }
    $min = min($num1, $num2);
    for ($i = $min; $i >= 1; $i -= 1) {
        if (($num1 % $i === 0) && ($num2 % $i === 0)) {
            return "$i";
        }
    }
}

function start(): array
{
    [$question, $num1, $num2] = generateQuestion();
    $rightAnswer = findRightAnswer($num1, $num2);
    return [$question, $rightAnswer];
}
