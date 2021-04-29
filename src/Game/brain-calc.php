<?php

namespace Brain\Game\Calc;

use function Brain\Games\Cli\gameEngine;
use const Brain\Games\Cli\COUNT_ITERABLE;

/**
 * Калькулятор. Арифметические выражения, которые необходимо вычислить.
 * @return void
 */
function brainCalcStart(): void
{
    $questions = array_map(function () {
        return generateCalc();
    }, array_fill(1, COUNT_ITERABLE, 0));
    gameEngine('What is the result of the expression?', $questions);
}

/**
 * Метод генерации вопроса.
 *
 * @return array
 */
function generateCalc(): array
{
    $type = rand(1, 3);
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);
    switch ($type) {
        case 1:
            return [
                'QUESTION' => "$num1 + $num2",
                'ANSWER' => $num1 + $num2
            ];
        case 2:
            return [
                'QUESTION' => "$num1 - $num2",
                'ANSWER' => $num1 - $num2
            ];
        case 3:
            return [
                'QUESTION' => "$num1 * $num2",
                'ANSWER' => $num1 * $num2
            ];
    }
    return [];
}
