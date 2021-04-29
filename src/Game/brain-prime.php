<?php

namespace Brain\Game\Prime;

use function Brain\Games\Cli\gameEngine;
use const Brain\Games\Cli\COUNT_ITERABLE;

/**
 * Определение простого числа.
 * @return void
 */
function brainPrimeStart(): void
{
    $questions = array_map(function () {
        return generatePrime();
    }, array_fill(1, COUNT_ITERABLE, 0));
    gameEngine('Answer "yes" if given number is prime. Otherwise answer "no".', $questions);
}

/**
 * Метод генерации вопроса.
 * @return array
 */
function generatePrime(): array
{
    $randNum = rand(1, 100);
    return [
        'QUESTION' => "$randNum",
        'ANSWER' => gmp_prob_prime($randNum) === 2 ? 'yes' : 'no'
    ];
}
