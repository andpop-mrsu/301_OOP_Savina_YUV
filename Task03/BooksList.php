<?php

namespace Task03;

class BooksList
{
    private array $books = [];

    public function add(Book $book): void
    {
        $this->books[] = $book;
    }

    public function count(): int
    {
        return count($this->books);
    }

    public function get(int $n): ?Book
    {
        return $this->books[$n] ?? null;
    }

    public function store(string $fileName): void
    {
        file_put_contents($fileName, serialize($this->books));
    }

    public function load(string $fileName): void
    {
        if (file_exists($fileName)) {
            $data = file_get_contents($fileName);
            $this->books = unserialize($data) ?: [];
        }
    }
}
