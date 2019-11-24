<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\startGame;

const TASK = 'Find the greatest common divisor of given numbers.';
const MIN_NUM = 1;
const MAX_NUM = 100;

function launchGame(): void
{
    $generateQuestionAndRightAnswer = function () {
        $num1 = mt_rand(MIN_NUM, MAX_NUM);
        $num2 = mt_rand(MIN_NUM, MAX_NUM);

        $result = 0;
        if (($num1 === 1) || ($num2 === 1)) {
            $result = 1;
        }
        $min = min($num1, $num2);
        for ($i = $min; $i >= 1; $i -= 1) {
            if (($num1 % $i === 0) && ($num2 % $i === 0)) {
                $result = $i;
                break;
            }
        }

        $rightAnswer = (string)$result;
        $question = "{$num1} {$num2}";
        return [$question, $rightAnswer];
    };

    startGame(TASK, $generateQuestionAndRightAnswer);
}
