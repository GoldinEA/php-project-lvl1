<?php

namespace Brain\Game\Calc;

use function Brain\Games\Cli\line;
use function Brain\Games\Cli\prompt;

/**
 * @param $name
 */
function brainCalcStart($name)
{
    line('What is the result of the expression?');
    $counter = 0;
    while ($counter < 3) {
        $calc = generateCalc();
        $answer = mb_strtolower(prompt('Question: ' . $calc['QUESTION']));
        $correctAnswer = $calc['ANSWER'];
        line('Your answer' . $answer);
        if ($answer == $correctAnswer) {
            line('Correct!');
            $counter++;
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, $name!");
            die();
        }
    }
}

/**
 * @return array
 */
function generateCalc(): array
{
    $type = rand(1, 3);
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);
    switch ($type) {
        case 1:
            return [
                'QUESTION' => "$num1 + $num2",
                'ANSWER' => $num1 + $num2
            ];
        case 2:
            return [
                'QUESTION' => "$num1 - $num2",
                'ANSWER' => $num1 - $num2
            ];
        case 3:
            return [
                'QUESTION' => "$num1 * $num2",
                'ANSWER' => $num1 * $num2
            ];
    }
}
