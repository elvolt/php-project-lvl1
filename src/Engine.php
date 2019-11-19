<?php

namespace BrainGames\Engine;

use function cli\{line, prompt};

use const BrainGames\Games\Even\START_QUESTION_EVEN;
use const BrainGames\Games\Calc\START_QUESTION_CALC;

function startGame(string $game): void
{
    line('Welcome to the Brain Games!');
    switch ($game) {
        case "Even":
            line(START_QUESTION_EVEN . PHP_EOL);
            break;
        case "Calc":
            line(START_QUESTION_CALC . PHP_EOL);
            break;
    }

    $name = prompt('May I have your name?');
    line("Hello, {$name}!" . PHP_EOL);

    $rightAnswersCnt = 0;
    while ($rightAnswersCnt < 3) {
        [$question, $rightAnswer] = call_user_func('\\BrainGames\\Games\\' . $game . '\\start');
        line("Question: {$question}");
        $userAnswer = prompt('Your answer: ');
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
