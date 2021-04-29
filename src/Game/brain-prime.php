<?php

namespace Brain\Game\Prime;

use function Brain\Games\Cli\gameEngine;
use const Brain\Games\Cli\COUNT_ITERABLE;
use const Brain\Games\Cli\START_INDEX_ARRAY;
use const Brain\Games\Cli\VALUE_ARRAY;

/**
 * Определение простого числа.
 * @return void
 */
function brainPrimeStart(): void
{
    $questions = array_map(function () {
        return generatePrime();
    }, array_fill(START_INDEX_ARRAY, COUNT_ITERABLE, VALUE_ARRAY));
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
