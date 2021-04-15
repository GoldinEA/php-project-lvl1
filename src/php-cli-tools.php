<?php

namespace Brain\Games\Cli;

/**
 * Написать строку.
 *
 * @param string $string Вопрос.
 */
function line(string $string)
{
    echo $string, PHP_EOL;
}

/**
 * Задать вопрос и получить ответ.
 *
 * @param string $string Вопрос.
 *
 * @return string
 */
function prompt(string $string): string
{
    echo $string, PHP_EOL;
    return trim(fgets(STDIN));
}

/**
 * @param $name
 */
function brainEvenStart($name)
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $counter = 0;
    while ($counter < 3) {
        $num = rand(0, 100);
        $correctAnswer = getCorrectAnswer($num);
        $answer = mb_strtolower(prompt('Question: ' . $num));
        line('Your answer' . $answer);
        if ($answer === $correctAnswer) {
            line('Correct!');
            $counter++;
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, $name!");
        }
    }
}

/**
 * @param int $num Число.
 *
 * @return string
 */
function getCorrectAnswer(int $num): string
{
    return $num % 2 === 0 ? 'yes' : 'no';
}

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
        if ($answer === $correctAnswer) {
            line('Correct!');
            $counter++;
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, $name!");
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

/**
 * @param $name
 */
function brainGCDStart($name)
{
    line('Find the greatest common divisor of given numbers.');
    $counter = 0;
    while ($counter < 3) {
        $GCD = generateGCD();
        $answer = mb_strtolower(prompt('Question: ' . $GCD['QUESTION']));
        $correctAnswer = $GCD['ANSWER'];
        line('Your answer' . $answer);
        if ($answer === $correctAnswer) {
            line('Correct!');
            $counter++;
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, $name!");
        }
    }
    line("Congratulations, $name!");
}

/**
 * @return array
 */
function generateGCD(): array
{
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);
    return [
        'QUESTION' => "$num1  $num2",
        'ANSWER' => gmp_gcd($num1, $num2)
    ];
}