<?php

use App\Stack;

function runTest() {
    // Тест метода __toString()
    echo PHP_EOL . "TEST1 (To String test)" . PHP_EOL;
    $stack1 = new Stack(12, 213, 322);
    $correct = "[322->213->12]";
    echo 'Ожидается: ' . PHP_EOL . $correct . PHP_EOL;
    echo 'Получено: ' . PHP_EOL . $stack1 . PHP_EOL;
    echo ($stack1 == $correct) ? "Тест пройден" . PHP_EOL : "Тест НЕ ПРОЙДЕН" . PHP_EOL;

    // Тест метода push() и pop()
    echo PHP_EOL . "TEST2 (Push & Pop test)" . PHP_EOL;
    $stack2 = new Stack();
    $stack2->push(10, 20, 30);
    echo "Добавлены элементы: 10, 20, 30" . PHP_EOL;
    echo "Удален элемент: " . $stack2->pop() . PHP_EOL; // 30
    echo "Удален элемент: " . $stack2->pop() . PHP_EOL; // 20
    echo "Ожидается: [10]" . PHP_EOL;
    echo "Получено: " . $stack2 . PHP_EOL;
    echo ($stack2 == "[10]") ? "Тест пройден" . PHP_EOL : "Тест НЕ ПРОЙДЕН" . PHP_EOL;

    // Тест метода top()
    echo PHP_EOL . "TEST3 (Top test)" . PHP_EOL;
    $stack3 = new Stack(100, 200, 300);
    echo "Ожидается: 300" . PHP_EOL;
    echo "Получено: " . $stack3->top() . PHP_EOL;
    echo ($stack3->top() === 300) ? "Тест пройден" . PHP_EOL : "Тест НЕ ПРОЙДЕН" . PHP_EOL;

    // Тест метода isEmpty()
    echo PHP_EOL . "TEST4 (IsEmpty test)" . PHP_EOL;
    $stack4 = new Stack();
    echo "Стек пустой: " . ($stack4->isEmpty() ? "Да" : "Нет") . PHP_EOL;
    $stack4->push(1);
    echo "Добавлен 1. Стек пустой: " . ($stack4->isEmpty() ? "Да" : "Нет") . PHP_EOL;
    echo ($stack4->isEmpty() === false) ? "Тест пройден" . PHP_EOL : "Тест НЕ ПРОЙДЕН" . PHP_EOL;

    // Тест метода copy()
    echo PHP_EOL . "TEST5 (Copy test)" . PHP_EOL;
    $stack5 = new Stack(5, 10, 15);
    $stackCopy = $stack5->copy();
    echo "Исходный стек: " . $stack5 . PHP_EOL;
    echo "Скопированный стек: " . $stackCopy . PHP_EOL;
    echo ($stack5 == $stackCopy) ? "Тест пройден" . PHP_EOL : "Тест НЕ ПРОЙДЕН" . PHP_EOL;

    // Тест метода pop() на пустом стеке
    echo PHP_EOL . "TEST6 (Pop on Empty Stack)" . PHP_EOL;
    $stack6 = new Stack();
    echo "Ожидается: null" . PHP_EOL;
    echo "Получено: " . var_export($stack6->pop(), true) . PHP_EOL;
    echo ($stack6->pop() === null) ? "Тест пройден" . PHP_EOL : "Тест НЕ ПРОЙДЕН" . PHP_EOL;

    // Тест метода top() на пустом стеке
    echo PHP_EOL . "TEST7 (Top on Empty Stack)" . PHP_EOL;
    echo "Ожидается: null" . PHP_EOL;
    echo "Получено: " . var_export($stack6->top(), true) . PHP_EOL;
    echo ($stack6->top() === null) ? "Тест пройден" . PHP_EOL : "Тест НЕ ПРОЙДЕН" . PHP_EOL;

    // Тест функции compareStrings()
    echo PHP_EOL . "TEST8 (Compare Strings test)" . PHP_EOL;
    $tests = [
        ["ab#c", "ade##c", true],
        ["a#c", "c", true],
        ["abc###", "a#b#", true],
        ["##a", "a", true],
        ["a###", "", true],
        ["abc#d", "abdd#", true],
    ];

    foreach ($tests as [$s1, $s2, $expected]) {
        $result = compareStrings($s1, $s2);
        echo "compareStrings(\"$s1\", \"$s2\") => " . ($result ? "true" : "false") . PHP_EOL;
        echo ($result === $expected) ? "Тест пройден" . PHP_EOL : "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }
}