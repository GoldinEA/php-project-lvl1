<?php

namespace Brain\Game\Progression;

use function Brain\Games\Engine\game;

function brainProgressionStart(): void
{
    $generateQuestionAndAnswer = function () {
        $gcd = generateProgression();
        $randomNum = rand(0, count($gcd) - 1);
        $answer = $gcd[$randomNum];
        $gcd[$randomNum] = '..';
        return [
            'question' => implode(' ', $gcd),
            'answer' => $answer
        ];
    };
    game('What number is missing in the progression?', $generateQuestionAndAnswer);
}

function generateProgression(): array
{
    $count = rand(5, 10);
    $randNumStart = rand(1, 100);
    $randNumProg = rand(1, 100);
    $result = [];
    $result[0] = $randNumStart;
    for ($i = 1; $i <= $count; $i++) {
        $result[$i] = $randNumStart += $randNumProg;
    }
    return $result;
}
