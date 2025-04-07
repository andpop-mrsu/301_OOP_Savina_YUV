<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Truncater;

class TruncaterTest extends TestCase
{
    private Truncater $truncater;

    public function setUp(): void
    {
        $this->truncater = new Truncater();
    }

    public function testTruncateEmptyStringDefaultPresets()
    {
        $result = $this->truncater->truncate('');
        $this->assertSame(
            '',
            $result,
            'Truncate empty string should return empty string.'
        );
    }

    public function testTruncateCommonStringDefaultPresets()
    {
        $result = $this->truncater->truncate('Дубровская Юлия Вячеславовна');
        $this->assertSame(
            'Дубровская Юлия Вячеславовна',
            $result,
            'String should be truncated with default length.'
        );
    }

    public function testTruncateWithLengthOverrideDefaultPresets()
    {
        $result = $this->truncater->truncate(
            'Дубровская Юлия Вячеславовна',
            ['length' => 10]
        );

        $this->assertSame(
            'Дубровская...',
            $result,
            'String should be truncated with overridden length and separator.'
        );
    }

    public function testTruncateWithLengthGreaterThanStringDefaultPresets()
    {
        $result = $this->truncater->truncate(
            'Дубровская Юлия Вячеславовна',
            ['length' => 50]
        );

        $this->assertSame(
            'Дубровская Юлия Вячеславовна',
            $result,
            'String should remain unchanged if length is greater than string length.'
        );
    }

    public function testTruncateWithNegativeLengthDefaultPresets()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->truncater->truncate(
            'Дубровская Юлия Вячеславовна',
            ['length' => -10]
        );
    }

    public function testTruncateWithCustomSeparatorAnsLengthDefaultPresets()
    {
        $result = $this->truncater->truncate(
            'Дубровская Юлия Вячеславовна',
            ['length' => 10, 'separator' => '*']
        );

        $this->assertSame(
            'Дубровская*',
            $result,
            'String should be truncated with custom separator.'
        );
    }

    public function testTruncateWithCustomLengthAndSeparatorPresets()
    {
        $customTruncater = new Truncater([
            'separator' => '~~~',
            'length' => 15,
        ]);

        $result = $customTruncater->truncate('Дубровская Юлия Вячеславовна');
        $this->assertSame(
            'Дубровская Юлия~~~',
            $result,
            'String should be truncated with custom config.'
        );

        $shortString = 'Пример';
        $resultShort = $customTruncater->truncate($shortString);
        $this->assertSame(
            'Пример',
            $resultShort,
            'Short string should not be truncated.'
        );

        $emptyString = '';
        $resultEmpty = $customTruncater->truncate($emptyString);
        $this->assertSame(
            '',
            $resultEmpty,
            'Empty string should remain empty.'
        );
    }

    public function testTruncateWithCustomSeparatorPreset()
    {
        $customTruncater = new Truncater([
            'separator' => '~~~'
        ]);

        $result = $customTruncater->truncate('Дубровская Юлия Вячеславовна');
        $this->assertSame(
            'Дубровская Юлия Вячеславовна',
            $result,
            'String should not be truncated if shorter than default length.'
        );

        $resultEmpty = $customTruncater->truncate('');
        $this->assertSame(
            '',
            $resultEmpty,
            'Empty string should remain empty.'
        );

        $longString = 'Это очень длинная строка, которая точно превышает пятьдесят символов';
        $resultLong = $customTruncater->truncate($longString);
        $this->assertSame(
            'Это очень длинная строка, которая точно превышает ~~~',
            $resultLong,
            'Long string should be truncated with custom separator.'
        );
    }

    public function testTruncateWithCustomLengthPreset()
    {
        $customTruncater = new Truncater([
            'length' => 15
        ]);

        $result = $customTruncater->truncate('Дубровская Юлия Вячеславовна');
        $this->assertSame(
            'Дубровская Юлия...',
            $result,
            'String should be truncated with custom config.'
        );

        $shortString = 'Пример';
        $resultShort = $customTruncater->truncate($shortString);
        $this->assertSame(
            'Пример',
            $resultShort,
            'Short string should not be truncated.'
        );

        $emptyString = '';
        $resultEmpty = $customTruncater->truncate($emptyString);
        $this->assertSame(
            '',
            $resultEmpty,
            'Empty string should remain empty.'
        );
    }
}
