<?php

namespace BrainGames\Games\Prime;

const START_QUESTION_PRIME = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function generateQuestion(): array
{
    $num = mt_rand(1, 100);
    $question = "$num";
    return [$question, $num];
}

function isPrime(int $num): bool
{
    if ($num < 2) {
        return false;
    }

    for ($i = 2; $i <= $num / 2; $i += 1) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}

function findRightAnswer(int $num): string
{
    return isPrime($num) ? 'yes' : 'no';
}

function start(): array
{
    [$question, $num] = generateQuestion();
    $rightAnswer = findRightAnswer($num);
    return [$question, $rightAnswer];
}
