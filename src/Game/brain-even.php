<?php

declare(strict_types=1);

namespace Brain\Game\Even;

use function Brain\Games\Engine\play;

function brainEvenStart(): void
{
    $generateQuestionAndAnswer = function () {
        $num = rand(0, 100);
        return [
            'question' => $num,
            'answer' => $num % 2 === 0 ? 'yes' : 'no'
        ];
    };
    play('Answer "yes" if the number is even, otherwise answer "no".', $generateQuestionAndAnswer);
}
