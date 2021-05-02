<?php

namespace Brain\Game\Even;

use function Brain\Games\Engine\gameEngine;

/**
 * Определение четного числа.
 * @return void
 */
function brainEvenStart(): void
{
    gameEngine('Answer "yes" if the number is even, otherwise answer "no".', getCorrectAnswer());
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
