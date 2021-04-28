<?php

namespace Brain\Game\Even;

use function Brain\Game\Calc\generateCalc;
use function Brain\Games\Cli\checkAnswer;
use function cli\line;
use function cli\prompt;
use function Brain\Games\Cli\startGame;

function brainEvenStart(): void
{
    $name = startGame('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 1; $i <= 3; $i++) {
        $num = rand(0, 100);
        $correctAnswer = getCorrectAnswer($num);
        $answer = mb_strtolower(prompt('Question: ' . $num));
        checkAnswer($answer, $correctAnswer, $name);
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
