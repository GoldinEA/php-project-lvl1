<?php

namespace Brain\Game\Progression;

use function Brain\Games\Cli\gameEngine;
use const Brain\Games\Cli\COUNT_ITERABLE;

/**
 * Прогрессия. Поиск пропущенных чисел в последовательности чисел.
 * @return void
 */
function brainProgressionStart(): void
{
    $questions = array_map(function () {
        $GCD = generateProgression();
        return generateQuestionAndAnswer($GCD);
    }, array_fill(1, COUNT_ITERABLE, 0));
    gameEngine('What number is missing in the progression?', $questions);
}

/**
 * Метод генерации прогрессии.
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
 * @param array $data Данные для построения вопроса.
 *
 * @return array
 */
function generateQuestionAndAnswer(array $data): array
{
    $randomNum = rand(0, count($data) - 1);
    $answer = $data[$randomNum];
    $data[$randomNum] = '..';
    return [
        'QUESTION' => implode(' ', $data),
        'ANSWER' => $answer
    ];
}
