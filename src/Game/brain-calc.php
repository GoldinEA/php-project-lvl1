<?php

namespace Brain\Game\Calc;

use function Brain\Games\Engine\game;


function brainCalcStart(): void
{
    $generateQuestionAndAnswer = function () {
        $type = rand(1, 3);
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        switch ($type) {
            case 1:
                return [
                    'question' => "$num1 + $num2",
                    'answer' => (string)($num1 + $num2)
                ];
            case 2:
                return [
                    'question' => "$num1 - $num2",
                    'answer' => (string)($num1 - $num2)
                ];
            case 3:
                return [
                    'question' => "$num1 * $num2",
                    'answer' => (string)($num1 * $num2)
                ];
        }
        return [];
    };
    game('What is the result of the expression?', $generateQuestionAndAnswer);
}

