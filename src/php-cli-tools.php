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
