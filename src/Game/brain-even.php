<?php

namespace Brain\Game\Even;

use function Brain\Games\Engine\game;

function brainEvenStart(): void
{
    $generateQuestionAndAnswer = function () {
        $num = rand(0, 100);
        return [
            'question' => $num,
            'answer' => $num % 2 === 0 ? 'yes' : 'no'
        ];
    };
    game('Answer "yes" if the number is even, otherwise answer "no".', $generateQuestionAndAnswer);
}
