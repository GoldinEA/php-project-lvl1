<?php

namespace Brain\Game\Even;

use function Brain\Games\Cli\line;
use function Brain\Games\Cli\prompt;

/**
 * @param $name
 */
function brainEvenStart($name)
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $counter = 0;
    while ($counter < 3) {
        $num = rand(0, 100);
        $correctAnswer = getCorrectAnswer($num);
        $answer = mb_strtolower(prompt('Question: ' . $num));
        line('Your answer' . $answer);
        if ($answer === $correctAnswer) {
            line('Correct!');
            $counter++;
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, $name!");
            die();
        }
    }
}

/**
 * @param int $num Число.
 *
 * @return string
 */
function getCorrectAnswer(int $num): string
{
    return $num % 2 === 0 ? 'yes' : 'no';
}
