<?php

namespace App;

class Stack implements StackInterface {
    private array $elements = [];

    public function __construct(...$elements) {
        $this->push(...$elements);
    }

    public function push(...$elements): void {
        array_push($this->elements, ...$elements);
    }

    public function pop() {
        return array_pop($this->elements) ?? null;
    }

    public function top() {
        return $this->elements[count($this->elements) - 1] ?? null;
    }

    public function isEmpty(): bool {
        return empty($this->elements);
    }

    public function copy(): Stack {
        $newStack = new Stack();
        $newStack->elements = $this->elements;
        return $newStack;
    }

    public function __toString(): string {
        return '[' . implode('->', array_reverse($this->elements)) . ']';
    }
}
