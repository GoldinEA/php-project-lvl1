<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const COUNT_TRUE_QUESTIONS = 2;

function startGame(string $startPhrase = 'Welcome to the Brain Games!'): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line('Hello, ' . $name);
    line($startPhrase);
    return $name;
}


function game(string $startPhrase, callable $questions): void
{
    $name = startGame($startPhrase);
    for ($i = 0; $i <= COUNT_TRUE_QUESTIONS; $i++) {
        $arrayQuestions = $questions();
        $answer = mb_strtolower(prompt('Question: ' . $arrayQuestions['question']));
        line('Your answer ' . $answer);
        if ($answer == $arrayQuestions['answer']) {
            line('Correct!');
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '{$arrayQuestions['answer']}'.");
            line("Let's try again, $name!");
        }
    }
}
