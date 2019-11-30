<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\startGame;

const TASK = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const MIN_NUM = 1;
const MAX_NUM = 100;

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

function launchGame(): void
{
    $generateQuestionAndRightAnswer = function () {
        $question = mt_rand(MIN_NUM, MAX_NUM);
        $rightAnswer = isPrime($question) ? 'yes' : 'no';

        return [$question, $rightAnswer];
    };

    startGame(TASK, $generateQuestionAndRightAnswer);
}
