<?php

namespace Brain\Game\Calc;

use function Brain\Games\Cli\checkAnswer;
use function Brain\Games\Cli\startGame;
use function cli\prompt;

function brainCalcStart(): void
{
    $name = startGame('What is the result of the expression?');
    for ($i = 1; $i <= 3; $i++) {
        $calc = generateCalc();
        $answer = mb_strtolower(prompt('Question: ' . $calc['QUESTION']));
        checkAnswer($answer, $calc['ANSWER'], $name);
    }
}

/**
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
}
