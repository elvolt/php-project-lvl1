<?php

namespace BrainGames\Games\Calc;

const START_QUESTION_CALC = 'What is the result of the expression?';

function generateQuestion(): array
{
    $num1 = mt_rand(1, 100);
    $num2 = mt_rand(1, 100);
    $operators = ['+', '-', '*'];
    $operator = $operators[array_rand($operators)];
    $question = "{$num1} {$operator} {$num2}";
    return [$question, $num1, $num2, $operator];
}

function findRightAnswer(int $num1, int $num2, string $operator): string
{
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
    return (string)$result;
}

function start(): array
{
    [$question, $num1, $num2, $operator] = generateQuestion();
    $rightAnswer = findRightAnswer($num1, $num2, $operator);
    return [$question, $rightAnswer];
}
