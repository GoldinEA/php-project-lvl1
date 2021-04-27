<?php

namespace Brain\Game\Prime;

use function Brain\Games\Cli\line;
use function Brain\Games\Cli\prompt;
use function Brain\Games\Cli\startGame;

function brainPrimeStart(): void
{
    $name = startGame('Answer "yes" if given number is prime. Otherwise answer "no".');
    $counter = 0;
    while ($counter < 3) {
        $GCD = generatePrime();
        $answer = mb_strtolower(prompt('Question: ' . $GCD['QUESTION']));
        $correctAnswer = $GCD['ANSWER'];
        line('Your answer' . $answer);
        if ($answer === $correctAnswer) {
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
function generatePrime()
{
    $randNum = rand(1, 100);
    return [
        'QUESTION' => "$randNum",
        'ANSWER' => gmp_prob_prime($randNum) === 2 ? 'yes' : 'no'
    ];
}
