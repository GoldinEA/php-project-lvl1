<?php

namespace Brain\Game\Even;

use function Brain\Games\Cli\gameEngine;
use const Brain\Games\Cli\COUNT_ITERABLE;

/**
 *
 */
function brainEvenStart(): void
{
    $questions = array_map(function () {
        return getCorrectAnswer();
    }, array_fill(1, COUNT_ITERABLE, 0));
    gameEngine('Answer "yes" if the number is even, otherwise answer "no".', $questions);
}

/**
 * @return array
 */
function getCorrectAnswer(): array
{
    $num = rand(0, 100);
    return [
        'QUESTION' => $num,
        'ANSWER' => $num % 2 === 0 ? 'yes' : 'no'
    ];
}
