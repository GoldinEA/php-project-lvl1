<?php

namespace Brain\Game\GCD;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Cli\startGame;

function brainGCDStart(): void
{
    $name = startGame('Find the greatest common divisor of given numbers.');
    $counter = 0;
    while ($counter < 3) {
        $GCD = generateGCD();
        $answer = prompt('Question: ' . $GCD['QUESTION']);
        $correctAnswer = $GCD['ANSWER'];
        line('Your answer' . $answer);
        if ($answer == $correctAnswer) {
            line('Correct!');
            $counter++;
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, $name!");
            die();
        }
    }
    line("Congratulations, $name!");
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
