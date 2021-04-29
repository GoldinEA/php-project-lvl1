<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

/**
 *
 */
const COUNT_ITERABLE = 3;

/**
 * Начало игры.
 *
 * @param string $startPhrase Стартовая фраза.
 *
 * @return string
 */
function startGame(string $startPhrase): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line('Hello, ' . $name);
    line($startPhrase);
    return $name;
}


/**
 * Игровой движок.
 *
 * @param string $startPhrase Стартовая фраза.
 * @param array  $questions   Массив с вопросами.
 */
function gameEngine(string $startPhrase, array $questions): void
{
    $name = startGame($startPhrase);
    for ($i = 1; $i <= COUNT_ITERABLE; $i++) {
        $answer = mb_strtolower(prompt('Question: ' . $questions[$i]['QUESTION']));
        checkAnswer($answer, (string)$questions[$i]['ANSWER'], $name);
    }
}

/**
 * Проверка ответа.
 *
 * @param string $userAnswer    Ответ игрока.
 * @param string $correctAnswer Правильный ответ.
 * @param string $userName      Пользователь.
 */
function checkAnswer(string $userAnswer, string $correctAnswer, string $userName): void
{
    line('Your answer ' . $userAnswer);
    if ($userAnswer == $correctAnswer) {
        line('Correct!');
    } else {
        line("'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
        line("Let's try again, $userName!");
        die();
    }
}
