<?php

namespace App;

use Exception;

class StringCalculator
{
    const MAX_NUMBER_ALLOWED = 1000;

    /**
     * @throws Exception
     */
    public function add(string $numbers)
    {
        $numbersArray = $this->parseNumbers($numbers);

        $this->negativeNumbersNotAllowed($numbersArray);

        return array_sum($this->ignoreGreaterThanMax($numbersArray));
    }

    /**
     * @param $numbers
     * @return void
     * @throws Exception
     */
    public function negativeNumbersNotAllowed($numbers): void
    {
        foreach ($numbers as $number) {
            if ((int)($number) < 0) {
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