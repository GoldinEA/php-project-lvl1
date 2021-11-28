<?php

declare(strict_types=1);

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const COUNT_TRUE_ANSWERS = 3;

function play(string $startPhrase, callable $questions): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line('Hello, ' . $name);
    line($startPhrase);
    for ($i = 0; $i <= COUNT_TRUE_ANSWERS - 1; $i++) {
        $arrayQuestions = $questions();
        $answer = mb_strtolower(prompt('Question: ' . $arrayQuestions['question']));
        line('Your answer ' . $answer);
        if ($answer == $arrayQuestions['answer']) {
            line('Correct!');
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '{$arrayQuestions['answer']}'.");
            line("Let's try again, $name!");
            die();
        }
    }
}
