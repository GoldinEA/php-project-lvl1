<?php

namespace Brain\Game\Prime;

use function Brain\Games\Engine\gameEngine;

/**
 * Определение простого числа.
 * @return void
 */
function brainPrimeStart(): void
{
    gameEngine('Answer "yes" if given number is prime. Otherwise answer "no".', generatePrime());
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
