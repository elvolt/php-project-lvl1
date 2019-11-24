<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\startGame;

const TASK = 'Answer "yes" if the number is even, otherwise answer "no"';
const MIN_NUM = 1;
const MAX_NUM = 100;

function isEven(int $num): bool
{
    return ($num % 2 === 0);
}

function launchGame(): void
{
    $generateQuestionAndRightAnswer = function () {
        $num = mt_rand(MIN_NUM, MAX_NUM);
        $question = "$num";
        $rightAnswer = isEven($num) ? 'yes' : 'no';

        return [$question, $rightAnswer];
    };

    startGame(TASK, $generateQuestionAndRightAnswer);
}
