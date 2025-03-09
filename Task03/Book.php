<?php

namespace Task03;

class Book
{
    private static int $idCounter = 1;
    private int $id;
    private string $title;
    private array $authors;
    private string $publisher;
    private int $year;

    public function __construct(string $title, array $authors, string $publisher, int $year)
    {
        $this->id = self::$idCounter++;
        $this->title = $title;
        $this->authors = $authors;
        $this->publisher = $publisher;
        $this->year = $year;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getAuthors(): array
    {
        return $this->authors;
    }

    public function setAuthors(array $authors): self
    {
        $this->authors = $authors;
        return $this;
    }

    public function getPublisher(): string
    {
        return $this->publisher;
    }

    public function setPublisher(string $publisher): self
    {
        $this->publisher = $publisher;
        return $this;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;
        return $this;
    }

    public function __toString(): string
    {
        $output = "Id: {$this->id}\n";
        $output .= "Название: {$this->title}\n";
        foreach ($this->authors as $index => $author) {
            $output .= "Автор" . ($index + 1) . ": $author\n";
        }
        $output .= "Издательство: {$this->publisher}\n";
        $output .= "Год: {$this->year}\n";
        return $output;
    }
}
