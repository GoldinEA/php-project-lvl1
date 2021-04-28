<?php

namespace Brain\Game\GCD;

use function Brain\Games\Cli\checkAnswer;
use function cli\line;
use function cli\prompt;
use function Brain\Games\Cli\startGame;

function brainGCDStart(): void
{
    $name = startGame('Find the greatest common divisor of given numbers.');
    for ($i = 1; $i <= 3; $i++) {
        $GCD = generateGCD();
        $answer = prompt('Question: ' . $GCD['QUESTION']);
        checkAnswer($answer, $GCD['ANSWER'], $name);
    }
}

/**
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
