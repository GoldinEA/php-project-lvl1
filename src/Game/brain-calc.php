<?php

namespace Brain\Game\Calc;

use function Brain\Games\Engine\gameEngine;

/**
 * Калькулятор. Арифметические выражения, которые необходимо вычислить.
 * @return void
 */
function brainCalcStart(): void
{
    gameEngine('What is the result of the expression?', generateCalc());
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
