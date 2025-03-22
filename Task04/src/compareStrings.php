<?php

use App\Stack;

function processString(string $str): Stack {
    $stack = new Stack();

    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] === '#') {
            $stack->pop();
        } else {
            $stack->push($str[$i]);
        }
    }

    return $stack;
}

function compareStrings(string $str1, string $str2): bool {
    return processString($str1)->__toString() === processString($str2)->__toString();
}