<?php

namespace BrainGames\Games\Even;

const START_QUESTION_EVEN = 'Answer "yes" if the number is even, otherwise answer "no"';

function generateQuestion(): array
{
    $num = mt_rand(1, 100);
    $question = "$num";
    return [$question, $num];
}

function isEven(int $num): bool
{
    return ($num % 2 === 0);
}

function findRightAnswer(int $num): string
{
    return isEven($num) ? 'yes' : 'no';
}

function start(): array
{
    [$question, $num] = generateQuestion();
    $rightAnswer = findRightAnswer($num);
    return [$question, $rightAnswer];
}
