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

        $progression = [];
        $hiddenElementIndex = mt_rand(0, PROGRESSION_SIZE - 1);
        for ($count = 1, $current = $start; $count <= PROGRESSION_SIZE; $count += 1, $current += $step) {
            $progression[] = $current;
        }

        $rightAnswer = $progression[$hiddenElementIndex];
        $progression[$hiddenElementIndex] = '..';
        $question = implode(' ', $progression);

        return [$question, (string)$rightAnswer];
    };

    startGame(TASK, $generateQuestionAndRightAnswer);
}
