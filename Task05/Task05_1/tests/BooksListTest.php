<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\BooksList;
use App\Book;

class BooksListTest extends TestCase
{
    private BooksList $booksList;
    private Book $book1;
    private Book $book2;
    private Book $book3;

    protected function setUp(): void
    {
        $this->booksList = new BooksList();
        $this->book1 = new Book("Book One", ["Author One"], "Publisher One", 2001);
        $this->book2 = new Book("Book Two", ["Author Two"], "Publisher Two", 2002);
        $this->book3 = new Book("Book Three", ["Author Three"], "Publisher Three", 2003);

        $this->booksList->add($this->book1);
        $this->booksList->add($this->book2);
        $this->booksList->add($this->book3);
    }

    public function testRewind()
    {
        $this->booksList->rewind();
        $this->assertSame($this->book1, $this->booksList->current());
    }

    public function testKey()
    {
        $this->booksList->rewind();
        $this->assertSame($this->book1->getId(), $this->booksList->key());
    }

    public function testNext()
    {
        $this->booksList->rewind();
        $this->booksList->next();
        $this->assertSame($this->book2, $this->booksList->current());

        $this->booksList->next();
        $this->assertSame($this->book3, $this->booksList->current());
    }

    public function testValid()
    {
        $this->booksList->rewind();
        $this->assertTrue($this->booksList->valid());

        $this->booksList->next();
        $this->assertTrue($this->booksList->valid());

        $this->booksList->next();
        $this->assertTrue($this->booksList->valid());

        $this->booksList->next();
        $this->assertFalse($this->booksList->valid());
    }

    public function testRewindEmptyList()
    {
        $emptyList = new BooksList();
        $emptyList->rewind();
        $this->assertFalse($emptyList->valid(), "Iterator should be invalid on empty list");
    }

    public function testNextBeyondEnd()
    {
        $this->booksList->rewind();
        $this->booksList->next();
        $this->booksList->next();
        $this->booksList->next();

        $this->assertFalse($this->booksList->valid(), "Iterator should be invalid after the end of the list");
    }

    public function testCurrentBeforeRewind()
    {
        $this->booksList->next();
        $this->booksList->rewind();

        $this->assertSame(
            $this->book1,
            $this->booksList->current(),
            "Iterator should point to the first element after rewind"
        );
    }

    public function testKeyEmptyList()
    {
        $emptyList = new BooksList();
        $emptyList->rewind();
        $this->assertFalse($emptyList->valid(), "Iterator should be invalid on empty list");
    }
}
