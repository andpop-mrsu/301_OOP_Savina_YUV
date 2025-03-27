<?php

namespace App;

use Iterator;

class BooksList implements Iterator
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

    public function rewind(): void
    {
        reset($this->books);
    }

    public function current(): Book
    {
        return current($this->books);
    }

    public function key(): int
    {
        return $this->current()->getId();
    }

    public function next(): void
    {
        next($this->books);
    }

    public function valid(): bool
    {
        return current($this->books) !== false;
    }
}
