<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

/**
 * @const Количество правильных ответов для победы.
 */
const COUNT_ATTEMPT = 3;

/**
 * Начало игры.
 *
 * @param string $startPhrase Стартовая фраза.
 *
 * @return string
 */
function startGame(string $startPhrase = 'Welcome to the Brain Games!'): string
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
 *
 * @return void
 */
function gameEngine(string $startPhrase, array $questions): void
{
    $name = startGame($startPhrase);
    for ($i = 1; $i <= COUNT_ATTEMPT; $i++) {
        $answer = mb_strtolower(prompt('Question: ' . $questions['QUESTION']));
        if (!checkAnswer($answer, (string)$questions['ANSWER'], $name)) {
            die();
        }
    }
}

/**
 * Проверка ответа.
 *
 * @param string $userAnswer    Ответ игрока.
 * @param string $correctAnswer Правильный ответ.
 * @param string $userName      Пользователь.
 *
 * @return bool
 */
function checkAnswer(string $userAnswer, string $correctAnswer, string $userName): bool
{
    line('Your answer ' . $userAnswer);
    if ($userAnswer == $correctAnswer) {
        line('Correct!');
        return true;
    } else {
        line("'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
        line("Let's try again, $userName!");
        return false;
    }
}
