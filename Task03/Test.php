<?php

use Task03\Book;
use Task03\BooksList;

function assertEqual($expected, $actual, string $testName): void
{
    $passed = $expected === $actual;
    $result = $passed ? "✅ PASSED" : "❌ FAILED";

    echo "=== $testName ===\n";
    echo "Expected:\n" . var_export($expected, true) . "\n";
    echo "Actual:\n" . var_export($actual, true) . "\n";
    echo "Result: $result\n\n";
}

function runTest(): void
{
    echo "=== Running Tests ===\n\n";

    $book = new Book("PHP for Beginners", ["John Doe"], "TechBooks", 2020);
    $expectedString = "Id: {$book->getId()}\nНазвание: PHP for Beginners\nАвтор1: John Doe\nИздательство: TechBooks\nГод: 2020\n";
    assertEqual($expectedString, (string)$book, "Book::getters()");

    $book->setTitle("PHP Basics")->setAuthors(["Alice Smith", "Bob Johnson"])->setPublisher("NewTech")->setYear(2021);
    $expectedString = "Id: {$book->getId()}\nНазвание: PHP Basics\nАвтор1: Alice Smith\nАвтор2: Bob Johnson\nИздательство: NewTech\nГод: 2021\n";
    assertEqual($expectedString, (string)$book, "Book::setters()");

    $bookList = new BooksList();
    assertEqual(0, $bookList->count(), "BooksList::count() before adding");

    $bookList->add($book);
    assertEqual(1, $bookList->count(), "BooksList::count() after adding");

    assertEqual((string)$book, (string)$bookList->get(0), "BooksList::get(0)");
    assertEqual((string)null, (string)$bookList->get(1), "BooksList::get(1) out of range");

    $file = 'books_test.dat';
    $bookList->store($file);

    $loadedList = new BooksList();
    $loadedList->load($file);
    assertEqual(1, $loadedList->count(), "BooksList::load() count check");
    assertEqual((string)$book, (string)$loadedList->get(0), "BooksList::load() book data check");

    unlink($file);

    echo "=== Tests Completed ===\n";
}
