<?php

namespace Brain\Game\Prime;

use function Brain\Games\Engine\game;

function brainPrimeStart(): void
{
    $generateQuestionAndAnswer = function () {
        $randNum = rand(1, 100);
        return [
            'question' => "$randNum",
            'answer' => gmp_prob_prime($randNum) === 2 ? 'yes' : 'no'
        ];
    };
    game('Answer "yes" if given number is prime. Otherwise answer "no".', $generateQuestionAndAnswer);
}
