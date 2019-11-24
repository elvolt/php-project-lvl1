<?php

namespace BrainGames\Engine;

use function cli\{line, prompt};

const RIGHT_ANSWERS_TO_WIN = 3;

function startGame(string $task, callable $findQuestionAndRightAnswer): void
{
    line('Welcome to the Brain Games!');
    line($task . PHP_EOL);

    $name = prompt('May I have your name?');
    line("Hello, {$name}!" . PHP_EOL);

    $rightAnswersCnt = 0;
    while ($rightAnswersCnt < RIGHT_ANSWERS_TO_WIN) {
        [$question, $rightAnswer] = $findQuestionAndRightAnswer();
        line("Question: {$question}");
        $userAnswer = prompt('Your answer');
        if ($userAnswer === $rightAnswer) {
            line('Correct!');
            $rightAnswersCnt += 1;
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'");
            line("Let's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, {$name}");
}
