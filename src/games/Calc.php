<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\startGame;

const TASK = 'What is the result of the expression?';
const MIN_NUM = 1;
const MAX_NUM = 100;
const OPERATORS = ['+', '-', '*'];

function launchGame(): void
{
    $generateQuestionAndRightAnswer = function () {
        $num1 = mt_rand(MIN_NUM, MAX_NUM);
        $num2 = mt_rand(MIN_NUM, MAX_NUM);
        $operator = OPERATORS[array_rand(OPERATORS)];

        $result = 0;
        switch ($operator) {
            case '+':
                $result = $num1 + $num2;
                break;
            case '-':
                $result = $num1 - $num2;
                break;
            case '*':
                $result = $num1 * $num2;
                break;
        }

        $rightAnswer = $result;
        $question = "{$num1} {$operator} {$num2}";

        return [$question, $rightAnswer];
    };

    startGame(TASK, $generateQuestionAndRightAnswer);
}
