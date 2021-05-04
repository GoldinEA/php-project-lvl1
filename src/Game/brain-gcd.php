<?php

namespace Brain\Game\GCD;

use function Brain\Games\Engine\game;

function brainGCDStart(): void
{
    $generateQuestionAndAnswer = function () {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        return [
            'question' => "$num1  $num2",
            'answer' => gmp_gcd($num1, $num2)
        ];
    };
    game('Find the greatest common divisor of given numbers.', $generateQuestionAndAnswer);
}

