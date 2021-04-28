<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

/**
 * Начало игры.
 *
 * @param $startPhrase
 *
 * @return string
 */
function startGame($startPhrase): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line('Hello, ' . $name);
    line($startPhrase);
    return $name;
}


/**
 * @param $userAnswer
 * @param $correctAnswer
 * @param $userName
 */
function checkAnswer($userAnswer, $correctAnswer, $userName): void
{
    line('Your answer' . $userAnswer);
    if ($userAnswer == $correctAnswer) {
        line('Correct!');
    } else {
        line("'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
        line("Let's try again, $userName!");
        die();
    }
}
