<?php

namespace Brain\Game\GCD;

use function Brain\Games\Cli\gameEngine;
use const Brain\Games\Cli\COUNT_ITERABLE;

/**
 * Определение наибольшего общего делителя.
 * @return void
 */
function brainGCDStart(): void
{
    $questions = array_map(function () {
        return generateGCD();
    }, array_fill(1, COUNT_ITERABLE, 0));
    gameEngine('Find the greatest common divisor of given numbers.', $questions);
}

/**
 * Метод генерации вопроса.
 * @return array
 */
function generateGCD(): array
{
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);
    return [
        'QUESTION' => "$num1  $num2",
        'ANSWER' => gmp_gcd($num1, $num2)
    ];
}
