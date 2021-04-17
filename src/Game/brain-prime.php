<?php

namespace Brain\Game\Prime;

use function Brain\Games\Cli\line;
use function Brain\Games\Cli\prompt;

/**
 * @param $name
 */
function brainPrimeStart($name)
{
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    $counter = 0;
    while ($counter < 3) {
        $GCD = \Brain\Games\Cli\generatePrime();
        $answer = mb_strtolower(prompt('Question: ' . $GCD['QUESTION']));
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
function generatePrime()
{
    $randNum = rand(1, 100);
    return [
        'QUESTION' => "$randNum",
        'ANSWER' => gmp_prob_prime($randNum) === 2 ? 'yes' : 'no'
    ];
}