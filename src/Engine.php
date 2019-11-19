<?php

namespace BrainGames\Engine;

use function cli\{line, prompt};

use const BrainGames\Games\Even\START_QUESTION_EVEN;
use const BrainGames\Games\Calc\START_QUESTION_CALC;
use const BrainGames\Games\Gcd\START_QUESTION_GCD;
use const BrainGames\Games\Progression\START_QUESTION_PROGRESSION;
use const BrainGames\Games\Prime\START_QUESTION_PRIME;

function startGame(string $game): void
{
    $startQuestions = [
        "Even" => START_QUESTION_EVEN,
        "Calc" => START_QUESTION_CALC,
        "Gcd" => START_QUESTION_GCD,
        "Progression" => START_QUESTION_PROGRESSION,
        "Prime" => START_QUESTION_PRIME
    ];

    line('Welcome to the Brain Games!');
    line($startQuestions[$game] . PHP_EOL);

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
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'");
            line("Let's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, {$name}");
}
