<?php

namespace Brain\Game\Prime;

use function Brain\Games\Cli\checkAnswer;
use function cli\prompt;
use function Brain\Games\Cli\startGame;

/**
 * @return void
 */
function brainPrimeStart(): void
{
    $name = startGame('Answer "yes" if given number is prime. Otherwise answer "no".');
    for ($i = 1; $i <= 3; $i++) {
        $GCD = generatePrime();
        $answer = mb_strtolower(prompt('Question: ' . $GCD['QUESTION']));
        checkAnswer($answer, $GCD['ANSWER'], $name);
    }
}

/**
 * @return array
 */
function generatePrime(): array
{
    $randNum = rand(1, 100);
    return [
        'QUESTION' => "$randNum",
        'ANSWER' => gmp_prob_prime($randNum) === 2 ? 'yes' : 'no'
    ];
}
