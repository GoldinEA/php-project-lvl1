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
 * Начало игры.
 * @return string
 */
function startGame(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line('Hello, '. $name);
    return $name;
}
