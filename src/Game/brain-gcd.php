<?php

namespace Brain\Game\GCD;

use function Brain\Games\Engine\gameEngine;

/**
 * Определение наибольшего общего делителя.
 * @return void
 */
function brainGCDStart(): void
{
    gameEngine('Find the greatest common divisor of given numbers.', generateGCD());
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
