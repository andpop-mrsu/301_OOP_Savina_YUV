<?php

declare(strict_types=1);

namespace App;

class Test
{
    public static function runTest(): void
    {
        echo "=== Запуск тестов класса Vector ===\n\n";

        // String representation test
        echo "--- Тест метода __toString() ---\n";
        $v1 = new Vector(1, 2, 3);
        echo "Ожидается: (1; 2; 3)" . PHP_EOL;
        echo "Получено:  " . $v1 . PHP_EOL;
        echo PHP_EOL;

        // Adding test
        echo "--- Тест метода add() (сложение векторов) ---\n";
        $v2 = new Vector(1, 4, -2);
        $v3 = $v1->add($v2);
        echo "Ожидается: (2; 6; 1)" . PHP_EOL;
        echo "Получено:  " . $v3 . PHP_EOL;
        echo PHP_EOL;

        // Subtraction test
        echo "--- Тест метода sub() (вычитание векторов) ---\n";
        $v4 = $v1->sub($v2);
        echo "Ожидается: (0; -2; 5)" . PHP_EOL;
        echo "Получено:  " . $v4 . PHP_EOL;
        echo PHP_EOL;

        // Scalar multiplication test
        echo "--- Тест метода product() (умножение вектора на число) ---\n";
        $v5 = $v1->product(3);
        echo "Ожидается: (3; 6; 9)" . PHP_EOL;
        echo "Получено:  " . $v5 . PHP_EOL;
        echo PHP_EOL;

        // Dot product test (скалярное произведение)
        echo "--- Тест метода scalarProduct() (скалярное произведение) ---\n";
        $scalar = $v1->scalarProduct($v2);
        echo "Ожидается: 3" . PHP_EOL;
        echo "Получено:  " . $scalar . PHP_EOL;
        echo PHP_EOL;

        // Cross product test (векторное произведение)
        echo "--- Тест метода vectorProduct() (векторное произведение) ---\n";
        $v6 = $v1->vectorProduct($v2);
        echo "Ожидается: (-16; 5; 2)" . PHP_EOL;
        echo "Получено:  " . $v6 . PHP_EOL;
        echo PHP_EOL;

        echo "=== Все тесты завершены ===\n";
    }
}
