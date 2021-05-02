<?php

namespace Brain\Game\Progression;

use function Brain\Games\Engine\gameEngine;

/**
 * Прогрессия. Поиск пропущенных чисел в последовательности чисел.
 *
 * @return void
 */
function brainProgressionStart(): void
{
    gameEngine('What number is missing in the progression?', generateQuestionAndAnswer());
}

/**
 * Метод генерации прогрессии.
 *
 * @return array
 */
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

/**
 * Метод генерации вопроса.
 *
 * @return array
 */
function generateQuestionAndAnswer(): array
{
    $GCD = generateProgression();
    $randomNum = rand(0, count($GCD) - 1);
    $answer = $GCD[$randomNum];
    $GCD[$randomNum] = '..';
    return [
        'QUESTION' => implode(' ', $GCD),
        'ANSWER' => $answer
    ];
}
