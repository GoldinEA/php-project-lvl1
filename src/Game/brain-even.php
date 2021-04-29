<?php

namespace Brain\Game\Even;

use function Brain\Games\Cli\gameEngine;
use const Brain\Games\Cli\COUNT_ITERABLE;

/**
 * Определение четного числа.
 * @return void
 */
function brainEvenStart(): void
{
    $questions = array_map(function () {
        return getCorrectAnswer();
    }, array_fill(1, COUNT_ITERABLE, 0));
    gameEngine('Answer "yes" if the number is even, otherwise answer "no".', $questions);
}

/**
 * Метод генерации вопроса.
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
