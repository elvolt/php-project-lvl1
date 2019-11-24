<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\startGame;

const TASK = 'What number is missing in the progression?';
const PROGRESSION_SIZE = 10;
const MIN_NUM = 1;
const MAX_NUM = 100;

function launchGame(): void
{
    $generateQuestionAndRightAnswer = function () {
        $start = mt_rand(MIN_NUM, MAX_NUM);
        $step = mt_rand(MIN_NUM, MAX_NUM);

        $result = [];
        $emptyIndex = mt_rand(0, PROGRESSION_SIZE - 1);
        for ($count = 1, $num = $start; $count <= PROGRESSION_SIZE; $count += 1, $num += $step) {
            $result[] = (string)$num;
        }

        $rightAnswer = $result[$emptyIndex];
        $result[$emptyIndex] = '..';
        $question = implode(' ', $result);

        return [$question, $rightAnswer];
    };

    startGame(TASK, $generateQuestionAndRightAnswer);
}
