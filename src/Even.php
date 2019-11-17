<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function isEven(int $num): bool
{
    return ($num % 2 === 0);
}

function findRightAnswer(int $question): string
{
    return isEven($question) ? 'yes' : 'no';
}

function Even(): void
{
    line('Welcome to the Brain Games!' . PHP_EOL);
    line('Answer "yes" if the number is even, otherwise answer "no"' . PHP_EOL);

    $name = prompt('May I have your name?');
    line("Hello, {$name}!" . PHP_EOL);

    $rightAnswersCnt = 0;
    while ($rightAnswersCnt < 3) {
        $question = mt_rand(1, 100);
        line("Question: {$question}");
        $userAnswer = prompt('Your answer: ');
        $rightAnswer = findRightAnswer($question);
        if ($userAnswer === $rightAnswer) {
            line('Correct!');
            $rightAnswersCnt += 1;
        } else {
            line("Let's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, {$name}");
}
