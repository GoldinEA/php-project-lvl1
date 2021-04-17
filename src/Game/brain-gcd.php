<?php

namespace Brain\Game\GCD;

use function Brain\Games\Cli\line;
use function Brain\Games\Cli\prompt;

/**
 * @param $name
 */
function brainGCDStart($name)
{
    line('Find the greatest common divisor of given numbers.');
    $counter = 0;
    while ($counter < 3) {
        $GCD = \Brain\Games\Cli\generateGCD();
        $answer = prompt('Question: ' . $GCD['QUESTION']);
        $correctAnswer = $GCD['ANSWER'];
        line('Your answer' . $answer);
        if ($answer === $correctAnswer) {
            line('Correct!');
            $counter++;
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, $name!");
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