<?php

namespace App;

class Truncater
{
    private array $options;

    public static array $defaultOptions = [
        'separator' => '...',
        'length' => 50,
    ];

    public function __construct(array $options = [])
    {
        $this->options = array_merge(self::$defaultOptions, $options);
    }

    public function truncate(string $string, array $options = []): string
    {
        $options = array_merge($this->options, $options);

        $length = (int) $options['length'];
        if ($length <= 0) {
            throw new \InvalidArgumentException('Length must be a positive integer.');
        }

        if (mb_strlen($string) > $length) {
            $truncated = mb_substr($string, 0, $length);
            $truncated .= $options['separator'];
            return $truncated;
        }

        return $string;
    }
}
