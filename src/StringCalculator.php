<?php

namespace App;

use Exception;

class StringCalculator
{
    const MAX_NUMBER_ALLOWED = 1000;

    public function __construct()
    {
    }

    /**
     * @throws Exception
     */
    public function add(string $numbers)
    {
        $numbers = $this->parseNumbers($numbers);

        $this->negativeNumbersNotAllowed($numbers);

        return array_sum($this->ignoreGreaterThanMax($numbers));
    }

    /**
     * @param $numbers
     * @return void
     * @throws Exception
     */
    public function negativeNumbersNotAllowed($numbers): void
    {
        foreach ($numbers as $number) {
            if ($number < 0) {
                throw new Exception('Negative numbers not allowed.');
            }
        }
    }

    /**
     * @param string $numbers
     * @param $matches
     * @return array
     */
    public function parseNumbers(string $numbers): array
    {
        $delimiter = ",|\n";
        $customDelimiter = "\/\/(.)\n";

        if (preg_match("/{$customDelimiter}/", $numbers, $matches)) {
            $delimiter = $matches[1];
            $numbers = str_replace($matches[0], '', $numbers);
        }

        return preg_split("/{$delimiter}/", $numbers);
    }

    /**
     * @param array $numbers
     * @return array
     */
    public function ignoreGreaterThanMax(array $numbers): array
    {
        return array_filter($numbers, function ($number) {
            return $number <= self::MAX_NUMBER_ALLOWED;
        });
    }
}