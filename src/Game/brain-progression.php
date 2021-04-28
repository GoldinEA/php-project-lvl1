<?php

namespace Brain\Game\Progression;

use function Brain\Games\Cli\checkAnswer;
use function cli\line;
use function cli\prompt;
use function Brain\Games\Cli\startGame;

/**
 * @return void
 */
function brainProgressionStart(): void
{
    $name = startGame('What number is missing in the progression?');

    for ($i = 1; $i <= 3; $i++) {
        $GCD = generateProgression();
        $data = generateQuestionAndAnswer($GCD);
        $answer = prompt('Question: ' . $data['QUESTION_STR']);
        checkAnswer($answer, $data['ANSWER_CORRECT'], $name);
    }
    line("Congratulations, $name!");
}

/**
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
 * @param $data
 *
 * @return array
 */
function generateQuestionAndAnswer($data): array
{
    $randomNum = rand(0, count($data) - 1);
    $answer = $data[$randomNum];
    $data[$randomNum] = '..';
    return [
        'QUESTION_STR' => implode(' ', $data),
        'ANSWER_CORRECT' => $answer
    ];
}
