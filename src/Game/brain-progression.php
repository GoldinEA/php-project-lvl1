<?php

namespace Brain\Game\Progression;

use function Brain\Games\Cli\line;
use function Brain\Games\Cli\prompt;

/**
 * @param $name
 */
function brainProgressionStart($name)
{
    line('What number is missing in the progression?');
    $counter = 0;
    while ($counter < 3) {
        $GCD = generateProgression();
        $answer = prompt('Question: ' . $GCD['QUESTION_STR']);
        $correctAnswer = $GCD['ANSWER_CORRECT'];
        line('Your answer' . $answer);
        if ((int)$answer === (int)$correctAnswer) {
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
function generateProgression()
{
    $count = rand(5, 10);
    $randNum = rand(1, $count);
    $randNumStart = rand(1, 100);
    $randNumProg = rand(1, 100);
    $questionStr = '';
    $i = 1;
    $answerCorrect = 0;
    $questionStr .= $randNumStart;
    while ($i <= $count) {
        $randNumStart += $randNumProg;
        if ($i === $randNum) {
            $questionStr .= ', ...';
            $answerCorrect = $randNumStart;
        } else {
            $questionStr .= ', ' . $randNumStart;
        }

        $i++;
    }
    return [
        'QUESTION_STR' => $questionStr,
        'ANSWER_CORRECT' => $answerCorrect,
    ];
}
